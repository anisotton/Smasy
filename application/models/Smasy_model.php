<?php

/**
 * Class Smasy Model
 */
class Smasy_model extends CI_Model {

    public function getCidades($idEstado = '%',$nome='%'){
        return $this->db
            ->select('*')
            ->order_by("nome")
            ->where("estado like '{$idEstado}' AND nome like '{$nome}'")
            ->get('smasy_cidade')
            ->result();
    }

    public function getCidade($id){
        return $this->db
            ->select('*')
            ->order_by("nome")
            ->where("id = '{$id}'")
            ->get('smasy_cidade')
            ->row();
    }

    public function getEstados(){
        return $this->db
            ->select('*')
            ->order_by("nome")
            ->get('smasy_estado')
            ->result();
    }

}