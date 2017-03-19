<?php
$this->config->load('layout', TRUE);

if(is_array($this->layout)){
    $this->layout = array_merge_recursive($this->config->item('layout'),$this->layout);
}else{
    $this->layout = $this->config->item('layout');
}
$this->load->helper('url');
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php $this->load->view('layout/head');?>
    </head>
    <body data-basepath>
        <?php $this->load->view('layout/header');?>
        <?php $this->load->view('layout/menu');?>
        <div id="content">
            <div id="content-header">
                <?php $this->load->view('layout/breadcrumb');?>
            </div>
            <div class="container-fluid">
                <?php if($this->session->flashdata('error') != null){?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('error');?>
                    </div>
                <?php }?>

                <?php if($this->session->flashdata('success') != null){?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('success');?>
                    </div>
                <?php }?>
                <?php $this->load->view($view);?>
            </div>
        </div>
        <?php $this->load->view('layout/footer');?>
    </body>
</html>
