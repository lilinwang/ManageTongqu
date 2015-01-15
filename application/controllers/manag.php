<?php

class Manag extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model ( 'manag_model' );
		session_start(); 
	}
	function index()
	{   session_unset();
		$this->load->view('managelogin_view');	
		//$this->load->view('manag_view'); 
	} 
	function managelogin()
	{  
		if (empty($_POST))
				$this->load->view('managlogin_view');
		else $this->manag_model->login(); 
	}
	function mainview()
	{  
		$this->load->view('manag_view');
	}
	function logout()
	{  
		session_unset();
		session_destroy(); 
		redirect("manag");
	}
	function pwdmodify()
	{  
		if (empty($_SESSION['managelogin']) || $_SESSION['managelogin'] =='false') header('location:manag'); 
		if (empty($_POST))
				$this->load->view('manag_view');
		else $this->manag_model->pwd(); 
	}
	function addauthority()
	{   if (empty($_SESSION['managelogin']) || $_SESSION['managelogin'] =='false') header('location:manag'); 
		if (empty($_POST))
				$this->load->view('manag_view');
		else $this->manag_model->insert(); 
	}
	function deleteauthority()
	{    if (empty($_SESSION['managelogin']) || $_SESSION['managelogin'] =='false') header('location:manag');
		if (empty($_POST))
				$this->load->view('manag_view');
		else $this->manag_model->delete(); 
	}
	function deleteact()
	{    if (empty($_SESSION['managelogin']) || $_SESSION['managelogin'] =='false') header('location:manag');
		if (empty($_POST))
				$this->load->view('manag_view');
		else $this->manag_model->delete_act(); 
	}
	function viewall()
	{    if (empty($_SESSION['managelogin']) || $_SESSION['managelogin'] =='false') header('location:manag');
		if (empty($_POST))
				$this->load->view('manag_view');
		else $this->manag_model->findact(); 
	}

	function viewhistory()
	{    if (empty($_SESSION['managelogin']) || $_SESSION['managelogin'] =='false') header('location:manag');
		if (empty($_POST))
				$this->load->view('manag_view');
		else $this->manag_model->findhistory(); 
	}
	function modifyact()
	{    if (empty($_SESSION['managelogin']) || $_SESSION['managelogin'] =='false') header('location:manag');
		if (empty($_POST))
				$this->load->view('manag_view');
		else $this->manag_model->modify(); 
	}
	function viewperson()
	{    if (empty($_SESSION['managelogin']) || $_SESSION['managelogin'] =='false') header('location:manag');
		if (empty($_POST))
				$this->load->view('manag_view');
		else $this->manag_model->findperson(); 
	}
	function viewact()
	{   if (empty($_SESSION['managelogin']) || $_SESSION['managelogin'] =='false') header('location:manag');
		if (empty($_POST))
				$this->load->view('manag_view');
		else $this->manag_model->findpersonact(); 
	}
}
?>