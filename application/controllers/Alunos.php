<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends SY_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('alunos_model','',TRUE);
        $this->load->model('smasy_model','',TRUE);
        $this->load->model('pessoa_model','',TRUE);
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
        $this->layout['head']['scripts'][] = base_url().'assets/js/masked.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/pessoas.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/alunos.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/datepicker.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.min.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.theme.min.css';
        $this->data['estados'] = $this->smasy_model->getEstados();
        $this->data['aluno'] = array('ra'=>'-1');
        $this->data['view'] = 'alunos/aluno';
        $this->load->view('layout/index',  $this->data);
    }

    public function save(){
        $this->load->library('form_validation');
        $this->data['aluno'] = array_filter($this->security->xss_clean($this->input->post()));
        if($this->data['aluno']['ra'] == '-1'){
            unset($this->data['aluno']['ra']);
            $isnew = true;
        }
        $this->data['aluno']['dtnascimento'] = implode('-',array_reverse(explode('/',$this->data['aluno']['dtnascimento'])));
        $dtnascimento = new DateTime($this->data['aluno']['dtnascimento']);
        $now = new DateTime('today');
        $idade = $dtnascimento->diff($now)->y;
        $aluno['responsavel'] = $this->data['aluno']['id_responsavel'];
        unset($this->data['aluno']['id_responsavel']);
        unset($this->data['aluno']['responsavel']);

        $validation = 'alunoMenor';
        if($idade >= 18){
            $validation = 'alunoMaior';
        }

        if ($this->form_validation->run($validation) != false) {
            if($isnew === true){
                $codigo = $this->pessoa_model->add($this->data['aluno']);
                if($validation == 'alunoMaior'){
                    $aluno['responsavel'] = $codigo;
                }
                $aluno['codpessoa'] = $codigo;
                $aluno['anoingresso'] = date('Y');
                $result = $this->alunos_model->add($aluno);
            }else{
                $aluno['ra']=$this->data['aluno']['ra'];
                $aluno['codpessoa'] = $this->data['aluno']['codpessoa'];
                unset($this->data['aluno']['ra']);
                unset($this->data['aluno']['codpessoa']);

                $this->data['aluno']['codigo'] = $aluno['codpessoa'] ;
                $result = $this->pessoa_model->update($this->data['aluno']);
                if($result){
                    $result = $this->alunos_model->update($aluno);
                }
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

        $dtnascimento = new DateTime($this->data['aluno']['dtnascimento']);
        $now = new DateTime('today');
        $this->data['aluno']['maior'] = ($dtnascimento->diff($now)->y >=18)?true:false;

        if($this->data['aluno']['maior']){
            $this->data['aluno']['id_responsavel'] = $this->data['aluno']['responsavel'];
        }else{
            $this->data['aluno']['id_responsavel'] = $this->data['aluno']['responsavel'];
            $this->data['aluno']['responsavel'] = $this->pessoa_model->get($this->data['aluno']['responsavel']);
            $this->data['aluno']['responsavel'] = $this->data['aluno']['responsavel']->nome;
        }
        $this->data['aluno']['dtnascimento'] = implode('/',array_reverse(explode('-',$this->data['aluno']['dtnascimento'])));

        $this->data['estados'] = $this->smasy_model->getEstados();
        $this->data['naturalidade'] = $this->smasy_model->getCidades($this->data['aluno']['estadonatal']);
        $this->data['cidades'] = $this->smasy_model->getCidades($this->data['aluno']['estado']);

        $this->data['view'] = 'alunos/aluno';
        $this->load->view('layout/index',  $this->data);
    }

    public function buscaRespAutocomplete($nome){
        $responsaveis = array();
        $dataMaior = new DateTime('today -18 year');
        $filters['nome'] = array('valor'=>$nome,'condicao'=>'like_after');
        $filters['dtnascimento <='] = array('valor'=>$dataMaior->format('Y-m-d'),'condicao'=>'inkey');
        $result = $this->pessoa_model->getByFilter($filters);

        foreach ($result as $v){
            $responsavel['id'] = $v->codigo;
            $responsavel['label'] = $v->nome;
            $responsavel['value'] = $v->nome;
            $responsaveis[] = $responsavel;
        }

        echo json_encode($responsaveis);

    }
}
