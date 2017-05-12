<?php
$CI =& get_instance();
?>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="fa fa-book"></i> </span>
        <h5 >Matricula - <?php echo "{$turma['codturma']} - {$turma['nome']}";?></h5>
    </div>
    <div class="widget-content">
        <form  action="<?php echo base_url()?>matriculas/save" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal" >
            <input name="codturma" type="hidden" value="<?php echo $turma['codturma'];?>" />
            <input name="id" type="hidden" value="-1" />
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
                                $professores[$v->codprof] = $v->prof;
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
                                <td class="width70"><strong><?php echo $turma['iniaula'];?></strong></td>
                            </tr>
                            <tr>
                                <td>Aulas ocorridas</td>
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
            <div class="span8">
                <table class="table table-bordered table-invoice">
                    <tbody>
                    <tr>
                    <tr>
                        <td class="span3">Aluno</td>
                        <td class="span9">
                            <select name="ra" id="ra">
                                <option selected="selected" value="0">Selecione um aluno</option>
                                <?php foreach ($alunos as $aluno):?>
                                    <option value="<?php echo $aluno->ra ?>"><?php echo $aluno->nome; ?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Plano de pagamento</td>
                        <td>
                            <select name="codplanopgto" id="codplanopgto">
                                <option data-desconto="" data-tipodesconto="" data-parcelas="1" selected="selected" value="0">Selecione um plano de pagamento</option>
                                <?php foreach ($planospgto as $plano):?>
                                    <option data-desconto="<?php echo $plano->desconto ?>"
                                            data-tipodesconto="<?php echo $plano->tipodesconto ?>"
                                            data-parcelas="<?php echo $plano->parcelas ?>"
                                            value="<?php echo $plano->id ?>">
                                        <?php echo $plano->nome; ?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Forma de pagamento</td>
                        <td>
                            <select name="formapgto" id="formapgto">
                                <option selected="selected" value="0">Selecione uma forma de pagamento</option>
                                <?php foreach ($formaspgto as $forma):?>
                                    <option value="<?php echo $forma->id ?>"><?php echo $forma->nome; ?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Contrato</td>
                        <td>
                            <select name="codcontrato" id="codcontrato">
                                <option selected="selected" value="0">Selecione um contrato</option>
                                <?php foreach ($contratos as $contrato):?>
                                    <option value="<?php echo $contrato->id ?>"><?php echo $contrato->nome; ?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Periodo</td>
                        <td>
                            <div class="input-append">
                                <input id="meses" class="span3" type="text" name="meses" value="1"  />
                                <span class="add-on">Meses</i></span>
                            </div>
                        </td>
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
                        <td class="width30">Modalidade</td>
                        <td class="width70"><strong><?php echo $modalidade->nome;?></strong></td>
                    </tr>
                    <tr>
                        <td>Taxa de matricula</td>
                        <td><strong id="infoTaxa">R$ <?php echo str_replace('.',',',$modalidade->taxamatricula);?></strong></td>
                    </tr>
                    <tr>
                        <td>Valor mensalidade</td>
                        <td><strong id="infoMensalidade">R$ <?php echo str_replace('.',',',$modalidade->valor);?></strong></td>
                    </tr>
                    <tr>
                        <td>Valor total sem desconto</td>
                        <td><strong id="infoTotalSemDesconto">R$ <?php echo str_replace('.',',',$modalidade->valor);?></strong></td>
                    </tr>
                    <tr>
                        <td>Desconto</td>
                        <td><strong id="infoDesconto">R$ 0,00</strong></td>
                    </tr>
                    <tr>
                        <td>Valor total</td>
                        <td><strong id="infoTotal">R$ 0,00</strong></td>
                    </tr>
                    <tr>
                        <td>Valor parcela</td>
                        <td><strong id="infoTotalParcela">R$ 0,00</strong></td>
                    </tr>
                    </tr>
                    </tbody>
                </table>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-large pull-right" href="">Matricular</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

