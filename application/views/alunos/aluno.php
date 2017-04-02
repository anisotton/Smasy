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
                    <form action="<?php echo base_url()?>alunos/save" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formAluno" class="form-horizontal" >
                        <input value="<?php echo $aluno['ra'];?>" name="ra" type="hidden" />
                        <input value="<?php echo $aluno['codpessoa'];?>" name="codpessoa" type="hidden" />
                        <div class="span2">
                            <ul class="thumbnails" style="margin: 0px">
                                <li class="span" style="margin: 0px">
                                    <a href="#" onclick="return false;" class="thumbnail" style="width: 70%;margin: 10px auto;">
                                        <?php if(!$aluno['foto']):?>
                                            <img src="<?php echo base_url()?>/assets/img/pessoas/no-img.jpg" class="img-thumbnail" width="200">
                                        <?php else:?>
                                            <img src="<?php echo base_url()?>/assets/img/pessoas/<?php echo "aluno_{$aluno['id']}"?>" class="img-thumbnail" width="200">
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
                                <li id="tabDocumentos" role="presentation" <?php echo ($aluno['maior'] !== true)?'class="disabled"':'';?>><a href="#documentos" aria-controls="documentos" role="tab" data-toggle="tab">Documentos</a></li>
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
                                        <label for="dtnascimento" class="control-label">Data Nascimento<span class="required">*</span></label>
                                        <div class="controls">
                                            <div data-date="dd-mm-yyyy" data-date-format="dd/mm/yyyy" class="input-append date datepicker">
                                                <input id="dtnascimento" class="span mask-date" type="text" name="dtnascimento" value="<?php echo $aluno['dtnascimento']; ?>"  />
                                                <span class="add-on"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sexo" class="control-label">Sexo<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="sexo" id="sexo">
                                                <option <?php echo ($aluno['sexo'])=='M'?'selected':''; ?> value="M">Masculino</option>
                                                <option <?php echo ($aluno['sexo'])=='F'?'selected':''; ?> value="F">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="estadonatal" class="control-label">Estado Natal<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="estadonatal" id="estadonatal">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($estados as $estado):?>
                                                    <option <?php echo ($estado->id)==$aluno['estadonatal']?'selected':''; ?> value="<?php echo $estado->id; ?>"><?php echo $estado->nome; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="naturalidade" class="control-label">Naturalidade<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="naturalidade" id="naturalidade">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($naturalidade as $cidade):?>
                                                    <option <?php echo ($cidade->id)==$aluno['naturalidade']?'selected':''; ?> value="<?php echo $cidade->id; ?>"><?php echo $cidade->nome; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="maiorIdade" <?php echo ($aluno['maior'] !== true)?'class="hidden"':'';?>>
                                        <div class="control-group">
                                            <label for="telefone1" class="control-label">Telefone 1<span class="required"></span></label>
                                            <div class="controls">
                                                <input id="telefone1" type="text" class="mask-phone" name="telefone1" value="<?php echo $aluno['telefone1']; ?>"  />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="telefone2" class="control-label">Telefone 2<span class="required"></span></label>
                                            <div class="controls">
                                                <input id="telefone2" type="text" class="mask-phone" name="telefone2" value="<?php echo $aluno['telefone2']; ?>"  />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="telefone3" class="control-label">Telefone 3<span class="required"></span></label>
                                            <div class="controls">
                                                <input id="telefone3" type="text" class="mask-phone" name="telefone3" value="<?php echo $aluno['telefone3']; ?>"  />
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
                                                    <a id="btAddResponsavel" href="#addResponsavel" ><span class="add-on"><i class="fa fa-plus"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="documentos">
                                    <div class="control-group">
                                        <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="cpf" type="text" class="mask-cpf" name="cpf" value="<?php echo $aluno['cpf']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="rg" class="control-label">RG</label>
                                        <div class="controls">
                                            <input id="rg" type="text" name="rg" value="<?php echo $aluno['rg']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="ufcartident " class="control-label">Estado emissor</label>
                                        <div class="controls">
                                            <input id="ufcartident " type="text" name="ufcartident " value="<?php echo $aluno['ufcartident ']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="orgemissorident" class="control-label">Orgão emissor</label>
                                        <div class="controls">
                                            <input id="orgemissorident" type="text" name="orgemissorident" value="<?php echo $aluno['orgemissorident']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="dtemissaoident" class="control-label">Data de emissão</label>
                                        <div class="controls">
                                            <div data-date="dd-mm-yyyy" data-date-format="dd/mm/yyyy" class="input-append date datepicker">
                                                <input id="dtemissaoident" class="span mask-date" type="text" name="dtemissaoident" value="<?php echo $aluno['dtemissaoident']; ?>"  />
                                                <span class="add-on"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="endereco">
                                    <div class="control-group">
                                        <label for="cep" class="control-label">CEP</label>
                                        <div class="controls">
                                            <input id="cep" class="mask-cep" type="text" name="cep" value="<?php echo $aluno['cep']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="estado" class="control-label">Estado</label>
                                        <div class="controls">
                                            <select name="estado" id="estado">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($estados as $estado):?>
                                                    <option <?php echo ($estado->id)==$aluno['estado']?'selected':''; ?> value="<?php echo $estado->id; ?>"><?php echo $estado->uf; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="cidade" class="control-label">Cidade</label>
                                        <div class="controls">
                                            <select name="cidade" id="cidade">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($cidades as $cidade):?>
                                                    <option <?php echo ($cidade->id)==$aluno['cidade']?'selected':''; ?> value="<?php echo $cidade->id; ?>"><?php echo $cidade->nome; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="bairro" class="control-label">Bairro</label>
                                        <div class="controls">
                                            <input id="bairro" type="text" name="bairro" value="<?php echo $aluno['bairro']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="rua" class="control-label">Rua</label>
                                        <div class="controls">
                                            <input id="rua" type="text" name="rua" value="<?php echo $aluno['rua']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="complemento" class="control-label">Complemento</label>
                                        <div class="controls">
                                            <input id="complemento" type="text" name="complemento" value="<?php echo $aluno['complemento']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="numero" class="control-label">Numero</label>
                                        <div class="controls">
                                            <input id="numero" type="text" name="numero" value="<?php echo $aluno['numero']; ?>"  />
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