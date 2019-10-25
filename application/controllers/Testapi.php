<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// import library from REST_Controller 
require APPPATH.'libraries/REST_Controller.php';

// extends class from REST_Controller 
class TestApi extends REST_Controller {

    // constructor 
    public function __construct() {
        parent:: __construct();
    }

    public function index_get() {
        // testing response
        $response ['status'] = 200;
        $response ['error'] = false; 
        $response ['message'] = 'Hi from Rejohn Api'; 
        //display response
        $this-> response($response); 
    }

    public function user_get() { 
        // testing response 
        $response ['status'] = 200; 
        $response ['error'] = false;
        $response ['user'] ['username'] = 'erthru'; 
        $response ['user'] ['email'] = ' ersaka96@gmail.com '; 
        $response ['user'] ['detail'] ['full_name'] = 'Suprianto D'; 
        $response ['user'] ['detail'] ['position'] = 'Developer'; 
        $response ['user'] ['detail'] ['specialize'] = 'Android, IOS, WEB, Desktop'; 
        // display response 
        $this-> response($response); 
    } 


}
