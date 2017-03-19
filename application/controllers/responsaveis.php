<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsaveis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('responsaveis_model', '', TRUE);
        $this->data['activeMenu'] = 'alunos';
    }

    public function index()
    {
        $this->data['responsaveis'] = $this->responsaveis_model->getList();
        $this->data['view'] = 'responsaveis/listar';
        $this->data['activeSubMenu'] = 'responsavel';

        $this->load->view('layout/index', $this->data);
    }

    public function save(){
        $this->load->library('form_validation');
        $this->data['responsavel'] = $this->security->xss_clean($this->input->post());

        if($this->data['responsavel']['id'] == '-1'){
            unset($this->data['responsavel']['id']);
            $isnew = true;
        }

        if ($this->form_validation->run('responsaveis') != false) {
            if($isnew === true){
                $result = $this->responsaveis_model->add($this->data['responsavel']);
            }else{
                $result = $this->responsaveis_model->update($this->data['responsavel']);
            }
            if($result == TRUE){
                $this->session->set_flashdata('success','Responsável adicionado com sucesso!');
                    redirect(base_url() . 'responsaveis');
            }else{
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }else{
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        }

        $this->data['view'] = 'responsaveis/responsavel';
        $this->load->view('layout/index',  $this->data);
    }

    public function saveModal(){
        $this->load->library('form_validation');
        $this->data['responsavel'] = $this->security->xss_clean($this->input->post());

        unset($this->data['responsavel']['id']);

        if ($this->form_validation->run('responsaveis') != false) {
            if($this->responsaveis_model->add($this->data['responsavel'])){
                echo 'Responsável adicionado com sucesso!';
            }else{
                echo 'Erro ao adicionar responsável!';
            }
        }else{
            echo 'Erro ao adicionar responsável!';
        }
    }


    public function autoCompleteResp($nome){
        $responsaveis = array();
        $result = $this->responsaveis_model->getByFilter(array('nome'=>$nome));

        foreach ($result as $v){
            $responsavel['id'] = $v->id;
            $responsavel['label'] = $v->nome;
            $responsavel['value'] = $v->nome;
            $responsaveis[] = $responsavel;
        }

        echo json_encode($responsaveis);

    }

    public function adicionar($modal = false){
        $this->layout['head']['scripts'][] = base_url().'assets/js/bootstrap-datepicker.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/responsaveis.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/datepicker.css';

        $this->data['responsavel'] = array('id'=>'-1');
        $this->data['modal'] = $modal;
        $this->data['view'] = 'responsaveis/responsavel';
        $this->data['activeSubMenu'] = 'responsaveis';

        if($this->data['modal'] === false){
            $this->load->view('layout/index', $this->data);
        }else{
            $this->load->view($this->data['view'], $this->data);
        }
    }

    public function edit($id)
    {
        $this->layout['head']['scripts'][] = base_url().'assets/js/bootstrap-datepicker.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/responsaveis.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/datepicker.css';

        $this->data['responsavel'] = (array)$this->responsaveis_model->get($id);
        $this->data['modal'] = false;
        $this->data['responsavel']['dataNasc'] = implode('/',array_reverse(explode('-',$this->data['aluno']['dataNasc'])));

        $this->data['view'] = 'responsaveis/responsavel';
        $this->load->view('layout/index',  $this->data);
    }
}