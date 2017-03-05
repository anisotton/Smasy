
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Smasy<?php echo ($this->uri->segment(1))?" - ".ucfirst($this->uri->segment(1)):''; ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.css" /> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/smasy.css" />

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="">Smacy</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
   
    <li class=""><a title="" href="<?php echo base_url();?>smacy/minhaConta"><i class="fa fa-user" aria-hidden="true"></i></i></i> <span class="text">Minha Conta</span></a></li>
    <li class=""><a title="" href="<?php echo base_url();?>smacy/sair"><i class="fa fa-sign-out" aria-hidden="true"></i><span class="text">Sair do Sistema</span></a></li>
  </ul>
</div>

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i> Menu</a>
    <ul>
        <li class="<?php if(isset($menuPainel)){echo 'active';};?>"><a href="<?php echo base_url()?>"><i class="fa fa-home" aria-hidden="true"></i> <span>Painel</span></a></li>
        <li class="<?php if(isset($menuAlunos)){echo 'active';};?>"><a href="<?php echo base_url()?>alunos"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Alunos</span></a></li>
        <li class="<?php if(isset($menuTurmas)){echo 'active';};?>"><a href="<?php echo base_url()?>turmas"><i class="fa fa-book" aria-hidden="true"></i> <span>Turmas</span></a></li>
        <li class="<?php if(isset($menuModalidades)){echo 'active';};?>"><a href="<?php echo base_url()?>modalidades"><i class="fa fa-tags" aria-hidden="true"></i> <span>Modalidades</span></a></li>
        <li class="submenu <?php if(isset($menuFinanceiro)){echo 'active open';};?>">
            <a href="#"><i class="fa fa-money" aria-hidden="true"></i><span>Financeiro</span><i class="fa fa-chevron-down  pull-right" aria-hidden="true"></i></a>
            <ul>
                <li><a href="<?php echo base_url()?>financeiro">Painel</a></li>
                <li><a href="<?php echo base_url()?>financeiro/lancamentos">Lançamentos</a></li>
            </ul>
        </li>
        <li class="submenu <?php if(isset($menuRelatorios)){echo 'active open';};?>" >
            <a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Relatórios</span> <i class="fa fa-chevron-down  pull-right" aria-hidden="true"></i></a>
            <ul>
                <li><a href="<?php echo base_url()?>relatorios">Painel</a></li>
                <li><a href="<?php echo base_url()?>relatorios/alunos">Alunos</a></li>
                <li><a href="<?php echo base_url()?>relatorios/turmas">Turmas</a></li>
                <li><a href="<?php echo base_url()?>relatorios/modalidade">Modalidade</a></li>
                <li><a href="<?php echo base_url()?>relatorios/financeiro">Financeiro</a></li>
            </ul>
        </li>
        <li class="submenu <?php if(isset($menuConfig)){echo 'active open';};?>">
            <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span>Configurações</span><i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a>
            <ul>
                <li><a href="<?php echo base_url()?>configuracoes">Painel</a></li>
                <li><a href="<?php echo base_url()?>configuracoes/usuarios">Usuários</a></li>
                <li><a href="<?php echo base_url()?>configuracoes/permissoes">Permissões</a></li>
                <li><a href="<?php echo base_url()?>smasy/backup">Backup</a></li>
            </ul>
        </li>
    </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url()?>" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Painel</a> <?php if($this->uri->segment(1) != null){?><a href="<?php echo base_url().''.$this->uri->segment(1)?>" class="tip-bottom" title="<?php echo ucfirst($this->uri->segment(1));?>"><?php echo ucfirst($this->uri->segment(1));?></a> <?php if($this->uri->segment(2) != null){?><a href="<?php echo base_url().''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) ?>" class="current tip-bottom" title="<?php echo ucfirst($this->uri->segment(2)); ?>"><?php echo ucfirst($this->uri->segment(2));} ?></a> <?php }?></div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
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

          <?php if(isset($view)){$this->load->view($view);}?>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Smasy - Anderson Isotton</div>
</div>
<!--end-Footer-part-->

<script type="text/javascript"  src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/matrix.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/smasy.js"></script>


</body>
</html>







