<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professores extends SY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('professores_model','',TRUE);
        $this->load->model('contratos_model','',TRUE);
        $this->load->model('smasy_model','',TRUE);
        $this->load->model('pessoa_model','',TRUE);
        $this->data['activeMenu'] = 'professores';
    }

    public function index()
    {
        $this->data['view'] = 'professores/listar';
        $this->data['professores'] = $this->professores_model->getList();
        $this->load->view('layout/index',  $this->data);
    }


    private function professor(){
        $this->layout['head']['scripts'][] = base_url().'assets/js/bootstrap-datepicker.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/pessoas.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/datepicker.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.min.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.theme.min.css';

        $this->data['contratos'] = $this->contratos_model->getByFilter(array('tipo'=>array('valor'=>2)));
        $this->data['estados'] = $this->smasy_model->getEstados();
        $this->data['view'] = 'professores/professor';

        $this->load->view('layout/index', $this->data);
    }

    public function adicionar()
    {
        $this->data['professor']['codprof'] = '-1';
        $this->professor();
    }

    public function edit($id)
    {

        $this->data['professor'] = (array)$this->professores_model->get($id);
        $this->data['professor']['dtnascimento'] = implode('/',array_reverse(explode('-',$this->data['professor']['dtnascimento'])));
        $this->data['naturalidade'] = $this->smasy_model->getCidades($this->data['professor']['estadonatal']);
        $this->data['cidades'] = $this->smasy_model->getCidades($this->data['professor']['estado']);

        $this->professor();
    }


    public function save(){
        $this->load->library('form_validation');
        $this->data['professor'] = array_filter($this->security->xss_clean($this->input->post()));

        $professor['contrato'] = $this->data['professor']['contrato'];
        $professor['valorhora'] = $this->data['professor']['valorhora'];
        $professor['percaluno'] = $this->data['professor']['percaluno'];

        unset($this->data['professor']['contrato']);
        unset($this->data['professor']['valorhora']);
        unset($this->data['professor']['percaluno']);

        if($this->data['professor']['codprof'] == '-1'){
            unset($this->data['professor']['codprof']);
            $isnew = true;
        }
        $this->data['professor']['dtnascimento'] = implode('-',array_reverse(explode('/',$this->data['professor']['dtnascimento'])));

        if ($this->form_validation->run('professor') != false) {
            if($isnew === true){
                $codigo = $this->pessoa_model->add($this->data['professor']);
                $professor['codpessoa'] = $codigo;

                $result = $this->professores_model->add($professor);
            }else{
                $professor['codprof']=$this->data['professor']['codprof'];
                $professor['codpessoa'] = $this->data['professor']['codpessoa'];
                unset($this->data['professor']['codprof']);
                unset($this->data['professor']['codpessoa']);

                $this->data['professor']['codigo'] = $professor['codpessoa'] ;
                $result = $this->pessoa_model->update($this->data['professor']);
                if($result){
                    $result = $this->professores_model->update($professor);
                }

            }

            if($result == TRUE){
                $this->session->set_flashdata('success','Registro adicionado com sucesso!');
                redirect(base_url() . 'professores');
            }else{
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }else{
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        }

        $this->data['view'] = 'professores/professor';

        $this->load->view('layout/index',  $this->data);
    }
}
