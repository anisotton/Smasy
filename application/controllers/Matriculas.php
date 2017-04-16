<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matriculas extends SY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('matriculas_model','',TRUE);
        $this->model = $this->matriculas_model;
        //$this->data['activeMenu'] = 'turmas';
        //$this->data['activeSubMenu'] = 'modalidades';
    }

    public function index()
    {
        $this->data['view'] = 'matriculas/listar';
        $this->data['dados'] = $this->model->getList();
        $this->load->view('layout/index',  $this->data);
    }

    private function matricula(){
        $this->data['view'] = 'matriculas/matricula';

        $this->load->view('layout/index', $this->data);
    }


    public function edit($id)
    {
        $this->data['dado'] = (array)$this->model->get($id);
        $this->data['dado']['valor'] = str_replace('.',',',$this->data['dado']['valor']);
        $this->matricula();
    }


    public function save(){
        $this->load->library('form_validation');
        $this->data['dado'] = array_filter($this->security->xss_clean($this->input->post()));

        if($this->data['dado']['id'] == '-1'){
            unset($this->data['dado']['id']);
            $isnew = true;
        }

        if ($this->form_validation->run('matricula') != false) {

            $this->data['dado']['dtmatricula'] = date('Y-m-d');
            $this->data['dado']['dtvencimento'] = new DateTime("+ {$this->data['dado']['meses']} Months");
            $this->data['dado']['dtvencimento'] = $this->data['dado']['dtvencimento']->format('Y-m-d');
            $this->data['dado']['status'] = 1;
            unset($this->data['dado']['meses']);

            if($isnew === true){
                $result = $this->model->add($this->data['dado']);
            }else{
                $result = $this->model->update($this->data['dado']);
            }

            if($result !== FALSE){
                $this->session->set_flashdata('success','Aluno matriculado com sucesso!');
            }else{
                $this->session->set_flashdata('error','<div class="form_error"><p>Ocorreu um erro.</p></div>');
            }
        }else{
            $this->session->set_flashdata('error',(validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false));
        }

        redirect(base_url() . 'turmas/visualizar/'.$this->data['dado']['codturma']);
    }
}
