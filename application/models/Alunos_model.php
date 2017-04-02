<?php
/**
 * Smasy -  Alunos
 *
 * Essa classe é reponsavel pela interação
 * com a base de dados dos alunos do sistema
 *
 * @package		Smasy
 * @subpackage	Models
 * @category	Models
 * @author		Anderson N Isotton
 */
class Alunos_model extends SY_Model {

    protected $table = 'smasy_aluno';

    protected $primaryKey = 'ra';

    public function getList($offset = '', $limit = ''){
        return
            $this->db
                ->select("{$this->table}.ra,
                      pessoaAluno.nome,
                      pessoaResp.telefone1,
                      pessoaResp.telefone2,
                      pessoaResp.email,
                      pessoaResp.nome AS responsavel")
                ->join('smasy_pessoa as pessoaAluno',$this->table.'.codpessoa = pessoaAluno.codigo','inner')
                ->join('smasy_pessoa as pessoaResp',$this->table.'.responsavel = pessoaResp.codigo','left')
                ->order_by("pessoaAluno.nome")
                ->get($this->table, $offset, $limit)
                ->result();
    }

    public function get($id){
        return $this->db
            ->select($this->table.'.*, pessoa.*')
            ->where("{$this->table}.{$this->primaryKey}",$id)
            ->join('smasy_pessoa AS pessoa',$this->table.'.codpessoa = pessoa.codigo','inner')
            ->get($this->table)
            ->row();
    }

}