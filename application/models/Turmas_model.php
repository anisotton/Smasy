<?php
class Turmas_model extends SY_Model {

    /**
     * @var string
     */
    protected $table = 'smasy_turma';

    /**
     * @var string
     */
    protected $colOrder = 'nome';

    /**
     * @var string
     */
    protected $primaryKey = 'codturma';


    public function getList($offset = '', $limit = ''){

        return $this->db
            ->select("{$this->table}.*,
                modalidade.nome as modalidade,
                sala.nome as sala,
                GROUP_CONCAT(DISTINCT pessoa.nome separator '|') as professor,
                GROUP_CONCAT(dia.nome separator '|') as dias,
                GROUP_CONCAT(dia.id separator '|') as coddias,
                GROUP_CONCAT(DISTINCT CONCAT(CONVERT(horario.horaini,CHAR(5)), ' as ', CONVERT(horario.horafim,CHAR(5))) separator '|') as horario")
            ->join('smasy_turmacmpl as cmpl',$this->table.'.codturma = cmpl.codturma','inner')
            ->join('smasy_modalidade as modalidade',$this->table.'.codmodalidade = modalidade.id','inner')
            ->join('smasy_horario as horario','cmpl.codhorario = horario.id','inner')
            ->join('smasy_professor as professor','cmpl.codprof = professor.codprof','inner')
            ->join('smasy_pessoa as pessoa','professor.codpessoa = pessoa.codigo','inner')
            ->join('smasy_diasemana as dia','cmpl.coddia = dia.id','inner')
            ->join('smasy_sala as sala',$this->table.'.codsala = sala.id','inner')
            ->order_by("{$this->table}.{$this->colOrder}")
            ->group_by("{$this->table}.codturma")
            ->get($this->table, $offset, $limit)
            ->result();
    }

    public function get($key){
        return $this->db
            ->select($this->table.'.*,sala.nome as sala, faixaetaria.nome as faixaetaria')
            ->join('smasy_sala as sala',$this->table.'.codsala = sala.id','inner')
            ->join('smasy_faixaetaria as faixaetaria',$this->table.'.codfaixaetaria = faixaetaria.id','inner')
            ->where("{$this->table}.{$this->primaryKey}",$key)
            ->get($this->table)
            ->row();
    }

    public function getAlunosAptoMatric($codturma){
        $turma = $this->get($codturma);
        $this->load->model('faixaetarias_model','',TRUE);

        $faixa = $this->faixaetarias_model->get($turma->codfaixaetaria);

        $dataIni = new DateTime(" - {$faixa->idadeini} years");
        $dataFim = new DateTime(" - {$faixa->idadefim} years");

        return $this->db
            ->select("smasy_aluno.*,
                      pessoaAluno.nome,
                      YEAR(FROM_DAYS(DATEDIFF(CURRENT_DATE,pessoaAluno.dtnascimento))) as idade,
                      pessoaResp.telefone1,
                      pessoaResp.telefone2,
                      pessoaResp.email,
                      pessoaResp.nome AS responsavel")
            ->join('smasy_pessoa as pessoaAluno','smasy_aluno.codpessoa = pessoaAluno.codigo','inner')
            ->join('smasy_pessoa as pessoaResp','smasy_aluno.responsavel = pessoaResp.codigo','left')
            ->where('YEAR(FROM_DAYS(DATEDIFF(CURRENT_DATE,pessoaAluno.dtnascimento))) >=',$faixa->idadeini)
            ->where('YEAR(FROM_DAYS(DATEDIFF(CURRENT_DATE,pessoaAluno.dtnascimento))) <=',$faixa->idadefim)
            ->where("ra NOT IN(SELECT ra FROM smasy_matriculaaluno WHERE codturma = '{$turma->codturma}')")
            ->order_by("pessoaAluno.nome")
            ->get('smasy_aluno')
            ->result();
    }

    public function getAlunosMatric($codturma){

        $alunos['alunos']=$this->db
            ->select("matric.*,
                      pessoaAluno.nome,
                      pessoaResp.telefone1,
                      pessoaResp.telefone2,
                      pessoaResp.telefone3,
                      pessoaResp.email,
                      pessoaResp.nome AS responsavel")
            ->join('smasy_aluno as aluno','aluno.ra = matric.ra','inner')
            ->join('smasy_pessoa as pessoaAluno','aluno.codpessoa = pessoaAluno.codigo','inner')
            ->join('smasy_pessoa as pessoaResp','aluno.responsavel = pessoaResp.codigo','left')
            ->where("matric.codturma",$codturma)
            ->get('smasy_matriculaaluno as matric')
            ->result();

        $alunos['total'] = count($alunos['alunos']);

        return $alunos;
    }
}