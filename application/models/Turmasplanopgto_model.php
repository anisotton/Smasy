<?php
class Turmasplanopgto_model extends SY_Model {

    /**
     * @var string
     */
    protected $table = 'smasy_turmaplanopgto';

    /**
     * @var string
     */
    protected $colOrder = 'nome';

    /**
     * @var string
     */
    protected $primaryKey = 'codturma';


    public function getByFilter($filters = array()){
        if(count($filters) <= 0){
            return false;
        }
        $this->db->select("{$this->table}.*,planospgto.*")
            ->join('smasy_planospgto as planospgto',$this->table.'.idplano = planospgto.id','inner');
        foreach ($filters as $coluna => $filter){
            if(!isset($filter['condicao'])){
                $filter['condicao'] = '';
            }
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
    
}