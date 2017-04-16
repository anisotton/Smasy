<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-book"></i>
                </span>
                <h5>Cadastro de turma</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>

                    <form  action="<?php echo base_url()?>turmas/save" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal" >
                        <input value="<?php echo $dado['id'];?>" name="id" type="hidden" />
                        <div class="" style="margin-left: 5%">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#turma" aria-controls="turma" role="tab" data-toggle="tab">Turma</a></li>
                                <li role="presentation"><a href="#turmacmpl" aria-controls="turmacmpl" role="tab" data-toggle="tab">Detalhes</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="turma">
                                    <div class="control-group">
                                        <label for="codturma" class="control-label">Codigo<span class="required">*</span></label>
                                        <div class="controls">
                                            <div class="input-prepend span2">
                                                <input style="text-transform:uppercase" <?php echo ($dado['id'] == '-1')?'':'readonly'; ?> placeholder="Codigo" id="codturma" class="span" type="text" name="codturma" value="<?php echo $dado['codturma']; ?>"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="codturma" class="control-label">Nome<span class="required">*</span></label>
                                        <div class="controls">
                                            <div class="input-prepend span4">
                                                <input placeholder="Nome" id="nome" class="span" type="text" name="nome" value="<?php echo $dado['nome']; ?>"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="codsala" class="control-label">Sala<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="codsala" id="codsala" class="span4">
                                                <option value="">Selecione uma sala</option>
                                                <?php foreach ($salas as $sala):?>
                                                    <option <?php echo ($sala->id)==$dado['codsala']?'selected':''; ?> value="<?php echo $sala->id; ?>"><?php echo $sala->nome; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="codmodalidade" class="control-label">Modalidade<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="codmodalidade" id="codmodalidade" class="span4">
                                                <option value="">Selecione uma modalidade</option>
                                                <?php foreach ($modalidades as $modalidade):?>
                                                    <option <?php echo ($modalidade->id)==$dado['codmodalidade']?'selected':''; ?> value="<?php echo $modalidade->id; ?>"><?php echo $modalidade->nome; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="codfaixaetaria" class="control-label">Faixa etaria<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="codfaixaetaria" id="codfaixaetaria" class="span4">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($faixaetarias as $faixaetaria):?>
                                                    <option <?php echo ($faixaetaria->id)==$dado['codfaixaetaria']?'selected':''; ?> value="<?php echo $faixaetaria->id; ?>"><?php echo $faixaetaria->nome; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="maxalunos" class="control-label">Alunos<span class="required">*</span></label>
                                        <div class="controls">
                                            <div class="input-prepend span2">
                                                <input placeholder="Minimo" id="minalunos" class="span9" type="text" name="minalunos" value="<?php echo $dado['minalunos']; ?>"  />
                                                <span class="add-on"><i class="fa fa-graduation-cap"></i></span>
                                            </div>
                                            <div class="input-prepend span2">
                                                <input placeholder="Maximo" id="maxalunos" class="span9" type="text" name="maxalunos" value="<?php echo $dado['maxalunos']; ?>"  />
                                                <span class="add-on"><i class="fa fa-graduation-cap"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="dtinicial" class="control-label">Data<span class="required">*</span></label>
                                        <div class="controls">
                                            <div class="input-prepend span2">
                                                <input placeholder="Inicial" id="dtinicial" class="mask-date span9" type="text" name="dtinicial" value="<?php echo $dado['dtinicial']; ?>"  />
                                                <span class="add-on"><i class="fa fa-calendar "></i></span>
                                            </div>
                                            <div class="input-prepend span2">
                                                <input placeholder="Final" id="dtfinal" class="mask-date span9" type="text" name="dtfinal" value="<?php echo $dado['dtfinal']; ?>"  />
                                                <span class="add-on"><i class="fa fa-calendar "></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="turmacmpl">
                                    <?php for($i=0;$i<count($dado['compl']);$i++):
                                        $dado['compl'][$i] = (array)$dado['compl'][$i];
                                        ?>
                                        <div class="control-group detalhes">
                                            <label for="prof" class="control-label" style="width: 100px;">Detalhes<span class="required">*</span></label>
                                            <div class="controls" style="margin-left: 120px;">
                                                <div class="input-prepend span3">
                                                    <input placeholder="Professor" id="prof" class="span12 autocompleteProf" type="text" name="turmacmpl[<?php echo $i?>][prof]" value="<?php echo $dado['compl'][$i]['prof']; ?>"  />
                                                    <input id="codprof" type="hidden" name="turmacmpl[<?php echo $i?>][codprof]" value="<?php echo $dado['compl'][$i]['codprof']; ?>"  />
                                                </div>
                                                <div class="input-prepend span2">
                                                    <input placeholder="Dia" class="span12 autocompleteDia" type="text" name="turmacmpl[<?php echo $i?>][dia]" value="<?php echo $dado['compl'][$i]['dia']; ?>"  />
                                                    <input id="coddia" type="hidden" name="turmacmpl[<?php echo $i?>][coddia]" value="<?php echo $dado['compl'][$i]['coddia']; ?>"  />
                                                </div>
                                                <div class="input-prepend span2">
                                                    <input placeholder="Hora" class="span10 autocompleteHorario" type="text" name="turmacmpl[<?php echo $i?>][horario]" value="<?php echo $dado['compl'][$i]['horario']; ?>"  />
                                                    <input id="codhorario" type="hidden" name="turmacmpl[<?php echo $i?>][codhorario]" value="<?php echo $dado['compl'][$i]['codhorario']; ?>"  />
                                                    <span class="add-on"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                                <div class="input-prepend span1">
                                                    <?php if($i>0):?>
                                                        <a href="#" onclick="removeDetalhe(this);return false;" id="removeDetalhe">
                                                            <span class="add-on"><i class="fa fa-times"></i></span>
                                                        </a>
                                                    <?php else:?>
                                                        <a href="#" onclick="addDetalhe();return false;" id="addDetalhe">
                                                            <span class="add-on"><i class="fa fa-plus"></i></span>
                                                        </a>
                                                    <?php endif;?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor;?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" style="margin-top: 15px">
                            <div class="span">
                                <div class="span3 pull-right">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Salvar</button>
                                    <a href="<?php echo base_url() ?>turmas" id="" class="btn pull-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

