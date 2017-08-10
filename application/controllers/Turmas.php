<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turmas extends SY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('turmascmpl_model','',TRUE);
        $this->load->model('turmasplanopgto_model','',TRUE);
        $this->load->model('turmas_model','',TRUE);
        $this->model = $this->turmas_model;
        $this->data['activeMenu'] = 'turmas';
        $this->data['activeSubMenu'] = 'turmas';

    }

    public function index()
    {
        $this->data['view'] = 'turmas/listar';
        $this->layout['head']['scripts'][] = base_url().'assets/js/jquery.dataTables.min.js';
        $this->data['table']['cabecalho'] =
            array('Nome','Modalidade','Sala','Dias','Horario','Professor','Matriculados','#');

        $this->data['table']['primarykey'] = $this->model->getPrimary();
        $this->data['table']['dados'] = $this->model->getList();
        $this->data['table']['icon'] = 'fa-book';
        $this->data['table']['titulo'] = 'Turmas';
        $this->data['table']['actions'] = array('edit'=>array('icon'=>'fa-pencil-square','url'=>'turmas/edit/%s'),'rowclickable'=>'turmas/visualizar/%s');
        $this->load->view('layout/index',  $this->data);
    }

    private function turma(){
        $this->load->model('modalidades_model','',TRUE);
        $this->load->model('salas_model','',TRUE);
        $this->load->model('faixaetarias_model','',TRUE);
        $this->load->model('coligadas_model','',TRUE);

        $this->data['view'] = 'turmas/turma';

        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/turmas.js';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.min.css';
        $this->layout['head']['stylesheets'][] = base_url().'assets/css/jquery-ui.theme.min.css';
        $this->data['coligadas'] = $this->coligadas_model->getList();
        $this->data['modalidades'] = $this->modalidades_model->getList();
        $this->data['faixaetarias'] = $this->faixaetarias_model->getList();
        $this->data['salas'] = $this->salas_model->getList();

        $this->load->view('layout/index', $this->data);
    }

    public function adicionar()
    {
        $this->data['dado']['id'] = '-1';
        $this->data['dado']['compl'] = array(array(0));
        $this->data['dado']['planospgto'] = array(array(0));
        $this->turma();

    }

    public function visualizar($codturma)
    {
        $this->data['turma'] = (array)$this->model->get($codturma);

        $this->data['turma']['matriculados'] = $this->getAlunosMatric($codturma);

        $filters['codturma'] = array('valor'=>$codturma);

        $this->data['compl'] = $this->turmascmpl_model->getByFilter($filters);
        $this->data['view'] = 'turmas/visualizar';
        $this->load->view('layout/index',  $this->data);
    }

    public function edit($id)
    {
        $this->data['dado'] = (array)$this->model->get($id);
        $this->data['dado']['dtinicial'] = implode('/',array_reverse(explode('-',$this->data['dado']['dtinicial'])));
        $this->data['dado']['dtfinal'] = implode('/',array_reverse(explode('-',$this->data['dado']['dtfinal'])));

        $filters['codturma'] = array('valor'=>$id);
        $this->data['dado']['compl'] = $this->turmascmpl_model->getByFilter($filters);

        $filters['codturma'] = array('valor'=>$id);
        $this->data['dado']['planospgto'] = $this->turmasplanopgto_model->getByFilter($filters);
        $this->turma();
    }

    public function matricular($codturma){
        $this->load->model('modalidades_model','',TRUE);
        $this->load->model('planospgto_model','',TRUE);
        $this->load->model('formaspgto_model','',TRUE);
        $this->load->model('contratos_model','',TRUE);

        $this->layout['head']['scripts'][] = 'assets/js/select2.min.js';
        $this->layout['head']['scripts'][] = 'assets/js/smasy/matricula.js';
        $this->layout['head']['stylesheets'][] = 'assets/css/select2.css';

        $this->data['turma'] = (array)$this->model->get($codturma);
        $filters['codturma'] = array('valor'=>$codturma);
        $this->data['compl'] = $this->turmascmpl_model->getByFilter($filters);
        $this->data['modalidade'] = $this->modalidades_model->get($this->data['turma']['codmodalidade']);
        $this->data['alunos'] = $this->model->getAlunosAptoMatric($this->data['turma']['codturma']);
        $this->data['planospgto'] = $this->planospgto_model->getList();
        $this->data['formaspgto'] = $this->formaspgto_model->getList();
        $this->data['contratos'] = $this->contratos_model->getByFilter(array('tipo'=>array('valor'=>1)));

        $iniaula = new DateTime("next {$this->data['compl'][0]->day}");
        for ($i=1;$i<count($this->data['compl']);$i++){
            $data = new DateTime("next {$this->data['compl'][$i]->day}");
            if($iniaula->getTimestamp() > $data->getTimestamp()){
                $iniaula = clone $data;
            }
        }
        $this->data['turma']['iniaula'] =$iniaula->format('d/m/Y');
        $this->data['turma']['matriculados'] = $this->getAlunosMatric($codturma);
        $this->data['view'] = 'turmas/matricular';
        $this->load->view('layout/index',  $this->data);
    }

    public function getAlunosMatric($codturma){
        return $this->model->getAlunosMatric($codturma);
    }

    public function getQtdAula($data, $dias){
        $inicial = new DateTime($data);
        $final = new DateTime();
        $diasDif = $inicial->diff($final, true)->days;

        $semanas = ceil($diasDif / 7);
        $qtd = (int)$semanas*count($dias);

        if(is_array($dias)){
            foreach ($dias as $dia){
                if($dia > $final->format('N')){
                    $qtd--;
                }
            }
        }else{
            if($dias > $final->format('N')){
                $qtd--;
            }
        }

        return $qtd;
    }

    public function buscaProfessorAutocomplete($nome){
        $this->load->model('professores_model','',TRUE);
        $dado = array();
        $filters['nome'] = array('valor'=>$nome,'condicao'=>'like_after');
        $result = $this->professores_model->getByFilter($filters);

        foreach ($result as $v){
            $dado['id'] = $v->codprof;
            $dado['label'] = $v->nome;
            $dado['value'] = $v->nome;
            $dados[] = $dado;
        }

        echo json_encode($dados);
    }

    public function buscaPlanoAutocomplete($nome){
        $this->load->model('planospgto_model','',TRUE);
        $dado = array();
        $filters['nome'] = array('valor'=>$nome,'condicao'=>'like_after');
        $result = $this->planospgto_model->getByFilter($filters);

        foreach ($result as $v){
            $dado['id'] = $v->id;
            $dado['label'] = $v->nome;
            $dado['value'] = $v->nome;
            $dados[] = $dado;
        }

        echo json_encode($dados);
    }

    public function buscaHorarioAutocomplete($nome){
        $this->load->model('horarios_model','',TRUE);
        $dado = array();
        $filters['nome'] = array('valor'=>$nome,'condicao'=>'like_after');
        $result = $this->horarios_model->getByFilter($filters);

        foreach ($result as $v){
            $dado['id'] = $v->id;
            $dado['label'] = $v->nome;
            $dado['value'] = $v->nome;
            $dados[] = $dado;
        }

        echo json_encode($dados);

    }

    public function buscaDiaAutocomplete($nome){
        $dado = array();

        $this->db
            ->select('*')
            ->like("nome", $nome, 'after')
            ->where('ativo',1);

        $result = $this->db->get('smasy_diasemana')->result();

        foreach ($result as $v){
            $dado['id'] = $v->id;
            $dado['label'] = $v->nome;
            $dado['value'] = $v->nome;
            $dados[] = $dado;
        }

        echo json_encode($dados);
    }

    public function save(){
        $this->load->library('form_validation');

        $this->data['dado'] = array_filter($this->security->xss_clean($this->input->post()));

        if($this->data['dado']['id'] == '-1'){
            unset($this->data['dado']['id']);
            $isnew = true;
        }

        if ($this->form_validation->run('turma') != false) {

            $turmacmpl = $this->data['dado']['turmacmpl'];
            unset($this->data['dado']['turmacmpl']);

            $this->data['dado']['codturma'] = strtoupper($this->data['dado']['codturma']);
            $this->data['dado']['dtinicial'] = implode('-',array_reverse(explode('/',$this->data['dado']['dtinicial'])));
            $this->data['dado']['dtfinal'] = implode('-',array_reverse(explode('/',$this->data['dado']['dtfinal'])));
            if($isnew === true){
                $result = $this->model->add($this->data['dado']);
            }else{
                $result = $this->model->update($this->data['dado']);
            }
            $this->turmascmpl_model->delete($this->data['dado']['codturma']);
            foreach ($turmacmpl as $value){
                unset($value['prof']);
                unset($value['dia']);
                unset($value['horario']);
                $value['codturma'] =  $this->data['dado']['codturma'];
                $this->turmascmpl_model->add($value);
            }
            if($result !== FALSE){

                $this->session->set_flashdata('success','Registro adicionado com sucesso!');
                redirect(base_url() . 'turmas');
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


    public function getTurmasCalendario(){
        $this->load->library('DateTools');


        $diasSemana = $this->datetools->GetYeardays('2017-05-01','2017-05-30');

        $turmas = $this->model->getList();
        $result = array();

        foreach ($turmas as $turma){
            $horarios = explode('|',$turma->horario);
            $dias = explode('|', $turma->coddias);
            foreach($dias as $key => $dia){
                if(count($horarios)>1){
                    $hora = explode(' as ', $horarios[$key]);
                }else{
                    $hora = explode(' as ', $horarios[0]);
                }

                foreach($diasSemana[$dia] as $d){
                    $event['id'] = $turma->codturma;
                    $event['title'] = $turma->modalidade.' - '.$turma->professor;
                    $date = new DateTime("{$d}{$hora[0]}");
                    $event['start'] = $date->format(DateTime::ATOM);
                    $date = new DateTime("{$d}{$hora[1]}");
                    $event['end'] = $date->format(DateTime::ATOM);
                    $event['url'] = base_url().'turmas/visualizar/'.$turma->codturma;
                    $result[] = $event;
                }
            }
        }

        echo json_encode($result);
        exit();
    }
}
