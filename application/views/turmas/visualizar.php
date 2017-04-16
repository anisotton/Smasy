<?php
$CI =& get_instance();
?>

<div class="row-fluid">
    <a href="<?php echo base_url();?>turmas/matricular/<?php echo $turma['codturma'];?>" class="btn btn-success pull-right">
        <i class="icon-plus icon-white"></i>
        Matricular
    </a>
</div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="fa fa-book"></i> </span>
        <h5 ><?php echo "{$turma['codturma']} - {$turma['nome']}";?></h5>
    </div>
    <div class="widget-content">
        <div class="row-fluid">
            <div class="span8">
                <table class="table table-bordered table-invoice">
                    <tbody>
                    <tr>
                    <tr>
                        <td class="span2">Sala</td>
                        <td class="span10"><strong><?php echo $turma['sala'];?></strong></td>
                    </tr>
                    <tr>
                        <?php foreach($compl as $v){
                            $professores[] = $v->prof;
                            $dia[] = $v->dia;
                            $codDia[] = $v->coddia;
                            $hora[$v->hora] = $v->hora;
                        }
                       ?>
                        <td>Dias</td>
                        <td><strong><?php echo implode(' | ',$dia);?></strong></td>
                    </tr>
                    <tr>
                        <td>Horario</td>
                        <td><strong><?php echo implode(' | ',$hora);?></strong></td>
                    </tr>
                    <tr>
                        <td>Professores</td>
                        <td><strong><?php echo implode(' | ',$professores);?></strong></td>
                    </tr>
                    </tr>
                    </tbody>

                </table>
            </div>
            <div class="span4">
                <table class="table table-bordered table-invoice">
                    <tbody>
                    <tr>
                        <tr>
                            <td class="width30">Data de inicio</td>
                            <td class="width70"><strong><?php echo implode('/',array_reverse(explode('-',$turma['dtinicial'])));?></strong></td>
                        </tr>
                        <tr>
                            <td>Qnt de aulas</td>
                            <td><strong><?php echo $CI->getQtdAula($turma['dtinicial'],$codDia);?></strong></td>
                        </tr>
                        <tr>
                            <td>Alunos Matriculados</td>
                            <td><strong><?php echo $turma['matriculados']['total'];?></strong></td>
                        </tr>
                        <tr>
                            <td>Vagas</td>
                            <td><strong><?php echo $turma['maxalunos']-$turma['matriculados']['total'];?></strong></td>
                        </tr>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-bordered table-invoice-full">
                    <thead>
                    <tr>
                        <th>RA</th>
                        <th>Aluno</th>
                        <th>Telefones</th>
                        <th>Responsavel</th>
                        <th>Vencimento matricula</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($turma['matriculados']['total'] > 0):?>
                        <?php foreach ($turma['matriculados']['alunos'] as $aluno):
                            $telefones = array();
                            $telefones[] = $aluno->telefone1;
                            $telefones[] = $aluno->telefone2;
                            $telefones[] = $aluno->telefone3;
                            ?>
                            <tr>
                                <td><?php echo $aluno->ra?></td>
                                <td><?php echo $aluno->nome?></td>
                                <td><?php echo implode(' | ',array_filter($telefones))?></td>
                                <td><?php echo $aluno->responsavel?></td>
                                <td><?php $data = new DateTime($aluno->dtvencimento); echo $data->format('d/m/Y')?></td>
                            </tr>
                        <?php endforeach;?>
                    <?php else:?>
                        <tr>
                            <td colspan="5">Nenhum aluno matriculado</td>
                        </tr>
                    <?php endif;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

