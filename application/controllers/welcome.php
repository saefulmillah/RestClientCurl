<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		parent::__construct();
        $this->API="http://trial.cikarangdryport.com/api/notif/gate-in";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
	}

	function index()
	{
		$this->load->helper('url');
		$this->load->view('welcome_message');
	}

	function test_api()
	{
		$url = 'http://trial.cikarangdryport.com/api/notif/gate-in';

		$curlHandle = curl_init($url);

		$header = array(
		    'Accept: application/json',
		    'Content-Type: application/x-www-form-urlencoded',
		    'Authorization: Basic YWRtaW46YWRtaW4xMjM='
		);
		// curl_setopt(ch, option, value)
		// pass header variable in curl method
		
	    // curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $header);

		$data = array(
	            'billto'       	=> 'ACE',
	            'container_no'	=>  'NYKU823017',
	            'bl_no' 		=>  'OOLU2598413640',
	            'gate_in_cdp' 	=> '2018-01-2018');

	    $insert =  $this->curl->simple_post($this->API, $data, array(CURLOPT_HTTPHEADER => $header)); 
		// $post_data = array(
	 //        'firstname' => 'John',
	 //        'lastname' => 'Doe'
	 //    );

	 //    curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $header);		

		// $ch = curl_init();
	    
	    // curl_setopt($curlHandle, CURLOPT_POST, TRUE);   //is it optional?
	    // curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
	    // curl_exec($curlHandle);
	    // curl_close($curlHandle);
	        
		echo json_encode($insert);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */