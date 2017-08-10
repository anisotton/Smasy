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
        $this->layout['head']['scripts'][] = base_url().'assets/js/moment.min.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/fullcalendar.min.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/fullcalendar-pt-br.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/painel.js';


        $this->layout['head']['stylesheets'][] = base_url().'assets/css/fullcalendar.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/fullcalendar.print.css';
        $this->load->view('layout/index',  $this->data);
    }

    public function getCidadesAjax($idEstado = false, $cidade = false){
        if(is_numeric($idEstado) && $cidade == false){
            $result = $this->smasy_model->getCidades($idEstado);
        }else{
            $this->load->helper('text');
            $cidade = convert_accented_characters(urldecode($cidade));
            $result = $this->smasy_model->getCidades($idEstado, "%".$cidade.'%');
        }

        if(count($result)>0){
            foreach ($result as $v){
                $value['id'] = $v->id;
                $value['label'] = $v->nome;
                $value['value'] = $v->nome;
                $value['estado'] = $v->estado;
                $cidades[] = $value;
            }
        }else{
            $value['id'] = '';
            $value['label'] = 'Cidade não encontrada';
            $value['value'] = '';
            $value['estado'] = '';
            $cidades[] = $value;
        }


        echo json_encode($cidades);
    }
}
