<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smasy extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('smasy_model','',TRUE);
        $this->data['activeMenu'] = 'home';
    }

    public function index()
    {
        $this->data['view'] = 'smasy/painel';
        $this->load->view('layout/index',  $this->data);
    }
}
