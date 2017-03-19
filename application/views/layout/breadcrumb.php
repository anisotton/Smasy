<!--breadcrumbs-->
<div id="breadcrumb">
    <a href="<?php echo base_url() ?>" title="Dashboard" class="tip-bottom">
        <i class="fa fa-home"></i><?php echo $this->layout['menu']['home']['label'];?>
    </a>
    <?php
    $totalSegs = $this->uri->total_segments();
    for ($i = 1; $i <= $totalSegs;$i++):?>
        <a href="<?php echo base_url() . $this->uri->segment($i) ?>" class="tip-bottom" title="<?php echo ucfirst($this->uri->segment($i)); ?>">
            <?php echo ucfirst($this->uri->segment($i)); ?>
        </a>
    <?php endfor;?>
</div>
<!--End-breadcrumbs-->