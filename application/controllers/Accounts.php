<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->auth->is_login();
		$alloweduser = array('0');
		$this->auth->has_permission($alloweduser);
        $site_lang = $this->session->userdata('site_lang');
        $this->lang->load('label',$site_lang);
        $this->lang->load('email_template',$site_lang);
        $this->lang->load('success_error',$site_lang);
    }
	
	public function index()
    {
		$where = array('u.AccountType !='=>'0','u.Status'=>'0');
		$data['UserInfo'] = $this->common_model->get_user_data($where);
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('admin/user_index',$data);
		$this->load->view('includes/footer');
	}
    
	public function create()
    {
		if($this->input->post()) {
			
			$PostData = $this->input->post();
			$this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
			$this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[users.Email]');
			$this->form_validation->set_rules('CompanyName', 'Company Name', 'trim|required');
			$this->form_validation->set_rules('CompanyAddress', 'Company Address', 'trim|required');
			$this->form_validation->set_rules('Phone', 'Phone', 'trim|required|numeric');
			$this->form_validation->set_rules('AccountType', 'Account Type', 'trim|required');
			$this->form_validation->set_rules('Currency_Id', 'Currency', 'trim|required');
			$this->form_validation->set_rules('Language', 'Language', 'trim|required');
			
			if ($this->form_validation->run() == false)
            {
				$data['LanguageInfo'] = $this->common_model->get_data('languages');
				$data['CurrencyInfo'] = $this->common_model->get_data('currencies');
				$data['CountryInfo'] = $this->common_model->get_data('countries');
				$where = array('BrandType'=>'0');
				$data['BrandInfo'] = $this->common_model->get_data('brands',$where);
				$this->load->view('includes/header');
				$this->load->view('includes/sidebar');
				$this->load->view('admin/user_create',$data);
				$this->load->view('includes/footer');	
            }
            else
			{
				$Password = RandomPassword(8);
				$InsertData['FirstName'] = $PostData['FirstName'];
				$InsertData['LastName'] = $PostData['LastName'];
				$InsertData['Email'] = $PostData['Email'];
				$InsertData['AccountType'] = $PostData['AccountType'];
				$InsertData['Phone'] = $PostData['Phone'];
				$InsertData['CompanyName'] = $PostData['CompanyName'];
				$InsertData['CompanyAddress'] = $PostData['CompanyAddress'];
				$InsertData['Currency_Id'] = $PostData['Currency_Id'];
				$InsertData['Country_Id'] = $PostData['Country_Id'];
				$InsertData['Language'] = $PostData['Language'];
				$InsertData['Status'] = '0';
				$InsertData['Password'] = md5($Password);
				$InsertData['Created'] = date('Y-m-d H:i:s');
				$InsertData['Modified'] = date('Y-m-d H:i:s');
				$InsertData['CreatedBy'] = $this->session->userdata('User_Id');
				
				$this->common_model->insert_data('users',$InsertData);
				$User_Id = $this->db->insert_id();
				
				if(isset($PostData['Brand_Id']) && !empty($PostData['Brand_Id'])) {
					$length = count($PostData['Brand_Id']);
					for($i=0;$i<$length;$i++) {
						$InsertData = array();
						if(isset($PostData['Status_'.$i])) {
							$InsertData['User_Id'] = $User_Id;	
							$InsertData['Brand_Id'] = $PostData['Brand_Id'][$i];
							$InsertData['Status'] = '0';	
							$InsertData['Value'] = $PostData['Value_'.$i];
							$InsertData['Created'] = date('Y-m-d H:i:s');
							$InsertData['Modified'] = date('Y-m-d H:i:s');						
						}
						else {
							$InsertData['User_Id'] = $User_Id;	
							$InsertData['Brand_Id'] = $PostData['Brand_Id'][$i];
							$InsertData['Status'] = '1';	
							$InsertData['Value'] = 0;
							$InsertData['Created'] = date('Y-m-d H:i:s');
							$InsertData['Modified'] = date('Y-m-d H:i:s');
						}
						$this->common_model->insert_data('coefficients',$InsertData);
					}
				}
				
				$loginlink = base_url('login');
				$data['subject'] = $this->lang->line('user_register_subject_temp');
				$data['message'] = $this->lang->line('user_register_body_temp');
				$replaceto = array("email__","userfirstname__","password__","loginlink__");
				$replacewith = array($PostData['Email'],$PostData['FirstName'],$Password,$loginlink);
				$data['message'] = str_replace($replaceto, $replacewith, $data['message']);
				$content = $this->load->view('admin/email/simple_content',$data, TRUE);
				SendEmail(FROM_EMAIL,FROM_NAME,$PostData['Email'],$data['subject'],$content);
				
				$notification['flash_color']  = 'alert-success';
				$notification['flash_message'] = $this->lang->line('user_create_success');
				$this->session->set_flashdata('notification',$notification);
				redirect(base_url('users'));
			}	
		}
		else {
			
			$data['LanguageInfo'] = $this->common_model->get_data('languages');
			$data['CurrencyInfo'] = $this->common_model->get_data('currencies');
			$data['CountryInfo'] = $this->common_model->get_data('countries');
			$where = array('BrandType'=>'0');
			$data['BrandInfo'] = $this->common_model->get_data('brands',$where);
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('admin/user_create',$data);
			$this->load->view('includes/footer');	
		}
	}
	
	public function edit($User_Id=NULL)
    {
		if($this->input->post()) {
			
			$PostData = $this->input->post();
			$this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
			$this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|callback_check_email');
			$this->form_validation->set_rules('CompanyName', 'Company Name', 'trim|required');
			$this->form_validation->set_rules('CompanyAddress', 'Company Address', 'trim|required');
			$this->form_validation->set_rules('Phone', 'Phone', 'trim|required|numeric');
			$this->form_validation->set_rules('AccountType', 'Account Type', 'trim|required');
			$this->form_validation->set_rules('Currency_Id', 'Currency', 'trim|required');
			$this->form_validation->set_rules('Language', 'Language', 'trim|required');
			
			if ($this->form_validation->run() == false)
            {
				$data['UserInfo'] = $PostData;
				$where = array('BrandType'=>'0');
				$data['BrandInfo'] = $this->common_model->get_data('brands',$where);
				$where = array('User_Id'=>$User_Id);
				$data['CoeffeciantInfo'] = $this->common_model->get_data('coefficients',$where);
				$data['LanguageInfo'] = $this->common_model->get_data('languages');
				$data['CurrencyInfo'] = $this->common_model->get_data('currencies');
				$data['CountryInfo'] = $this->common_model->get_data('countries');
				$this->load->view('includes/header');
				$this->load->view('includes/sidebar');
				$this->load->view('admin/user_edit',$data);
				$this->load->view('includes/footer');	
            }
            else
			{
				$UpdateData['FirstName'] = $PostData['FirstName'];
				$UpdateData['LastName'] = $PostData['LastName'];
				$UpdateData['Email'] = $PostData['Email'];
				$UpdateData['AccountType'] = $PostData['AccountType'];
				$UpdateData['Phone'] = $PostData['Phone'];
				$UpdateData['CompanyName'] = $PostData['CompanyName'];
				$UpdateData['CompanyAddress'] = $PostData['CompanyAddress'];
				$UpdateData['Currency_Id'] = $PostData['Currency_Id'];
				$UpdateData['Country_Id'] = $PostData['Country_Id'];
				$UpdateData['Language'] = $PostData['Language'];
				$UpdateData['Modified'] = date('Y-m-d H:i:s');
				$UpdateData['CreatedBy'] = $this->session->userdata('User_Id');
				
				$where = array('User_Id'=>$User_Id);
				$this->common_model->update_data('users',$UpdateData,$where);
				$this->common_model->delete_data('coefficients',$where);
				
				if(isset($PostData['Brand_Id']) && !empty($PostData['Brand_Id'])) {
					$length = count($PostData['Brand_Id']);
					for($i=0;$i<$length;$i++) {
						$InsertData = array();
						if(isset($PostData['Status_'.$i])) {
							$InsertData['User_Id'] = $User_Id;	
							$InsertData['Brand_Id'] = $PostData['Brand_Id'][$i];
							$InsertData['Status'] = '0';	
							$InsertData['Value'] = $PostData['Value_'.$i];
							$InsertData['Created'] = date('Y-m-d H:i:s');
							$InsertData['Modified'] = date('Y-m-d H:i:s');						
						}
						else {
							$InsertData['User_Id'] = $User_Id;	
							$InsertData['Brand_Id'] = $PostData['Brand_Id'][$i];
							$InsertData['Status'] = '1';	
							$InsertData['Value'] = 0;
							$InsertData['Created'] = date('Y-m-d H:i:s');
							$InsertData['Modified'] = date('Y-m-d H:i:s');
						}
						$this->common_model->insert_data('coefficients',$InsertData);
					}
				}
				
				$notification['flash_color']  = 'alert-success';
				$notification['flash_message'] = $this->lang->line('user_update_success');
				$this->session->set_flashdata('notification',$notification);
				redirect(base_url('users'));
			}	
		}
		else {
			if(isset($User_Id) && !empty($User_Id)) {
				$where = array('User_Id'=>$User_Id);
				$data['UserInfo'] = $this->common_model->exist_data('users',$where);
				if(isset($data['UserInfo']) && !empty($data['UserInfo'])) {
					$where = array('c.User_Id'=>$User_Id);
					$data['CoeffeciantInfo'] = $this->common_model->user_coefficients($where);
					$data['LanguageInfo'] = $this->common_model->get_data('languages');
					$data['CurrencyInfo'] = $this->common_model->get_data('currencies');
					$data['CountryInfo'] = $this->common_model->get_data('countries');
					$this->load->view('includes/header');
					$this->load->view('includes/sidebar');
					$this->load->view('admin/user_edit',$data);
					$this->load->view('includes/footer');		
				}
				else {
					$notification['flash_color']  = 'alert-danger';
					$notification['flash_message'] = $this->lang->line('common_error');
					$this->session->set_flashdata('notification',$notification);
					redirect(base_url('users'));
				}	
			}
			else {
				$notification['flash_color']  = 'alert-danger';
				$notification['flash_message'] = $this->lang->line('common_error');
				$this->session->set_flashdata('notification',$notification);
				redirect(base_url('users'));
			}
		}
	}
}