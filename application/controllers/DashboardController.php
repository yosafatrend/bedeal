<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DashboardController extends CI_Controller {

  

 public function __construct()

        {

                parent::__construct();

               $this->load->model(['UserModel','ProductModel']);

        }

 

 

 public function index(){

 	$this->SeesionModel->not_logged_in();

	$data['vendors'] = $this->UserModel->AllRoleTypes('Vendor');

	$data['customers'] = $this->UserModel->AllRoleTypes('Client_cs');
 
 	$this->parser->parse('dashboard/dashboard_index',$data);

 

 }

	

	 

	

	 

}

