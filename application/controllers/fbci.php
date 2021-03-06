<?php 
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include the facebook.php from libraries directory
 require_once APPPATH.'libraries/facebook/facebook.php';
//require_once APPPATH.'libraries/facebook.php';

class Fbci extends CI_Controller {

   public function __construct(){
	    parent::__construct();
	    $this->load->library('session');  //Load the Session 
		$this->config->load('facebook');
 //$this->load->library('facebook');		//Load the facebook.php file which is located in config directory
    }
	public function index()
	{
	  $this->load->view('main'); //load the main.php file for view
	}
	
	function logout(){
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		$this->session->sess_destroy();  //session destroy
		header('Location: '.$base_url);  //redirect to the home page
		
	}
	function fblogin(){
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		//get the Facebook appId and app secret from facebook.php which located in config directory for the creating the object for Facebook class
    	$facebook = new Facebook(array(
		'appId'		=>  $this->config->item('1402541593364237'), 
		'secret'	=> $this->config->item('c03b678468dd6ca158478b9c030a3efe'),
		'cookie'    => TRUE, /* Optional */
        'oath'      => TRUE  /* Optional */
		));
		 //$session = $facebook->getSession();
		 $_REQUEST += $_GET; 
		 $user = $facebook->getUser(); // Get the facebook user id 
	 print_r($user);die;
	 
        //$user = $facebook->api('/me');
	  
		if($user){
			
			try{
				$user_profile = $facebook->api('/me');  //Get the facebook user profile data
				
				$params = array('next' => $base_url.'fbci/logout');
				
				$ses_user=array('User'=>$user_profile,
				   'logout' =>$facebook->getLogoutUrl($params)   //generating the logout url for facebook 
				);
		        $this->session->set_userdata($ses_user);
				header('Location: '.$base_url);
			}catch(FacebookApiException $e){
				error_log($e);
				$user = NULL;
			}		
		}	
		$this->load->view('main');
	}
	
}

/* End of file fbci.php */
/* Location: ./application/controllers/fbci.php */