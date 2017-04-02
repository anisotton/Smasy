<?php

/**
 * Class Smasy Model
 */
class Smasy_model extends CI_Model {

    public function getCidades($estado = '%',$nome='%'){
        return $this->db
            ->select('*')
            ->order_by("nome")
            ->where("estado like '{$estado}' AND nome like '{$nome}'")
            ->get('smasy_cidade')
            ->result();
    }

    public function getEstados(){
        return $this->db
            ->select('*')
            ->order_by("nome")
            ->get('smasy_estado')
            ->result();
    }

}