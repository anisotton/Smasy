<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/dist/excanvas.min.js"></script><![endif]-->

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/dist/jquery.jqplot.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/dist/jquery.jqplot.min.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/dist/plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/dist/plugins/jqplot.donutRenderer.min.js"></script>

<!--Action boxes-->
<div class="container-fluid">
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li class="bg_lb"> <a href="<?php echo base_url()?>alunos"> <i class="fa fa-graduation-cap large" aria-hidden="true"></i><br /> Alunos</a> </li>
            <li class="bg_lg"> <a href="<?php echo base_url()?>turmas"> <i class="fa fa-book" aria-hidden="true"></i><br /> Turmas</a> </li>
            <li class="bg_ly"> <a href="<?php echo base_url()?>modalidades"> <i class="fa fa-tags" aria-hidden="true"></i><br /> Modalidades</a> </li>
        </ul>
    </div>
</div>
<!--End-Action boxes-->



<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Produtos Com Estoque Mínimo</h5></div>
            <div class="widget-content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Produto</th>
                        <th>Preço de Venda</th>
                        <th>Estoque</th>
                        <th>Estoque Mínimo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php echo '<tr><td colspan="3">Nenhuma OS em aberto.</td></tr>'; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="span12" style="margin-left: 0">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Ordens de Serviço Em Aberto</h5></div>
            <div class="widget-content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                        <th>Cliente</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    echo '<tr><td colspan="3">Nenhuma OS em aberto.</td></tr>';
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
