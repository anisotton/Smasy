<?php

class SY_Model extends CI_Model{

    protected $table;

    protected $primaryKey;

    protected $colOrder;

    public function update($data){
        $data['recmodifiedon'] = date('Y-m-d H:i:s');
        $data['recmodifiedby'] = 1;
        return $this->db->where($this->primaryKey,$data[$this->primaryKey])->update($this->table, $data);
    }

    public function add($data){

        $data['reccreatedon'] = date('Y-m-d H:i:s');
        $data['reccreatedby'] = 1;

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == '1')
        {
            return $this->db->insert_id();
        }

        return FALSE;
    }

    public function get($key){
        return $this->db
            ->select($this->table.'.*')
            ->where("{$this->table}.{$this->primaryKey}",$key)
            ->get($this->table)
            ->row();
    }
    /** Função utilizada para buscar a tabela conforme filtros
     * @param array $filters Filtros para busca, no seguinte padrão:
     *              array(key=>array('valor'=>value,'condicao'=>(LIKE|INKEY|NOT|IN)
     * @return array Objetos com o resultado da consulta
     */
    public function getByFilter($filters = array()){
        if(count($filters) <= 0){
            return false;
        }
        $this->db->select($this->table.'.*');
        foreach ($filters as $coluna => $filter){
            switch (strtolower($filter['condicao'])){
                case 'like_after':
                    $this->db->like("{$this->table}.{$coluna}", $filter['valor'], 'after');
                    break;
                case 'like_before':
                    $this->db->like("{$this->table}.{$coluna}", $filter['valor'], 'before');
                    break;
                case 'like_both':
                    $this->db->like("{$this->table}.{$coluna}", $filter['valor'], 'both');
                    break;
                case 'where_not_in':
                    $this->db->where_not_in("{$this->table}.{$coluna}", $filter['valor']);
                    break;
                case 'inkey':
                default:
                    $this->db->where("{$this->table}.{$coluna}",$filter['valor']);
            }
        }
        return $this->db->get($this->table)->result();
    }


    public function getList($offset = '', $limit = ''){
        return
            $this->db
                ->select("{$this->table}.*")
                ->order_by("{$this->table}.{$this->colOrder}")
                ->get($this->table, $offset, $limit)
                ->result();
    }
}
