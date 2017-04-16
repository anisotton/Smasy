<?php
class Turmascmpl_model extends SY_Model {

    /**
     * @var string
     */
    protected $table = 'smasy_turmacmpl';

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
        $this->db->select("{$this->table}.*, pessoa.nome as prof, horario.nome as horario, diasemana.nome as dia,diasemana.name as day,CONCAT(CONVERT(horario.horaini,CHAR(5)), ' as ', CONVERT(horario.horafim,CHAR(5))) as hora")
            ->join('smasy_professor as professor',$this->table.'.codprof = professor.codprof','inner')
            ->join('smasy_pessoa as pessoa','professor.codpessoa = pessoa.codigo','inner')
            ->join('smasy_horario as horario',$this->table.'.codhorario = horario.id','inner')
            ->join('smasy_diasemana as diasemana',$this->table.'.coddia = diasemana.id','inner');
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