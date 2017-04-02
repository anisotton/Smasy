<div class="row-fluid">
    <a href="<?php echo base_url();?>alunos/adicionar" class="btn btn-success pull-right"><i class="icon-plus icon-white"></i> Adicionar</a>
</div>
<div class="widget-box">
    <div class="widget-title">
            <span class="icon">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            </span>
        <h5>Alunos</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Telefones</th>
                <th>Email</th>
                <th>Responsavel</th>
            </tr>
            </thead>
            <tbody>
                <?php if(count($alunos)>0):
                    foreach ($alunos as $aluno):
                        $telefones = array();
                        $telefones[] = $aluno->telefone1;
                        $telefones[] = $aluno->telefone2;
                        $telefones[] = $aluno->telefone3;
                        ?>
                        <tr class="row-clickable" data-link="<?php echo base_url()."alunos/edit/{$aluno->ra}";?>">
                            <td><?php echo $aluno->nome;?></a></td>
                            <td><?php echo implode('|',array_filter($telefones));?></td>
                            <td><?php echo $aluno->email;?></td>
                            <td><?php echo $aluno->responsavel;?></td>
                        </tr>
                    <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="5">Nenhum Aluno Cadastrado</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>