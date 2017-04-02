<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smasy extends SY_Controller {

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

    public function getCidadesAjax($value){
        if(is_numeric($value)){
            $result = $this->smasy_model->getCidades($value);
        }else{
            $this->load->helper('text');
            $value = convert_accented_characters(urldecode($value));
            $result = $this->smasy_model->getCidades('%', $value);
        }

        foreach ($result as $v){
            $cidade['nome'] = $v->nome;
            $cidade['value'] = $v->id;
            $cidades[] = $cidade;
        }

        echo json_encode($cidades);
    }
}
