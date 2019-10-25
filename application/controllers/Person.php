<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// import library from REST_Controller 
require APPPATH.'libraries/REST_Controller.php';

// extends class from REST_Controller 
class Person extends REST_Controller {
	// constructor 
    public function __construct() {
        parent:: __construct();
        $this->load->model('PersonM');
    }

    // index method to display all person data using the get 
    public function index_get(){
	    $response = $this->PersonM->all_person();
	    $this->response($response);
  	}

  	// to add people using the method post 
  	public function add_post(){
	    $response = $this->PersonM->add_person(
	        $this->post('name'),
	        $this->post('address'),
	        $this->post('phone')
	      );
	    $this->response($response);
  	}

  	// update person data using the 
  	public function update_put(){
	    $response = $this->PersonM->update_person(
	        $this->put('id'),
	        $this->put('name'),
	        $this->put('address'),
	        $this->put('phone')
	      );
	    $this->response($response);
  	}

  	// delete the person data using the delete method 
  	public function delete_delete(){
  		$id = $this->uri->segment(3);
  		// $r = $this->delete('id');
  		// $this->response($id);
	    $response = $this->PersonM->delete_person(
	        $id
	     );
	    $this->response($response);
  	}
}