<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas extends SY_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pessoa_model','',TRUE);
        $this->load->model('smasy_model','',TRUE);
        $this->data['activeMenu'] = 'pessoas';
    }

    public function index()
    {
        $this->data['pessoas'] = $this->pessoa_model->getList();
        $this->data['view'] = 'pessoas/listar';
        $this->data['activeSubMenu'] = 'lista';

        $this->load->view('layout/index',  $this->data);
    }

    public function adicionar()
    {
        $this->layout['head']['scripts'][] = base_url().'assets/js/bootstrap-datepicker.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/masked.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/pessoas.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/datepicker.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.min.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.theme.min.css';
        $this->data['estados'] = $this->smasy_model->getEstados();
        if($this->data['pessoa']['estado']){
            $this->data['estados'] = $this->smasy_model->getCidades($this->data['pessoa']['estado']);
        }
        $this->data['pessoa']['codigo'] = '-1';
        $this->data['view'] = 'pessoas/pessoa';

        $this->load->view('layout/index', $this->data);
    }

    public function edit($id)
    {
        $this->layout['head']['scripts'][] = base_url().'assets/js/bootstrap-datepicker.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/masked.js';
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/pessoas.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/datepicker.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.min.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.theme.min.css';

        $this->data['pessoa'] = (array)$this->pessoa_model->get($id);

        $this->data['pessoa']['dtnascimento'] = implode('/',array_reverse(explode('-',$this->data['pessoa']['dtnascimento'])));
        $this->data['pessoa']['ufcartident'] = implode('/',array_reverse(explode('-',$this->data['pessoa']['ufcartident'])));

        $naturalidade = $this->smasy_model->getCidade($this->data['pessoa']['naturalidade']);

        $this->data['pessoa']['naturalidade_desc'] = $naturalidade->nome;
        $this->data['estados'] = $this->smasy_model->getEstados();
        $this->data['cidades'] = $this->smasy_model->getCidades($this->data['pessoa']['estado']);

        $this->data['view'] = 'pessoas/pessoa';
        $this->load->view('layout/index',  $this->data);
    }

    public function save(){
        $this->load->library('form_validation');
        $this->data['pessoa'] = array_filter($this->security->xss_clean($this->input->post()));
        if($this->data['pessoa']['codigo'] == '-1'){
            unset($this->data['pessoa']['codigo']);
            $isnew = true;
        }
        $this->data['pessoa']['dtnascimento'] = implode('-',array_reverse(explode('/',$this->data['pessoa']['dtnascimento'])));
        $this->data['pessoa']['ufcartident'] = implode('-',array_reverse(explode('/',$this->data['pessoa']['ufcartident'])));

        unset($this->data['pessoa']['naturalidade_desc']);

        if ($this->form_validation->run('pessoa') != false) {
            if($isnew === true){
                $result = $this->pessoa_model->add($this->data['pessoa']);
            }else{
                $result = $this->pessoa_model->update($this->data['pessoa']);
            }

            if($result == TRUE){
                $this->session->set_flashdata('success','pessoa adicionado com sucesso!');
                redirect(base_url() . 'pessoas');
            }else{
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }else{
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        }
        if($isnew === true){
            $this->adicionar();
        }else{
            $this->edit($this->data['pessoa']['codigo']);
        }

    }
}