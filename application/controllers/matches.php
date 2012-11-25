<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class matches extends CI_Controller
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

	function index( )
	{
		//$this->load->view('courts/find', $this->data);
		$this->create();
	}
	

	function create() {

		$this->load->view('matches/create', $this->data);
	}

	function history(){
		$this->load->view('matches/history', $this->data);
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */