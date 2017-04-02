<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('config_model','',TRUE);
        $this->data['activeMenu'] = 'config';
    }

    public function index()
    {
        $this->data['view'] = 'configuracoes/painel';
        $this->load->view('layout/index',  $this->data);
    }
}
