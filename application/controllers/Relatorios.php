<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('relatorios_model','',TRUE);
        $this->data['activeMenu'] = 'relatorios';
    }

    public function index()
    {
        $this->data['view'] = 'relatorios/painel';
        $this->load->view('layout/index',  $this->data);
    }
}