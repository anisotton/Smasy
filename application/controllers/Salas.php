<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salas extends SY_Controller {

    protected $data = array('activeMenu' => 'params', 'activeSubMenu' => 'salas');

    protected $viewBase = 'params/';

    protected function sala(){
        $this->load->model('coligadas_model','',TRUE);
        $this->data['view'] = 'params/salas/sala';
        $this->data['coligadas'] = $this->coligadas_model->getList();

        $this->load->view('layout/index', $this->data);
    }

}
