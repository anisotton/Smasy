<div class="row-fluid">
    <a href="<?php echo base_url();?>modalidades/adicionar" class="btn btn-success pull-right">
        <i class="icon-plus icon-white"></i>
        Adicionar
    </a>
</div>
<div class="widget-box">
    <div class="widget-title">
            <span class="icon">
                <i class="fa fa-tags" aria-hidden="true"></i>
            </span>
        <h5>Modalidades</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Taxa de matricula</th>
                <th>Valor</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($dados)>0):
                foreach ($dados as $dado):?>
                    <tr class="row-clickable" data-link="<?php echo base_url()."modalidades/edit/{$dado->id}";?>">
                        <td><?php echo $dado->nome;?></td>
                        <td><?php echo $dado->taxamatricula;?></td>
                        <td><?php echo $dado->valor;?></td>
                        <td><a href="<?php echo base_url()."modalidades/remove/{$dado->id}";?>">&nbsp;<i class="fa fa-trash"></i>&nbsp;</a></td>
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