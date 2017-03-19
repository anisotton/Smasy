<div class="row-fluid" style="margin-top:0">
    <div class="span">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-graduation-cap"></i>
                </span>
                <h5>Cadastro de Responsável</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>
                    <form data-result="#formResponsavel" action="<?php echo base_url()?>responsaveis/<?php echo ($modal === false)?'save':'saveModal'?>" id="formResponsavel" method="post" <?php echo ($modal === false)?'':'onsubmit="return smasy.submitAjax(this);"'?> class="form-horizontal" >
                        <input value="<?php echo $responsavel['id'];?>" name="id" type="hidden" />
                        <div class="span" style="margin: 0px;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#repsIdentificacao" aria-controls="identificacao" role="tab" data-toggle="tab">Identificação</a></li>
                                <li id="tabEndereco" role="presentation"><a href="#repsEndereco" aria-controls="endereco" role="tab" data-toggle="tab">Endereço</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="repsIdentificacao">
                                    <div class="control-group">
                                        <label for="nome" class="control-label">Nome completo<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="nome" type="text" name="nome" value="<?php echo $responsavel['nome']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="dataNasc" class="control-label">Data Nascimento<span class="required">*</span></label>
                                        <div class="controls">
                                            <div data-date="dd-mm-yyyy" data-date-format="dd/mm/yyyy" class="input-append date datepicker">
                                                <input id="dataNasc" class="span" type="text" name="dataNasc" value="<?php echo $responsavel['dataNasc']; ?>"  />
                                                <span class="add-on"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sexo" class="control-label">Sexo<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="sexo" id="sexo" value="<?php echo $responsavel['sexo']; ?>">
                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="naturalidade" class="control-label">Naturalidade<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="naturalidade" type="text" name="naturalidade" value="<?php echo $responsavel['naturalidade']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="nascionalidade" class="control-label">Nascionalidade<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="nascionalidade" type="text" name="nascionalidade" value="<?php echo $responsavel['nascionalidade']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="cpf" type="text" name="cpf" value="<?php echo $responsavel['cpf']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="rg" class="control-label">RG<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="rg" type="text" name="rg" value="<?php echo $responsavel['rg']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="tel_fixo" class="control-label">Telefone Fixo<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="tel_fixo" type="text" name="tel_fixo" value="<?php echo $responsavel['tel_fixo']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="tel_celular" class="control-label">Telefone celular<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="tel_celular" type="text" name="tel_celular" value="<?php echo $responsavel['tel_celular']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="email" class="control-label">E-mail<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="email" type="text" name="email" value="<?php echo $responsavel['email']; ?>"  />
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="repsEndereco">
                                    <div class="control-group">
                                        <label for="cep" class="control-label">CEP<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="nome" type="text" name="cep" value="<?php echo $responsavel['cep']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="estado" type="text" name="estado" value="<?php echo $responsavel['estado']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="cidade" type="text" name="cidade" value="<?php echo $responsavel['cidade']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="bairro" class="control-label">Bairro<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="bairro" type="text" name="bairro" value="<?php echo $responsavel['bairro']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="rua" class="control-label">Rua<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="rua" type="text" name="rua" value="<?php echo $responsavel['rua']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="numero" class="control-label">Numero<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="numero" type="text" name="numero" value="<?php echo $responsavel['cep']; ?>"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="span">
                                <div class="span5 pull-right">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Salvar</button>
                                    <?php if($modal === false):?>
                                    <a href="<?php echo base_url() ?>responsaveis" id="" class="btn pull-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


