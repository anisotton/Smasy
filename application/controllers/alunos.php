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
        $this->data['alunos'] = $this->alunos_model->getList();
        $this->data['view'] = 'alunos/listar';

        $this->load->view('tema/topo',  $this->data);
    }

    public function adicionar()
    {
        $this->data['aluno'] = array('id'=>'-1');
        $this->data['view'] = 'alunos/aluno';
        $this->load->view('tema/topo',  $this->data);
    }

    public function save(){
        $this->load->library('form_validation');
        $this->data['aluno'] = $this->security->xss_clean($this->input->post());

        if($this->data['aluno']['id'] == '-1'){
            unset($this->data['aluno']['id']);
            $isnew = true;
        }

        if ($this->form_validation->run('alunos') != false) {
            if($isnew === true){
                $result = $this->alunos_model->add($this->data['aluno']);
            }else{
                $result = $this->alunos_model->update($this->data['aluno']);
            }

            if($result == TRUE){
                $this->session->set_flashdata('success','Aluno adicionado com sucesso!');
                redirect(base_url() . 'alunos');
            }else{
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }else{
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        }

        $this->data['view'] = 'alunos/aluno';

        $this->load->view('tema/topo',  $this->data);
    }

    public function edit($id)
    {
        $this->data['aluno'] = (array)$this->alunos_model->get($id);
        $this->data['view'] = 'alunos/aluno';
        $this->load->view('tema/topo',  $this->data);
    }
}
