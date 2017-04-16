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

    public function getByFilter($filters = array()){
        if(count($filters) <= 0){
            return false;
        }
        $fieldsPessoa = $this->db->list_fields('smasy_pessoa');


        $this->db->select('*')
            ->join('smasy_pessoa AS pessoa',$this->table.'.codpessoa = pessoa.codigo','inner');

        foreach ($filters as $coluna => $filter){

            if(in_array($coluna,$fieldsPessoa)){
                $table = 'pessoa';
            }else{
                $table = $this->table;
            }

            switch (strtolower($filter['condicao'])){
                case 'like_after':
                    $this->db->like("{$table}.{$coluna}", $filter['valor'], 'after');
                    break;
                case 'like_before':
                    $this->db->like("{$table}.{$coluna}", $filter['valor'], 'before');
                    break;
                case 'like_both':
                    $this->db->like("{$table}.{$coluna}", $filter['valor'], 'both');
                    break;
                case 'where_not_in':
                    $this->db->where_not_in("{$table}.{$coluna}", $filter['valor']);
                    break;
                case 'inkey':
                default:
                    $this->db->where("{$table}.{$coluna}",$filter['valor']);
            }
        }
        return $this->db->get($this->table)->result();
    }
}