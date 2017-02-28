<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('financeiro_model','',TRUE);
        $this->data['menuFinanceiro'] = 'financeiro';
    }

    public function index()
    {
        $this->data['view'] = 'financeiro/painel';
        $this->load->view('tema/topo',  $this->data);
    }
}
