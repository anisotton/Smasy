<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planospgto extends SY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('planospgto_model','',TRUE);
        $this->model = $this->planospgto_model;
        $this->data['activeMenu'] = 'financeiro';
        $this->data['activeSubMenu'] = 'planospgto';
    }

    public function index()
    {
        $this->data['view'] = 'financeiro/planospgto/listar';

        $this->data['table']['cabecalho'] =
            array('Nome','Desconto','Tipo desconto','Parcelas');

        $this->data['table']['primarykey'] = $this->model->getPrimary();
        $this->data['table']['dados'] = $this->model->getList();
        $this->data['table']['icon'] = 'fa-money';
        $this->data['table']['titulo'] = 'Planos de pagamento';
        $this->data['table']['actions'] = array('rowclickable'=>'planospgto/edit/%s');

        $this->load->view('layout/index',  $this->data);
    }

    private function planopgto(){
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/planospgto.js';
        $this->data['view'] = 'financeiro/planospgto/planopgto';

        $this->load->view('layout/index', $this->data);
    }

    public function adicionar()
    {
        $this->data['dado']['id'] = '-1';
        $this->planopgto();
    }

    public function edit($id)
    {
        $this->data['dado'] = (array)$this->model->get($id);

        if($this->data['dado']['tipodesconto'] == 1){
            $valor = str_replace('.',',',$this->data['dado']['desconto']);
        }else{
            $valor = $this->data['dado']['desconto'];
        }

        $this->data['dado']['desconto'] = $valor;
        $this->planopgto();
    }


    public function save(){
        $this->load->library('form_validation');
        $this->data['dado'] = array_filter($this->security->xss_clean($this->input->post()));

        if($this->data['dado']['id'] == '-1'){
            unset($this->data['dado']['id']);
            $isnew = true;
        }

        if ($this->form_validation->run('planopgto') != false) {

            if($this->data['dado']['tipodesconto'] == 1){
                $valor = str_replace(',','.',str_replace('.','',$this->data['dado']['desconto']));
            }else{
                $valor = $this->data['dado']['desconto'];
            }

            $this->data['dado']['desconto'] = $valor;

            if($isnew === true){
                $result = $this->model->add($this->data['dado']);
            }else{
                $result = $this->model->update($this->data['dado']);
            }

            if($result == TRUE){
                $this->session->set_flashdata('success','Registro adicionado com sucesso!');
                redirect(base_url() . 'planospgto');
            }else{
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }else{
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        }

        if($isnew === true){
            $this->adicionar();
        }else{
            $this->edit($this->data['dado']['id']);
        }
    }
}
