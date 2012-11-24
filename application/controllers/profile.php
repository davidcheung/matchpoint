<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	function index( )
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			
			$this->load->model( 'profile_model');
			$data['query'] = $this->profile_model->get_profile_by_userid( $data['user_id'] );
			
			$this->load->view('header', $data);
			$this->load->view('profile/index', $data);
		}

	}
	function edit() {

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {


			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->helper('form');


			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$this->load->view('header', $data);
			$this->load->view('profile/edit',$data);
			$this->load->model ( 'profile' );
			
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */