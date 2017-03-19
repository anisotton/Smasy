<?php
class Responsaveis_model extends CI_Model {

    private $table = 'smasy_responsaveis';

    private $primaryKey = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function getList($offset = '', $limit = ''){
        return $this->db->select('*')->get($this->table, $offset, $limit)->result();
    }

    public function getByFilter($filters){
        return  $this->db->like($filters)->get($this->table)->result();
    }

    public function get($id){
        return $this->db->where($this->primaryKey,$id)->get($this->table)->row();
    }

    public function update($data){
        $data['modified'] = date('Y-m-d H:i:s');
        $data['modified_by'] = 1;
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