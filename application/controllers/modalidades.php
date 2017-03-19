<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modalidades extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('modalidades_model','',TRUE);
        $this->data['activeMenu'] = 'modalidades';
    }

    public function index()
    {
        $this->data['view'] = 'modalidades/listar';
        $this->load->view('layout/index',  $this->data);
    }
}
