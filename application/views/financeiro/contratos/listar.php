<div class="row-fluid">
    <a href="<?php echo base_url();?>contratos/adicionar" class="btn btn-success pull-right">
        <i class="icon-plus icon-white"></i>
        Adicionar
    </a>
</div>
<div class="widget-box">
    <div class="widget-title">
            <span class="icon">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
            </span>
        <h5>Contratos</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Arquivo</th>
            </tr>
            </thead>
            <tbody>
                <?php if(count($contratos)>0):
                    foreach ($contratos as $contrato):?>
                        <tr class="row-clickable" data-link="<?php echo base_url()."contratos/edit/{$contrato->id}";?>">
                            <td><?php echo $contrato->nome;?></a></td>
                            <td><?php echo $contrato->tipo;?></td>
                            <td class="no-clickable"><a onclick="window.open('<?php echo $contrato->arquivo?>')" target="_blank" href="<?php echo $contrato->arquivo?>">Arquivo</a></td>
                        </tr>
                    <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="5">Nenhum resultado encontrado</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>