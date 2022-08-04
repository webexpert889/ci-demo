<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Mailchimp {

	public function add_mailichimp($company_email,$name,$list_code){

		$post_parms = json_encode(array (
			'email_address' => $company_email,
			'status' => 'subscribed',
			'merge_fields' => 
			array (
			  'FIRSTNAME' => $name,
			),
		));

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => Mail_Chimp_URL.'/'.$list_code.'/members/',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $post_parms,
		CURLOPT_HTTPHEADER => array(
			"authorization: Basic ".Mail_Chimp_API_KEY,
			"cache-control: no-cache",
			"content-type: application/json",
			"postman-token: 53d04a93-5cef-1061-0d65-81017c7b4ad9"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
			return false;
		} else {
			$response = json_decode($response);
		if($response->status!=404){
			if( isset($response->id) && !empty($response->id)){
				return true;
			}else{
				return $response->detail;
			}
		}else{
			return false;
		}
			echo $response;
			return true;
		}
	}

	public function get_mailichimp($List_code,$email){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => Mail_Chimp_URL.'/'.$List_code.'/members/'.$email,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"authorization: Basic ".Mail_Chimp_API_KEY,
			"cache-control: no-cache",
			"content-type: application/json",
			"postman-token: da36d71e-b0c9-30d1-c19d-7f37cfcb08e0"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		echo "cURL Error #:" . $err;
		return false;
		} else {
		$response = json_decode($response);
		if($response->status!=404){
			if( isset($response->id) && !empty($response->id)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
		echo $response;
		return true;
		}
	}
}

