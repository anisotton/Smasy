<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coligadas extends SY_Controller {

    protected $data = array('activeMenu' => 'params', 'activeSubMenu' => 'coligadas');

    protected $viewBase = 'params/';

    protected function coligada(){
        $this->data['view'] = 'params/coligadas/coligada';
        $this->data['estados'] = $this->smasy_model->getEstados();
        $this->layout['head']['scripts'][] = base_url().'assets/js/smasy/coligada.js';

        $this->load->view('layout/index', $this->data);
    }

}
