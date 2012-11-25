<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller
{
	var $data;
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} 
		else{
			$this->data['user_id']	= $this->tank_auth->get_user_id();
			$this->data['username']	= $this->tank_auth->get_username();
			$this->load->view('header', $this->data);
		}
	}


	
	function index() {
		$this->view();
	}


	function view( )
	{
		
			
			$this->load->model( 'profile_model');
			//$data['query'] = $this->profile_model->get_profile_by_userid( $data['user_id'] );			
			
			$this->load->view('profile/view', $this->data);
			

	}
	

	function edit() {

		$this->load->helper('html');
		$this->load->helper('form');


	
		$this->load->view('profile/edit',$this->data);
		
			
		
	}

	function browse () 
	{
		$this->load->model ( 'profile_model' );
		$this->data['query'] = $this->profile_model->get_all();

		$this->load->view('profile/browse',$this->data);
	}

	function player(  )
	{
		$this->load->model( 'profile_model');

		$data['players'] = $this->profile_model->get('entries');
		$this->load->view( 'profile/player');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */