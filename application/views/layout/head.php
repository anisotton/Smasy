<title><?php echo $this->layout['head']['title']?></title>
<meta charset="<?php echo $this->layout['head']['charset']?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<base href="<?php echo base_url()?>" />
<?php if(isset($this->layout['head']['favicon'])):?>
    <link rel="shortcut icon" href="<?php echo $this->layout['head']['favicon']?>"/>
<?php endif;?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/matrix-media.css" />
<link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.gritter.css" />
<link href="<?php echo base_url()?>assets/css/Open_Sans 400,700,800.css" rel='stylesheet' type='text/css'>
<?php foreach ($this->layout['head']['stylesheets'] as $stylesheet):
    if(strpos($stylesheet,'http') !== false){
        $url = $stylesheet;
    }else{
        $url = base_url().$stylesheet;
    }
    ?>
<link rel="stylesheet" type='text/css' href="<?php echo $url?>" />
<?php endforeach;?>
<script type="application/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script type="application/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
<script type="application/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script type="application/javascript" src="<?php echo base_url()?>assets/js/jquery.gritter.min.js"></script>
<script type="application/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<?php foreach ($this->layout['head']['scripts'] as $script):
    if(strpos($script,'http') !== false){
        $url = $script;
    }else{
        $url = base_url().$script;
    }
    ?>
    <script type="application/javascript" src="<?php echo $url?>"></script>
<?php endforeach;?>