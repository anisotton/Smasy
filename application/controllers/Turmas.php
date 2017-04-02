<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turmas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('turmas_model','',TRUE);
        $this->data['activeMenu'] = 'turmas';
    }

    public function index()
    {
        $this->data['view'] = 'turmas/listar';
        $this->load->view('layout/index',  $this->data);
    }
}
