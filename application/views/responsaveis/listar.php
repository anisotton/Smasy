<div class="row-fluid">
    <a href="<?php echo base_url();?>responsaveis/adicionar" class="btn btn-success pull-right">
        <i class="icon-plus icon-white"></i>
        Novo responsavel
    </a>
</div>
<div class="widget-box">
    <div class="widget-title">
            <span class="icon">
                <i class="fa fa-black-tie" aria-hidden="true"></i>
            </span>
        <h5>Responsáveis</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
                <?php if(count($responsaveis)>0):
                    foreach ($responsaveis as $responsavel):?>
                        <tr class="row-clickable" data-link="<?php echo base_url()."responsaveis/edit/{$responsavel->id}";?>">
                            <td><?php echo $responsavel->nome;?></a></td>
                            <td><?php echo $responsavel->tel_fixo;?></td>
                            <td><?php echo $responsavel->tel_celular;?></td>
                            <td><?php echo $responsavel->email;?></td>
                        </tr>
                    <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="5">Nenhum responsavel Cadastrado</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>