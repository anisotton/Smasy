<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salas extends SY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('salas_model','',TRUE);
        $this->model = $this->salas_model;
        $this->data['activeMenu'] = 'turmas';
        $this->data['activeSubMenu'] = 'salas';
    }

    public function index()
    {
        $this->data['view'] = 'turmas/salas/listar';
        $this->data['dados'] = $this->model->getList();
        $this->load->view('layout/index',  $this->data);
    }

    private function modalidade(){
        $this->data['view'] = 'turmas/salas/sala';

        $this->load->view('layout/index', $this->data);
    }

    public function adicionar()
    {
        $this->data['dado']['id'] = '-1';

        $this->modalidade();

    }

    public function edit($id)
    {
        $this->data['dado'] = (array)$this->model->get($id);
        $this->data['dado']['valor'] = str_replace('.',',',$this->data['dado']['valor']);
        $this->modalidade();
    }


    public function save(){
        $this->load->library('form_validation');
        $this->data['dado'] = array_filter($this->security->xss_clean($this->input->post()));

        if($this->data['dado']['id'] == '-1'){
            unset($this->data['dado']['id']);
            $isnew = true;
        }

        if ($this->form_validation->run('sala') != false) {
            if($isnew === true){
                $result = $this->model->add($this->data['dado']);
            }else{
                $result = $this->model->update($this->data['dado']);
            }

            if($result == TRUE){
                $this->session->set_flashdata('success','Registro adicionado com sucesso!');
                redirect(base_url() . 'salas');
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
