<div class="row-fluid">
    <a href="<?php echo base_url();?>professores/adicionar" class="btn btn-success pull-right"><i class="icon-plus icon-white"></i> Adicionar</a>
</div>
<div class="widget-box">
    <div class="widget-title">
            <span class="icon">
                <i class="fa fa-address-book" aria-hidden="true"></i>
            </span>
        <h5>Professores</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Telefones</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                <?php if(count($professores)>0):
                    foreach ($professores as $professore):
                        $telefones = array();
                        $telefones[] = $professore->telefone1;
                        $telefones[] = $professore->telefone2;
                        $telefones[] = $professore->telefone3;
                        ?>
                        <tr class="row-clickable" data-link="<?php echo base_url()."professores/edit/{$professore->codprof}";?>">
                            <td><?php echo $professore->nome;?></a></td>
                            <td><?php echo implode(' | ',array_filter($telefones));?></td>
                            <td><?php echo $professore->email;?></td>
                            <td style="text-align: center">
                                <a title="Imprimir contrato">&nbsp;<i class="fa fa-file-text-o"></i>&nbsp;</a>
                                <a title="Turmas">&nbsp;<i class="fa fa-book"></i>&nbsp;</a>
                                <a title="Horarios">&nbsp;<i class="fa fa-clock-o"></i>&nbsp;</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="5">Nenhum registro cadastrado</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>