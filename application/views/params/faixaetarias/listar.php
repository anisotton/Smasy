<div class="row-fluid">
    <a href="<?php echo base_url();?>faixaetarias/adicionar" class="btn btn-success pull-right">
        <i class="icon-plus icon-white"></i>
        Adicionar
    </a>
</div>
<div class="widget-box">
    <div class="widget-title">
            <span class="icon">
                <i class="fa fa-list-ul" aria-hidden="true"></i>
            </span>
        <h5>Faixa etarias</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Idade Inicial</th>
                <th>Idade Final</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($dados)>0):
                foreach ($dados as $dado):?>
                    <tr class="row-clickable" data-link="<?php echo base_url()."faixaetarias/edit/{$dado->id}";?>">
                        <td><?php echo $dado->nome;?></a></td>
                        <td><?php echo $dado->idadeini;?></td>
                        <td><?php echo $dado->idadefim;?></td>
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