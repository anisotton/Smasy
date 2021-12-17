<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modalidades extends SY_Controller {

    protected $data = array('activeMenu' => 'params', 'activeSubMenu' => 'modalidades');

    protected $viewBase = 'params/';

    protected function Modalidade(){
        $this->data['view'] = 'params/modalidades/modalidade';

        $this->data['dado']['valor'] = str_replace('.', ',', $this->data['dado']['valor']);
        $this->data['dado']['taxamatricula'] = str_replace('.', ',', $this->data['dado']['taxamatricula']);

        $this->load->view('layout/index', $this->data);
    }

}
