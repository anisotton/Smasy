<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('alunos_model','',TRUE);
        $this->data['menuAlunos'] = 'alunos';
    }

    public function index()
    {
        $this->data['view'] = 'alunos/listar';
        $this->load->view('tema/topo',  $this->data);
    }
}
