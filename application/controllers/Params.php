<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Params extends SY_Controller {

    protected $data = array('activeMenu' => 'params', 'activeSubMenu' => 'painel');

    public function index()
    {
        $this->data['view'] = 'params/painel';
        $this->load->view('layout/index',  $this->data);
    }

}
