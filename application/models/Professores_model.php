<?php

/**
 * Class Pessoa_model
 */
class Professores_model extends SY_Model {

    /**
     * @var string
     */
    protected $table = 'smasy_professor';

    /**
     * @var string
     */
    protected $colOrder = 'nome';

    /**
     * @var string
     */
    protected $primaryKey = 'codprof';


    public function getList($offset = '', $limit = ''){
        return
            $this->db
                ->select("{$this->table}.*,
                      pessoa.nome,
                      pessoa.telefone1,
                      pessoa.telefone2,
                      pessoa.email,
                      pessoa.nome")
                ->join('smasy_pessoa as pessoa',$this->table.'.codpessoa = pessoa.codigo','inner')
                ->order_by("pessoa.nome")
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