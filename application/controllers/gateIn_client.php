<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gatein_client extends CI_Controller {

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

    // header
		$header = array(
		    'Accept: application/json',
		    'Content-Type: application/x-www-form-urlencoded',
		    'Authorization: Basic YWRtaW46YWRtaW4xMjM='
		);

    // parameter
		$data = array(
	            'billto'       	=> 'ACE',
	            'container_no'	=>  'NYKU823017',
	            'bl_no' 				=>  'OOLU2598413640',
	            'gate_in_cdp' 	=> '2018-01-19');

    // method of send
		$insert =  $this->curl->simple_post($this->API, $data, array(CURLOPT_HTTPHEADER => $header));

    // result message
		echo json_encode($insert);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
