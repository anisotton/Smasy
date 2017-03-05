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

    private $table = 'alunos';

    private $primaryKey = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function getList($offset = '', $limit = ''){
        return $this->db->select('id,nome,tel_celular,tel_fixo,email')->get($this->table, $offset, $limit)->result();
    }

    public function get($id){
        return $this->db->get($this->table,array('id' => $id))->row();
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