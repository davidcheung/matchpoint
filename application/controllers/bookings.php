<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class bookings extends CI_Controller
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
		$this->book();
	}



	function book(){
		$this->load->helper('html');
		$this->load->helper('form');

		$this->data['court_id'] = $_GET['court_id'];
		$this->load->model('court_model');
		$this->data['courts'] = $this->court_model->getCourts( );
		$this->load->view( 'bookings/book' , $this->data); 
	}

	function submitBookings( ){
		$this->load->model('bookings_model');
		$bookings_id = $this->bookings_model->createBookings($_POST);

		if ( $bookings_id > 0) {
			redirect( 'bookings/browse');
		}
		else{
			$this->load->helper('html');
			$this->load->helper('form');
			$this->data['haserror'] = "Failed to book";
			$this->load->view( 'bookings/book' , $this->data); 
		}

	}

	function browse() {

		$this->load->model('bookings_model');
		$this->data['bookings'] = $this->bookings_model->getBookingsByThisGuy( $this->data['user_id'] );
		$this->load->view('bookings/browse' , $this->data );

	}


}