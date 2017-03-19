<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('alunos_model','',TRUE);
        $this->data['activeMenu'] = 'alunos';
    }

    public function index()
    {
        $this->data['alunos'] = $this->alunos_model->getList();
        $this->data['view'] = 'alunos/listar';
        $this->data['activeSubMenu'] = 'lista';

        $this->load->view('layout/index',  $this->data);
    }

    public function adicionar()
    {
        $this->layout['head']['scripts'][] = base_url().'assets/js/bootstrap-datepicker.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/alunos.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/datepicker.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.min.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.theme.min.css';
        $this->data['aluno'] = array('id'=>'-1');
        $this->data['view'] = 'alunos/aluno';
        $this->load->view('layout/index',  $this->data);
    }

    public function save(){
        $this->load->library('form_validation');
        $this->data['aluno'] = $this->security->xss_clean($this->input->post());

        if($this->data['aluno']['id'] == '-1'){
            unset($this->data['aluno']['id']);
            $isnew = true;
        }
        $this->data['aluno']['dataNasc'] = implode('-',array_reverse(explode('/',$this->data['aluno']['dataNasc'])));
        $dataNasc = new DateTime($this->data['aluno']['dataNasc']);
        $now = new DateTime('today');
        $idade = $dataNasc->diff($now)->y;
        unset($this->data['aluno']['responsavel']);

        $validation = 'alunoMenor';
        if($idade >= 18){
            unset($this->data['aluno']['id_responsavel']);
            $validation = 'alunoMaior';
        }

        if ($this->form_validation->run($validation) != false) {
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

        $this->load->view('layout/index',  $this->data);
    }

    public function edit($id)
    {
        $this->layout['head']['scripts'][] = base_url().'assets/js/bootstrap-datepicker.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/alunos.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/datepicker.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.min.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.theme.min.css';

        $this->data['aluno'] = (array)$this->alunos_model->get($id);

        $dataNasc = new DateTime($this->data['aluno']['dataNasc']);
        $now = new DateTime('today');
        $this->data['aluno']['maior'] = ($dataNasc->diff($now)->y >=18)?true:false;

        $this->data['aluno']['dataNasc'] = implode('/',array_reverse(explode('-',$this->data['aluno']['dataNasc'])));

        $this->data['view'] = 'alunos/aluno';
        $this->load->view('layout/index',  $this->data);
    }
}
