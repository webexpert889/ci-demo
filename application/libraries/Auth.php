<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth
{
    public function is_login()
    {
    	$CI = & get_instance();
    	if(!$CI->session->userdata('User_Id'))
    	{
			redirect(base_url('login'),'refresh');
    	}	
    }

    public function has_permission($alloweduser)
    {
    	$CI = & get_instance();
    	$AccountType = $CI->session->userdata('AccountType');
    	if(in_array($AccountType,$alloweduser))
		{
			return true;
		}
		else
		{
			redirect(base_url('dashboard'));
		}
    }

    public function has_admin_permission($perm_keyword,$perm_type="",$User_Id="") // $perm_type  example like add/edit/delete/view
    {
        $CI = & get_instance();
        if(isset($User_Id) && !empty($User_Id)) {

        }
        else {
            $User_Id = $CI->session->userdata('User_Id');
        }
        $Role_Id = $CI->db->where('User_Id',$User_Id)->get('users')->row()->Role_Id;
        if($Role_Id==1)
        {
            return true;
        }
        else
        {
            $query = $CI->db->select('p.PermName'.get_lang().',rp.*')->from('role_perm rp')->join('permissions p','p.Perm_Id=rp.Perm_Id','LEFT')->where(array('p.PermKeyword'=>$perm_keyword,'rp.Role_Id'=>$Role_Id))->get();
            if($query->num_rows()>0)
            {
                if(!empty($perm_type))
                {
                    $row = $query->row_array();
                    if($row[$perm_type]==1)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                else
                {
                    return true;
                }
            }
            else
            {
                return false;
            }
        }
    }
    public function has_permission_array($perms) 
    {
        if(is_array($perms))
        {
            $i=0;
            foreach($perms as $perm)
            {
                if($this->has_admin_permission($perm,'View'))
                {
                    $i=1;
                }
            }
            if($i==1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}
