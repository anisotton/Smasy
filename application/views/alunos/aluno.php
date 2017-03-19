<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-graduation-cap"></i>
                </span>
                <h5>Cadastro de Aluno</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>
                    <form action="<?php echo base_url()?>alunos/save" id="formAluno" method="post" class="form-horizontal" >
                        <input value="<?php echo $aluno['id'];?>" name="id" type="hidden" />
                        <div class="span2">
                            <ul class="thumbnails" style="margin: 0px">
                                <li class="span" style="margin: 0px">
                                    <a href="#" onclick="return false;" class="thumbnail" style="width: 70%;margin: 10px auto;">
                                        <?php if(!$aluno['foto']):?>
                                            <img src="<?php echo base_url()?>/assets/img/alunos/no-img.jpg" class="img-thumbnail" width="200">
                                        <?php else:?>
                                            <img src="<?php echo base_url()?>/assets/img/alunos/<?php echo "aluno_{$aluno['id']}"?>" class="img-thumbnail" width="200">
                                        <?php endif;?>
                                    </a>
                                </li>
                            </ul>
                            <div class="control-group">
                                <input type="file" />
                            </div>
                        </div>
                        <div class="span9" style="margin-left: 5%">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#identificacao" aria-controls="identificacao" role="tab" data-toggle="tab">Identificação</a></li>
                                <li id="tabEndereco" role="presentation" <?php echo ($aluno['maior'] !== true)?'class="disabled"':'';?>><a href="#endereco" aria-controls="endereco" role="tab" data-toggle="tab">Endereço</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="identificacao">
                                    <div class="control-group">
                                        <label for="nome" class="control-label">Nome completo<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="nome" type="text" name="nome" value="<?php echo $aluno['nome']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="dataNasc" class="control-label">Data Nascimento<span class="required">*</span></label>
                                        <div class="controls">
                                            <div data-date="dd-mm-yyyy" data-date-format="dd/mm/yyyy" class="input-append date datepicker">
                                                <input id="dataNasc" class="span" type="text" name="dataNasc" value="<?php echo $aluno['dataNasc']; ?>"  />
                                                <span class="add-on"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sexo" class="control-label">Sexo<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="sexo" id="sexo" value="<?php echo $aluno['sexo']; ?>">
                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="naturalidade" class="control-label">Naturalidade<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="naturalidade" type="text" name="naturalidade" value="<?php echo $aluno['naturalidade']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="nascionalidade" class="control-label">Nascionalidade<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="nascionalidade" type="text" name="nascionalidade" value="<?php echo $aluno['nascionalidade']; ?>"  />
                                        </div>
                                    </div>
                                    <div id="maiorIdade" <?php echo ($aluno['maior'] !== true)?'class="hidden"':'';?>>
                                        <div class="control-group">
                                            <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                                            <div class="controls">
                                                <input id="cpf" type="text" name="cpf" value="<?php echo $aluno['cpf']; ?>"  />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="rg" class="control-label">RG<span class="required">*</span></label>
                                            <div class="controls">
                                                <input id="rg" type="text" name="rg" value="<?php echo $aluno['rg']; ?>"  />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="tel_fixo" class="control-label">Telefone Fixo<span class="required">*</span></label>
                                            <div class="controls">
                                                <input id="tel_fixo" type="text" name="tel_fixo" value="<?php echo $aluno['tel_fixo']; ?>"  />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="tel_celular" class="control-label">Telefone celular<span class="required">*</span></label>
                                            <div class="controls">
                                                <input id="tel_celular" type="text" name="tel_celular" value="<?php echo $aluno['tel_celular']; ?>"  />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="email" class="control-label">E-mail<span class="required">*</span></label>
                                            <div class="controls">
                                                <input id="email" type="text" name="email" value="<?php echo $aluno['email']; ?>"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menorIdade" <?php echo ($aluno['maior'] !== false)?'class="hidden"':'';?> >
                                        <div class="control-group">
                                            <label class="control-label" for="cliente">Responsavel<span class="required">*</span></label>
                                            <div class="controls">
                                                <div class="input-append ui-widget">
                                                    <input id="responsavel" class="span" type="text" name="responsavel" value="<?php echo $aluno['responsavel']?>"  />
                                                    <input id="responsavel_id"  type="hidden" name="id_responsavel" value="<?php echo $aluno['id_responsavel']?>"  />
                                                    <a id="btAddResponsavel" href="#addResponsavel" data-toggle="modal" ><span class="add-on"><i class="fa fa-plus"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="endereco">
                                    <div class="control-group">
                                        <label for="cep" class="control-label">CEP<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="nome" type="text" name="cep" value="<?php echo $aluno['cep']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="estado" type="text" name="estado" value="<?php echo $aluno['estado']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="cidade" type="text" name="cidade" value="<?php echo $aluno['cidade']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="bairro" class="control-label">Bairro<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="bairro" type="text" name="bairro" value="<?php echo $aluno['bairro']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="rua" class="control-label">Rua<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="rua" type="text" name="rua" value="<?php echo $aluno['rua']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="numero" class="control-label">Numero<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="numero" type="text" name="numero" value="<?php echo $aluno['cep']; ?>"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="span">
                                <div class="span3 pull-right">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Salvar</button>
                                    <a href="<?php echo base_url() ?>alunos" id="" class="btn pull-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="addResponsavel" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Adicionar responsavel</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
</div>
<script type="text/javascript">

</script>

