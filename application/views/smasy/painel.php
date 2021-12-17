<!--Action boxes-->

<div class="quick-actions_homepage">
    <ul class="quick-actions">
        <li class="bg_lb"> <a href="<?php echo base_url()?>alunos"> <i class="fa fa-graduation-cap" aria-hidden="true"></i><br /> Alunos</a> </li>
        <li class="bg_lg"> <a href="<?php echo base_url()?>turmas"> <i class="fa fa-book" aria-hidden="true"></i><br /> Turmas</a> </li>
        <li class="bg_ly"> <a href="<?php echo base_url()?>modalidades"> <i class="fa fa-tags" aria-hidden="true"></i><br /> Modalidades</a> </li>
    </ul>
</div>
<!--Action boxes-->
    <!--End-Action boxes-->
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box widget-calendar">
            <div class="widget-title">
                <span class="icon"><i class="fa fa-calendar"></i></span>
                <h5>Turmas</h5>
                <div class="buttons">
                    <a id="add-event" data-toggle="modal" href="#modal-add-event" class="btn btn-inverse btn-mini">
                        <i class="icon-plus icon-white"></i> Adicionar Evento
                    </a>
                </div>
            </div>
            <div class="widget-content">
                <div class="panel-left">
                    <div id="calendar"></div>
                </div>
                <div id="external-events" class="panel-right">
                    <div class="panel-title">
                        <h5>Drag Events to the calander</h5>
                    </div>
                    <div class="panel-content">
                        <div class="external-event ui-draggable label label-inverse">My Event 1</div>
                        <div class="external-event ui-draggable label label-inverse">My Event 2</div>
                        <div class="external-event ui-draggable label label-inverse">My Event 3</div>
                        <div class="external-event ui-draggable label label-inverse">My Event 4</div>
                        <div class="external-event ui-draggable label label-inverse">My Event 5</div>
                    </div>
                </div>
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
