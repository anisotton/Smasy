<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('financeiro_model','',TRUE);
        $this->data['activeMenu'] = 'financeiro';
    }

    public function index()
    {
        $this->data['activeSubMenu'] = 'painel';
        $this->data['view'] = 'financeiro/painel';
        $this->load->view('layout/index',  $this->data);
    }


    public function contratos()
    {
        $this->data['activeSubMenu'] = 'contratos';
        $this->data['view'] = 'financeiro/contratos';
        $this->load->view('layout/index',  $this->data);
    }
}
