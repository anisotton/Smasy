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
class Alunos_model extends CI_Model {

    private $table = 'smasy_alunos';

    private $primaryKey = 'id';

    public function getList($offset = '', $limit = ''){

        return
            $this->db
                ->select("{$this->table}.id,
                      {$this->table}.nome,
                      IFNULL({$this->table}.tel_celular,smasy_responsaveis.tel_celular) AS tel_celular,
                      IFNULL({$this->table}.tel_fixo,smasy_responsaveis.tel_fixo) AS tel_fixo,
                      IFNULL({$this->table}.email,smasy_responsaveis.email) AS email,
                      {$this->table}.id_responsavel,
                       IFNULL(smasy_responsaveis.nome, '-') AS responsavel")
                ->join('smasy_responsaveis',$this->table.'.id_responsavel = smasy_responsaveis.id','left')
                ->order_by("{$this->table}.nome")
                ->get($this->table, $offset, $limit)
                ->result();
    }

    public function get($id){
        return $this->db
            ->select($this->table.'.*, smasy_responsaveis.nome AS responsavel')
            ->where("{$this->table}.{$this->primaryKey}",$id)
            ->join('smasy_responsaveis',$this->table.'.id_responsavel = smasy_responsaveis.id','left')
            ->get($this->table)
            ->row();
    }

    public function update($data){
        return $this->db->where($this->primaryKey,$data[$this->primaryKey])->update($this->table, $data);
    }

    public function add($data){

        $data['created'] = date('Y-m-d H:i:s');
        $data['created_by'] = 1;

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }
}