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
    <title><?php echo $this->layout['head']['title'] ?> - Login</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/matrix-login.css" />
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body data-basepath>
<div id="loginbox">
    <form method="post" id="loginform" class="form-vertical" action="<?php echo base_url()?>auth/login">
        <input type="hidden" value="<?php echo $return;?>"  name="return" placeholder="Usuário" />
        <div class="control-group normal_text"> <h3><img src="<?php echo base_url()?>assets/img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                    <input type="text" name="identity" placeholder="Usuário" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="password" type="password" placeholder="Senha" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Esqueceu a senha?</a></span>
            <span class="pull-right"><button type="submit" class="btn btn-success" /> Entrar</a></span>
        </div>
    </form>
    <form id="recoverform" action="<?php echo base_url()?>auth/login" class="form-vertical">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
        </div>
    </form>
</div>
<script type="application/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script type="application/javascript" src="<?php echo base_url()?>assets/js/matrix.login.js"></script>
</body>
</html>


