<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; Matrix Admin - CodeIgniter. Adapted by <a href="http://isotton.com.br">Anderson Isotton</a> </div>
</div>

<!--end-Footer-part-->
<script type="application/javascript" src="<?php echo base_url()?>assets/js/matrix.js"></script>
<?php foreach ($this->layout['footer']['scripts'] as $script):
    if(strpos($script,'http')){
        $url = $script;
    }else{
        $url = base_url().$script;
    }
    ?>
<script type="application/javascript" src="<?php echo $url?>"></script>
<?php endforeach;?>
