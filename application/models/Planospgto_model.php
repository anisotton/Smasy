<?php
class Planospgto_model extends SY_Model {

    /**
     * @var string
     */
    protected $table = 'smasy_planospgto';

    /**
     * @var string
     */
    protected $colOrder = 'nome';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    public function getList($offset = '', $limit = ''){
        return
            $this->db
                ->select("{$this->table}.id,
                        {$this->table}.nome,
                        {$this->table}.desconto,
                        {$this->table}.parcelas, 
                        CASE tipodesconto
                            WHEN 2 THEN 'Percentual'
                            WHEN 1 THEN 'Real'
                            ELSE 'Nenhum'
                        END as tipodesconto")
                ->order_by("{$this->table}.{$this->colOrder}")
                ->get($this->table, $offset, $limit)
                ->result();
    }
    
}