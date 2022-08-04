<?php
class Common_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function exist_data($table, $data)
    {
        $query = $this->db->get_where($table, $data);
        return $query->row_array();
    }

    //Insert Row
    public function insert_data($table, $data)
    {
        if ($this->db->insert($table, $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // get tag list
    public function tag_list()
    {
        return $this->db->select('*')->get('tag')->result_array();
    }

    public function get_tag_in_rescoures($id)
    {
        $this->db->select('resource.*,tag.Tag_Id as tagid, tag.NameEnglish ');
        $this->db->from('resource');
        $this->db->join('tag', 'tag.Tag_Id = resource.Tag_Id'); 
        $query = $this->db->get();
        
        return $query->result();
    }

    // get tag list
    public function tag_list_rescoure()
    {
        $this->db->select('resource.*,tag.Tag_Id as tagid, tag.NameEnglish ');
        $this->db->from('resource');
        $this->db->join('tag', 'tag.Tag_Id = resource.Tag_id','left'); 
        $query = $this->db->get();
        return $query->result();
    }

    public function get_resource_list($table, $data)
    {

        $this->db->select('resource.*,tag.Tag_Id as tagid, tag.NameEnglish ');
        $this->db->from('resource');
        $this->db->join('tag', 'tag.Tag_Id = resource.Tag_id','left')->where('Resource_id',$data['Resource_id']); 
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_data_change_email($table,$where = array(),$inquery_id)
    {
         return $this->db->select('Customer_Email')->where('Inquiry_Id',$inquery_id)->where('Active_Email','1')->get('inquiry_logs')->row(); 

    }

    //Get User Info here
    public function get_data($table,$where = array(),$option = "",$orderbyfield = "Created",$orderbyvalue = "DESC")
    {
        $this->db->order_by($orderbyfield,$orderbyvalue);
		
		if($table==="categories")
		{
			$this->db->select('Name'.get_lang().' As Name,Category_Id,Status,CreatedBy,Created,Modified');	
		}	
        if (empty($where))
        {
            $sql = $this->db->get($table);
        }
        else
        {
            $sql = $this->db->where($where)->get($table);
        }
        if ($sql->num_rows() > 0)
        {
            if ($option == 'single')
            {
                return $sql->row_array();
            }
            else
            {
                return $sql->result_array();
            }
        }
        else
        {
            return false;
        }
    }

     public function get_log_email($inquery_id)
     {

       return $this->db->select('Customer_Email')->where('Inquiry_Id',$inquery_id)->where('Active_Email','1')->get('inquiry_logs')->row();
     }
	
	public function get_admin_dashboard_crm($User_Id)
	{
        $this->db->order_by('Created','DESC');
		$this->db->where("(Status = '0' OR (Assign_To='$User_Id' AND Status = '1'))");
		$sql = $this->db->get('inquiries');
        return $sql->result_array();
	}

    //GEt Update data
    public function update_data($table, $data, $where)
    {
        if ($this->db->where($where)->update($table, $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public function check_data($table, $where)
    {
        if ($this->db->where($where)->get($table)->num_rows() <= 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /*here get in Active opportunities*/
    public function activities_opportunities($inquery_id)
    {

            $email  = $this->db->select('Customer_Email')->where('ID',$inquery_id)
            ->get('inquiries')->row();

            $open_opportunities   =  $this->db->where('Customer_Email',$email->Customer_Email)
                ->where('Close_Status <=', 4)
                ->get('inquiries')->num_rows();

            $open   =  $this->db->where('Customer_Email',$email->Customer_Email)
                ->where(" ( find_in_set(Status,'0,1,2,3') != '0' OR  Action_Required = '1' OR Close_Status = '5' )")
                ->get('inquiries')->num_rows();

            $count   =   $this->db->where('Customer_Email',$email->Customer_Email)
                ->where(" ( find_in_set(Status,'0,1,2,3,4') != '0' OR  Action_Required = '1' OR Close_Status = '2' OR Close_Status = '1' )")
                ->get('inquiries')->num_rows();

            $progress = array(  
              'open' =>$open,
              'count' =>$count,
              'open_opportunities' => $open_opportunities,
              'email' =>$email->Customer_Email
              );

              return  $progress;
     
    }
    // have Accout
    public function haveaccount($inquery_id)
    {
        $loggedInfo = '';
        $email = $this->db->select('Customer_Email')->where('ID',$inquery_id)->get('inquiries')->row();
        $haveaccount  =  $this->db->select('User_Id')
                            ->where('Email', $email->Customer_Email)
                            ->where('Status','0')
                            ->get('users')->row();
        if($haveaccount)
        {
            $this->db->order_by('Created', 'DESC');
            $loggedInfo =  $this->db->select('Created')
                            ->where('User_Id', $haveaccount->User_Id)
                            ->get('logins')->row();
        }

        return $response = array('haveaccount' => $haveaccount, 'loggedInfo' => $loggedInfo);
    }

    public function getoldemail($inquery_id)
    {

       return $this->db->select('Customer_Email')->where('ID',$inquery_id)->get('inquiries')->row();
                  
    }

     public function get_inquiry_logs_email($inquery_id)
    {

       return $this->db->select('Active_Email')->where('Active_Email',1)->where('Inquiry_Id',$inquery_id)->get('inquiry_logs')->row();
                  
    }

     public function getinquiry_logs($inquery_id)
    {

    return $this->db->select('Active_Email')->where('Inquiry_Id',$inquery_id)->get('inquiry_logs')->result();
                  
    }

    public function delete_data($table, $where)
    {
        if ($this->db->where($where)->delete($table))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_realtions($relation_of)
    {
        $where = array('Relation_Of' => $relation_of);
        $sql   = $this->db->select('r.*,u.Unit_Name,u.Unit_Code,u.Unit_Id')->from('unit_relations r')->join('units u', 'u.Unit_Id=r.Relation_With', 'left')->where($where)->get();
        if ($sql->num_rows() > 0)
        {
            return $sql->result_array();
        }
        else
        {
            return false;
        }
    }

    public function check_required($AllInput, $Except = [])
    {
        foreach ($AllInput as $row => $key)
        {
            if (!in_array($row, $Except))
            {
                $this->form_validation->set_rules($row, '', 'required');
            }
        }
    }

    public function count_data($table, $where = array())
    {
        if (!empty($where))
        {
            $this->db->where($where);
        }
        return $this->db->count_all_results($table);
    }
	
	public function count_country_by_user_data($where)
    {
        $this->db->where($where);
		$this->db->group_by('Country_Id');
        return $this->db->count_all_results('users');
    }

    public function count_user_data($where)
    {

        $this->db->select('DATE(Created) as Created, COUNT(User_Id) as total');
        $this->db->group_by('DATE(Created)');
        $query = $this->db->get_where('users', $where);
        return $query->result_array();
    }

    public function user_coefficients($where)
    {
        $this->db->select('c.*,b.Name,b.PriceType');
        $this->db->join('brands as b', 'b.Brand_Id = c.Brand_Id', 'left');
        $query = $this->db->get_where('coefficients as c', $where);
        return $query->result_array();
    }

    public function get_category_data()
    {
        $this->db->order_by('Created', 'DESC');
		$this->db->select('c.Name'.get_lang().' As Name,c.Category_Id,c.Status,c.CreatedBy,c.Created,c.Modified,u.FirstName,u.LastName');
        $this->db->join('users as u', 'u.User_Id = c.CreatedBy', 'left');
        $query = $this->db->get_where('categories as c');
        return $query->result_array();
    }

	public function get_order_data($where=array(),$option="")
    {
        $this->db->order_by('Created', 'DESC');
        $this->db->select('o.*,u.FirstName,u.LastName,u.Email,u.CompanyName,u.CompanyAddress,u.Phone,u.AccountType,u.Language');
        $this->db->join('users as u', 'u.User_Id = o.User_Id', 'left');
		if(empty($where)) 
		{
			$query = $this->db->get_where('orders as o');
		}
		else 
		{
			$query = $this->db->get_where('orders as o',$where);
		} 			
		if ($option == 'single')
		{
			return $query->row_array();
		}
		else
		{
			return $query->result_array();
		}
    }
	
	public function get_order_info_data($where=array(),$option="")
    {
        $this->db->order_by('Created', 'DESC');
        $this->db->select('o.*,b.Name AS BrandName');
        $this->db->join('brands as b', 'b.Brand_Id = o.Brand_Id', 'left');
		
		$query = $this->db->get_where('order_info as o',$where);
		if ($option == 'single')
		{
			return $query->row_array();
		}
		else
		{
			return $query->result_array();
		}
    }
	
	public function get_agent_order_data($where=array(),$option="")
    {
        $this->db->order_by('o.Modified', 'DESC');
        $this->db->select('o.*,u.Language');
        $this->db->join('users as u', 'u.User_Id = o.User_Id', 'left');
		if(empty($where)) 
		{
			$query = $this->db->get_where('agent_orders as o');
		}
		else 
		{
			$query = $this->db->get_where('agent_orders as o',$where);
		} 	
		if ($option == 'single')
		{
			return $query->row_array();
		}
		else
		{
			return $query->result_array();
		}		
	}
	
	public function get_agent_order_info_data($where=array(),$option="")
    {
        $this->db->order_by('Modified', 'DESC');
        $this->db->select('o.*,b.Name AS BrandName');
        $this->db->join('brands as b', 'b.Brand_Id = o.Brand_Id', 'left');
		
		$query = $this->db->get_where('agent_order_info as o',$where);
		if ($option == 'single')
		{
			return $query->row_array();
		}
		else
		{
			return $query->result_array();
		}
    }

    public function get_currency_data()
    {
        $this->db->order_by('Created', 'DESC');
        $this->db->select('c.*,u.FirstName,u.LastName');
        $this->db->join('users as u', 'u.User_Id = c.CreatedBy', 'left');
        $query = $this->db->get_where('currencies as c');
        return $query->result_array();
    }

    public function get_user_data($where)
    {
        $this->db->order_by('u.CompanyName', 'ASC');
        $this->db->select('u.*,c.Name,max(l.Created) as logindate');
        $this->db->join('currencies as c', 'c.Currency_Id = u.Currency_Id', 'left');
        $this->db->join('logins as l', 'l.User_Id = u.User_Id', 'left');
        $this->db->group_by('u.User_Id');
        $query = $this->db->get_where('users as u', $where);
        return $query->result_array();
    }
	
	public function get_user_info($where)
    {
        $this->db->select('u.*,c.Name,c.Symbol,ct.CountryName');
        $this->db->join('currencies as c', 'c.Currency_Id = u.Currency_Id', 'left');
        $this->db->join('countries as ct', 'ct.Country_Id = u.Country_Id', 'left');
        $query = $this->db->get_where('users as u', $where);
        return $query->row_array();
    }

    public function get_product_data($where=array())
    {
        $this->db->order_by('p.Code', 'ASC');
        $this->db->select('p.*,p.DataSheet'.get_lang().' AS DataSheet,c.Name'.get_lang().' AS CategoryName,b.Name AS BrandName,b.PriceType');
        $this->db->join('categories as c', 'c.Category_Id = p.Category_Id', 'left');
        $this->db->join('brands as b', 'b.Brand_Id = p.Brand_Id', 'left');
		if(empty($where)) {
			$query = $this->db->get_where('products as p');
		}
		else 
		{
			$query = $this->db->get_where('products as p',$where);
		}		
        return $query->result_array();
    }
	
	public function get_product_data_by_user($Brand_Id=array(),$where=array())
    {
		$User_Id = $this->session->userdata('User_Id');
		
        $this->db->order_by('p.Code', 'ASC');
		$this->db->select('p.*,p.DataSheet'.get_lang().' AS DataSheet,c.Name'.get_lang().' AS CategoryName,b.Name AS BrandName,b.PriceType AS BrandPriceType,cf.Value as cof_Value');
        $this->db->join('categories as c', 'c.Category_Id = p.Category_Id', 'left');
        $this->db->join('brands as b', 'b.Brand_Id = p.Brand_Id', 'left');
        $this->db->join('coefficients as cf', 'cf.Brand_Id = p.Brand_Id and cf.User_Id = '.$User_Id, 'left');
		if(isset($Brand_Id) && !empty($Brand_Id)) {
			$this->db->where_in('p.Brand_Id', $Brand_Id);	
		}
		if(empty($where)) {
			$query = $this->db->get_where('products as p');
		}
		else 
		{
			$query = $this->db->get_where('products as p',$where);
		}	
		return $query->result_array();
    }

    public function get_clearnce_data()
    {
        $this->db->order_by('Created', 'DESC');
        $this->db->select('p.*,c.Name'.get_lang().' AS CategoryName');
        $this->db->join('categories as c', 'c.Category_Id = p.Category_Id', 'left');
        $query = $this->db->get_where('clearnces as p');
        return $query->result_array();
    }

    public function get_login_details($limit=null)
    {
        $this->db->order_by('l.Created', 'DESC');
        $this->db->select('l.*,u.FirstName,u.LastName,u.CompanyName');
        $this->db->join('users as u', 'u.User_Id = l.User_Id', 'left');
		if($limit) 
		{
			$this->db->limit($limit);
        }
		$query = $this->db->get('logins as l');
        return $query->result_array();
    }

	public function get_activities_data($where=array())
    {
        $this->db->order_by('Created', 'DESC');
        $this->db->limit(9);
        $this->db->select('a.*,u.AccountType,u.CompanyName,u.FirstName,u.LastName');
        $this->db->join('users as u', 'u.User_Id = a.User_Id', 'left');
        
       
        
        if(empty($where)) 
        {
            $query = $this->db->get_where('activities as a');
        }
        else 
        {
            $query = $this->db->get_where('activities as a',$where);
        }       
        return $query->result_array();
        
    }

    public function get_activities_data_2($where=array())
    {
        $this->db->order_by('Created', 'DESC');
        $this->db->limit(9);
        $this->db->select('a.*,u.AccountType,u.CompanyName,u.FirstName,u.LastName,sr.Brand_Id,sr.Company_Management_Id,cm.Company_Name as CM_Company_Name');
        $this->db->join('users as u', 'u.User_Id = a.User_Id', 'left');
        $this->db->join('service_request as sr', 'sr.Request_Id = a.Request_Id AND sr.Brand_Id != 0', 'left');
        $this->db->join('companies_management as cm', 'cm.ID = sr.Company_Management_Id', 'left');
        
       
        
        if(empty($where)) 
        {
            $query = $this->db->get_where('activities as a');
        }
        else 
        {
            $query = $this->db->get_where('activities as a',$where);
        }       
        return $query->result_array();
        
    }


    public function get_activities_data_all($where=array())
	{
		$this->db->order_by('Created', 'DESC');
         $this->db->limit(30);
        $this->db->select('a.*,u.AccountType,u.CompanyName,u.FirstName,u.LastName');
        $this->db->join('users as u', 'u.User_Id = a.User_Id', 'left');
		if(empty($where)) 
		{
			$query = $this->db->get_where('activities as a');
		}
		else 
		{
			$query = $this->db->get_where('activities as a',$where);
		}  		
		return $query->result_array();
		
	} 
	public function get_orders_by_limit($where=array())
	{
		$this->db->order_by('Created', 'DESC');
		$this->db->limit(7, 0);
        $this->db->select('o.Created,o.Order_Id,o.TotalAmount,o.Status,o.CurrencySymbol,u.Currency_Id,u.CompanyName,cm.Company_Name as CM_Company_Name');
        $this->db->join('users as u', 'u.User_Id = o.User_Id', 'left');
        $this->db->join('companies_management as cm', 'cm.ID = o.Company_Management_Id', 'left');
        if(empty($where)) 
		{
			$query = $this->db->get_where('orders as o');
		}
		else 
		{
			$query = $this->db->get_where('orders as o',$where);
		}  		
		return $query->result_array();
		
	}
	public function get_agent_orders_by_limit($where=array())
	{
		$this->db->order_by('o.Modified', 'DESC');
		$this->db->limit(7, 0);
        $this->db->select('o.Created,o.Order_Id,o.TotalAmount,o.Status,o.CurrencySymbol,u.Currency_Id');
		$this->db->join('users as u', 'u.User_Id = o.User_Id', 'left');
        if(empty($where)) 
		{
			$query = $this->db->get_where('agent_orders as o');
		}
		else 
		{
			$query = $this->db->get_where('agent_orders as o',$where);
		}  		
		return $query->result_array();
		
	}
	public function get_products_by_user($user_id,$start='',$end='',$status='')
	{
		if(!empty($user_id))
		{
			$BrandInfo = $this->db->select('b.Brand_Id AS Brand')->from("coefficients c")->join('brands b', 'b.Brand_Id=c.Brand_Id', 'inner')->where(array('User_Id' => $user_id, 'Status' => '0'))->get()->result_array();
			if(isset($BrandInfo) && !empty($BrandInfo))
			{
				$BrandArray = array();
				
				foreach($BrandInfo as $Brand)
				{
					$BrandArray['Brands'][] = $Brand['Brand'];
				}
			}
			if(isset($BrandArray))
			{	
				$select_column = array(
				   'p.Product_Id','p.Brand_Id','p.Category_Id','p.Description','p.Weight','p.Price','b.Name as BrandName','cf.Value as cof_Value','p.Status','p.DataSheet'.get_lang().' AS DataSheet'
				);
				$this->db->select($select_column)->join('brands as b', 'b.Brand_Id = p.Brand_Id', 'left')->join('coefficients as cf', 'cf.Brand_Id = p.Brand_Id and cf.User_Id = '.$user_id.'', 'left');
				$this->db->from('products p');
				$this->db->where_in('p.Brand_Id', $BrandArray['Brands']);
				if(isset($status) && !empty($status))
				{
					if($status == "new")
					{
						$this->db->where('p.Status','1');
					}
					else if($status == "best_sale")
					{
						$this->db->where('p.BestSale','1');
					}	
				}
				$query = $this->db->order_by('p.Created', 'DESC')->limit($end,$start)->get();
				$fetch_data = $query->result();
				
				$cur = $this->db->select('c.Name,c.Symbol,c.ExchangeRate')->from('users u')->join('currencies c', 'c.Currency_Id=u.Currency_Id', 'left')->where(array('User_Id' => $user_id))->get()->row();
				
				$data = array();
				foreach ($fetch_data as $row)
				{				
					$where = array('p.Product_Id'=>$row->Product_Id);
					$ProductInfo = $this->get_product_data($where);
					
					$sub_array   = array();				
					$sub_array['DataSheet'] = $row->DataSheet;				
					$sub_array['BrandName'] = $row->BrandName;
                    $sub_array['Description'] = $row->Description;              
                    $sub_array['Brand_Id'] = $row->Brand_Id;              
					$sub_array['Category_Id'] = $row->Category_Id;				
					$amount = $row->Price;
					if($row->cof_Value!='0.00')
					{	
						if($ProductInfo[0]['PriceType']==='Buying') {
							$amount = $amount*$row->cof_Value;
						}
						else if($ProductInfo[0]['PriceType']==='Public')
						{
							$amount = $amount*(1-$row->cof_Value);
						}		
					}
					if($cur->ExchangeRate!='0.00' && !empty($cur->ExchangeRate))
					{
						$amount = $amount*$cur->ExchangeRate;
					}
					$sub_array['Price'] = sprintf('%0.2f', $amount);				
					$data[]      = $sub_array;
				}
			}
			else
			{
				$data = array();	
			}	
			return $data;			
		}
	}

    //Service Detail Function start here
    public  function service_detail($Request_Id)
    {
        $where = array('s.Request_Id' => $Request_Id, 's.Brand_Id!=' => '0');
        if ($this->session->userdata('AccountType') == '1')
        {
            $where['s.User_Id'] = $this->session->userdata('User_Id');
        }
        return $this->db->select('s.*,b.Name as BrandName')->join('brands b','b.Brand_Id=s.Brand_Id')->where($where)->get('service_request s')->row_array();
    }
    public  function service_detail_1($Request_Id)
    {
        $where_1 = array('Request_Id'=>$Request_Id,'Brand_Id!='=>'0');
        return $this->db->select('s.*')
        ->where($where_1)
        ->from('service_request s')
		->get()->result_array();
        
    }
    public  function service_detail_with_user($Request_Id)
    {
        $where_1 = array('Request_Id'=>$Request_Id,'Brand_Id!='=>'0');
        return $this->db->select('s.*,u.Company_mangement_id as User_Company_Management_Id')
        ->where($where_1)
        ->from('service_request s')
        ->join('users u','u.User_Id=s.User_Id','left')
		->get()->result_array();
        
    }

    public function service_get_shared($Request_Id)
    {
        $sql = $this->db->select('s.*,u.CompanyName,u.Email,cm.Company_Name as CM_Company_Name ,cm.Email as CM_Email')->where(array('s.Request_Id'=>$Request_Id,'s.Brand_Id'=>'0','s.Type!='=>'0'));
        
        $sql->order_by('s.Service_Id','asc');
        
        return $sql->join('users u','u.User_Id=s.User_Id','left')->join('companies_management cm','cm.ID=s.Company_Management_Id','left')->get('service_request s')->result_array();
        $this->db->last_query();
    }

    public  function check_service_request($Request_Id,$Status)
    {
        $where = array('s.Request_Id' => $Request_Id, 's.Brand_Id!=' => '0','s.Status!='=>$Status);
        if ($this->session->userdata('AccountType') == '1')
        {
            $where['s.User_Id'] = $this->session->userdata('User_Id');
        }
        $sql = $this->db->select('s.*,b.Name as BrandName')->join('brands b','b.Brand_Id=s.Brand_Id')->where($where)->get('service_request s');
        if($sql->num_rows()>0)
        {
            return true; 
        }
        else
        {
            return false;
        }
    }
}
