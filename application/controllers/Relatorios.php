<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->data['activeMenu'] = 'relatorios';
    }

    public function index()
    {
        $this->data['view'] = 'relatorios/painel';
        $this->load->view('layout/index',  $this->data);
    }

    public function contratos($tipo, $id){
        switch($tipo){

            case 'professor':
                $this->contratoProfessor($id);
        }
    }

    private function contratoProfessor($id){

        $this->load->model('professores_model','',TRUE);
        $this->load->model('contratos_model','',TRUE);
        $professor = $this->professores_model->get($id);
        $contrato = $this->contratos_model->get($professor->contrato);

        $this->load->library('PHPWord');

        $document = $this->phpword->loadTemplate($contrato->caminhoarquivo);

        foreach ($professor as $k=>$v){
            $document->setValue($k.'professor', utf8_decode($v));
        }
        $document->setValue('data',date('d/m/Y'));

        $document->save('assets/arquivos/contrato.docx');

        redirect(base_url() . 'assets/arquivos/contrato.docx');

    }
}
