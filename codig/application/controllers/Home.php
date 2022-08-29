<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
            $this->load->library(array('grocery_crud'));
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('pizza_fajtak')
                ->set_subject('Pizza')
                ->columns('id','neve','megjegyzes', 'ar', 'tol', 'ig')
                ->display_as('neve','Név')
                ->display_as('megjegyzes','Megjeggyzés')
                ->display_as('ar','Ár');
            $crud->fields('neve','megjegyzes','ar','tol','ig');
            $crud->required_fields('neve','megjegyzes','ar');
            
            $output = $crud->render();
            
            $this->load->view('home', $output);
	}
}
