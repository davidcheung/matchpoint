<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class courts extends CI_Controller
{
	var $data;
	function __construct()
	{
		parent::__construct();
		error_reporting(E_ALL ^ (E_NOTICE));
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
		$this->find();
	}
	

	function find() {

		$this->load->model('court_model');
		$this->data['courts'] = $this->court_model->getCourts();

		$this->load->model('profile_model');
		$this->data['profile'] = $this->profile_model->get_profile_by_userid( $this->data['user_id']);

		$this->load->view('courts/find', $this->data);
	}

	function create(){
		$this->load->helper('html');
		$this->load->helper('form');
		$this->data['surfaceType'] = $this->getSurfaceTypes();
		$this->load->view('courts/create', $this->data);	
	}

	function createSubmit(){
		$this->data['post'] = $_POST;
		$this->load->model('court_model');
		$this->court_model->create_court( $this->data['post'] );


		//$this->load->view( 'test' , $this->data); //this test view is used to display posted data
		redirect( 'courts/find' );
	}

	function getSurfaceTypes(){
		$this->load->model('court_model');
		return  $this->court_model->getSurfaceTypes();
	}

	function book(){
		$this->data['post'] = $_GET;
		$this->load->view( 'test' , $this->data); //this test view is used to display posted data
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */