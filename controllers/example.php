<?php

class Example extends CI_Controller {

	var $_list_id  = 'YOUR LIST ID HERE';
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('cmonitor');
	}
	

	
	/*
	 * 
	 * Add a subscriber to a list
	 *
	 */
	function index()
	{	
		$subscriber = array(
			'EmailAddress' => 'example@example.com',
			'Name' => 'username'
	    );
		$result = $this->cmonitor->post_request('subscribers/'.$this->_list_id.'.json', $subscriber);
		if($result->was_successful())
		{
			echo 'yep all was good and this is what was returned '.$result->http_status_code;
			print_r($result);
		}
	}
	
	/*
	 * 
	 * Get an existing subscriber from a list
	 *
	 */
	function get()
	{
		$email = 'example@example.com';
		$result = $this->cmonitor->get_request('subscribers/'.$this->_list_id.'.json?email='.urlencode($email));
		if($result->was_successful())
		{
			echo 'yep all was good and this is what was returned '.$result->http_status_code;
			print_r($result);
		}
    }
	
}
	
/* End of file example.php */
/* Location: ./application/controllers/example.php