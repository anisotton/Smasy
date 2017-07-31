<?php

class SY_Controller extends CI_Controller{

    private $layoutBase;

    private $classCall;

    protected $viewBase;

    protected $data;

    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('smasy_model','',TRUE);

        $this->classCall = get_called_class();
        $this->layoutBase = strtolower($this->classCall);

        if(!empty($this->viewBase) && substr($this->viewBase, -1) != '/'){
            $this->viewBase .= '/';
        }

        try{
            $modelName = strtolower($this->classCall)."_model";
            $this->load->model($modelName,'',TRUE);
            $this->model = $this->$modelName;
        }catch (Exception $e){}

        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('return',base64_encode(current_url()));
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->data['view'] = $this->viewBase.$this->layoutBase.'/listar';
        $this->data['dados'] = $this->model->getList();
        $this->load->view('layout/index',  $this->data);
    }

    public function save(){
        $function = strtolower(substr($this->classCall, 0, -1));
        $this->load->library('form_validation');
        $this->data['dado'] = array_filter($this->security->xss_clean($this->input->post()));

        $primaryKey = $this->model->getPrimary();

        if(!isset($this->data['dado'][$primaryKey]) || $this->data['dado'][$primaryKey] == '-1'){
            unset($this->data['dado'][$primaryKey]);
            $isnew = true;
        }
        if ($this->form_validation->run($function) != false) {
            if($isnew === true){
                $result = $this->model->add($this->data['dado']);
            }else{
                $result = $this->model->update($this->data['dado']);
            }

            if($result == TRUE){
                if($isnew){
                    $this->session->set_flashdata('success','Registro adicionado com sucesso!');
                }else{
                    $this->session->set_flashdata('success','Registro editado com sucesso!');
                }

                redirect(base_url() . strtolower($this->classCall));
            }else{
                $this->session->set_flashdata('error','Erro ao executar essa tarefa!');
            }
        }else{
            $error = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : 'Erro ao executar validação!');
            $this->session->set_flashdata('error',$error);
        }
        if($isnew === true){
            $this->adicionar();
        }else{
            $this->edit($this->data['dado']['id']);
        }
    }

    public function edit($primaryKey)
    {
        $this->data['dado'] = (array)$this->model->get($primaryKey);

        $function = substr($this->classCall, 0, -1);

        if(method_exists($this,$function)){
            $this->$function();
        }else{
            $this->data['view'] = "{$this->viewBase}{$this->layoutBase}/".strtolower($function);
            $this->data['dado'] = (array)$this->model->get($primaryKey);

            $this->load->view('layout/index', $this->data);
        }
    }

    public function adicionar()
    {
        $primaryKey = $this->model->getPrimary();
        $this->data['dado'][$primaryKey] = '-1';
        $function = substr($this->classCall, 0, -1);

        if(method_exists($this,$function)){
            $this->$function();
        }else{
            $this->data['view'] = "{$this->viewBase}{$this->layoutBase}/".strtolower($function);

            $this->load->view('layout/index', $this->data);
        }
    }

    public function remove($key){
        $return = $this->model->delete($key);
        if($return!= true){
            $this->session->set_flashdata('error','Erro ao remover registro - '.$return);
        }else{
            $this->session->set_flashdata('success','Registro removido com sucesso!');
        }

        redirect(base_url() . strtolower($this->classCall));
    }

}
