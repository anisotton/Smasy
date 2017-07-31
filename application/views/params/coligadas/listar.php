<div class="row-fluid">
    <a href="<?php echo base_url();?>coligadas/adicionar" class="btn btn-success pull-right">
        <i class="icon-plus icon-white"></i>
        Adicionar
    </a>
</div>
<div class="widget-box">
    <div class="widget-title">
            <span class="icon">
                <i class="fa fa-university" aria-hidden="true"></i>
            </span>
        <h5>Coligadas</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome Fantasia</th>
                <th>Telefone</th>
                <th>E-mail</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($dados)>0):
                foreach ($dados as $dado):?>
                    <tr class="row-clickable" data-link="<?php echo base_url()."coligadas/edit/{$dado->codigo}";?>">
                        <td><?php echo $dado->nome_fantasia;?></a></td>
                        <td><?php echo $dado->telefone;?></td>
                        <td><?php echo $dado->email;?></td>
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