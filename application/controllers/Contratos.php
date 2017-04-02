<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contratos extends SY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('contratos_model','',TRUE);
        $this->data['activeMenu'] = 'financeiro';
    }

    public function index()
    {
        $this->data['view'] = 'financeiro/contratos/listar';
        $this->data['contratos'] = $this->contratos_model->getList();
        $this->load->view('layout/index',  $this->data);
    }

    public function adicionar()
    {
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/contratos.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.min.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.theme.min.css';
        $this->data['contrato']['id'] = '-1';
        $this->data['tipos'] = $this->contratos_model->getTipos();
        $this->data['view'] = 'financeiro/contratos/contrato';

        $this->load->view('layout/index', $this->data);
    }

    public function edit($id)
    {
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/contratos.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.min.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.theme.min.css';
        $this->data['contrato'] = (array)$this->contratos_model->get($id);
        $this->data['tipos'] = $this->contratos_model->getTipos();
        $this->data['view'] = 'financeiro/contratos/contrato';

        $this->load->view('layout/index', $this->data);
    }

    public function save(){
        $this->load->library('form_validation');
        $this->data['contrato'] = array_filter($this->security->xss_clean($this->input->post()));

        $config['overwrite']            = true;
        $config['remove_spaces']        = true;
        $config['file_name']            = strtolower($this->data['contrato']['nome']);
        $config['upload_path']          = FCPATH.'assets/arquivos/contratos/';
        $config['allowed_types']        = 'doc|pdf|txt';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if($this->data['contrato']['id'] == '-1'){
            unset($this->data['contrato']['id']);
            $isnew = true;
        }

        if($isnew or $this->data['contrato']['mudararquivo'] == '1'){
            $upload = $this->upload->do_upload('arquivo');
            $arquivo = array('upload_data' => $this->upload->data());
            $this->data['contrato']['arquivo'] =  base_url().'assets/arquivos/contratos/'.$arquivo['upload_data']['file_name'];
        }else{
            $upload = true;
        }
        if($upload){
            unset($this->data['contrato']['mudararquivo']);
            if ($this->form_validation->run('contrato') != false) {
                if($isnew === true){
                    $result = $this->contratos_model->add($this->data['contrato']);
                }else{
                    $result = $this->contratos_model->update($this->data['contrato']);
                }

                if($result == TRUE){
                    $this->session->set_flashdata('success','Contrato adicionado com sucesso!');
                    redirect(base_url() . 'contratos');
                }else{
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }else{
                $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
            }

        }else{
            $this->data['custom_error'] = '<div class="form_error">'.$this->upload->display_errors().'</div>';
        }



        if($isnew === true){
            $this->adicionar();
        }else{
            $this->edit($this->data['contrato']['id']);
        }
    }
}
