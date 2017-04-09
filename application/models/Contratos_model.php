<?php

/**
 * Class Contratos_model
 */
class Contratos_model extends SY_Model {

    /**
     * @var string
     */
    protected $table = 'smasy_contrato';

    /**
     * @var string
     */
    protected $colOrder = 'nome';

    /**
     * @var string
     */
    protected $primaryKey = 'id';


    public function getTipos(){
        $tipos[] = array('id'=>1,'descricao'=>'Aluno');
        $tipos[] = array('id'=>2,'descricao'=>'Professor');
        $tipos[] = array('id'=>3,'descricao'=>'Funcionario');
        return $tipos;

    }
}