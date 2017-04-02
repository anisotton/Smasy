<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-users"></i>
                </span>
                <h5>Cadastro de Pessoa</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>
                    <form action="<?php echo base_url()?>pessoas/save" id="formPessoa" method="post" class="form-horizontal" >
                        <input value="<?php echo $pessoa['codigo'];?>" name="codigo" type="hidden" />
                        <div class="span2">
                            <ul class="thumbnails" style="margin: 0px">
                                <li class="span" style="margin: 0px">
                                    <a href="#" onclick="return false;" class="thumbnail" style="width: 70%;margin: 10px auto;">
                                        <?php if(!$pessoa['foto']):?>
                                            <img src="<?php echo base_url()?>/assets/img/pessoas/no-img.jpg" class="img-thumbnail" width="200">
                                        <?php else:?>
                                            <img src="<?php echo base_url()?>/assets/img/pessoas/<?php echo "aluno_{$pessoa['id']}"?>" class="img-thumbnail" width="200">
                                        <?php endif;?>
                                    </a>
                                </li>
                            </ul>
                            <div class="control-group">
                                <input type="file" />
                            </div>
                        </div>
                        <div class="<?php echo ($modal == false)?'span9':'span'?>" style="margin-left: 5%">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#identiPessoa" aria-controls="identiPessoa" role="tab" data-toggle="tab">Identificação</a></li>
                                <li id="tabDocPessoa" role="presentation"><a href="#docPessoa" aria-controls="docPessoa" role="tab" data-toggle="tab">Documentos</a></li>
                                <li id="tabEndPessoa" role="presentation"><a href="#endPessoa" aria-controls="endPessoa" role="tab" data-toggle="tab">Endereço</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="identiPessoa">
                                    <div class="control-group">
                                        <label for="nome" class="control-label">Nome completo<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="nome" type="text" name="nome" value="<?php echo $pessoa['nome']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="dtnascimento" class="control-label">Data Nascimento<span class="required">*</span></label>
                                        <div class="controls">
                                            <div data-date="dd-mm-yyyy" data-date-format="dd/mm/yyyy" class="input-append date datepicker">
                                                <input id="dtnascimento" class="span mask-date" type="text" name="dtnascimento" value="<?php echo $pessoa['dtnascimento']; ?>"  />
                                                <span class="add-on"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sexo" class="control-label">Sexo<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="sexo" id="sexo">
                                                <option <?php echo ($pessoa['sexo'])=='M'?'selected':''; ?> value="M">Masculino</option>
                                                <option <?php echo ($pessoa['sexo'])=='F'?'selected':''; ?> value="F">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="estadonatal" class="control-label">Estado Natal<span class="required">*</span></label>
                                        <div class="controls">
                                            <select name="estadonatal" id="estadonatal">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($estados as $estado):?>
                                                    <option <?php echo ($estado->id)==$pessoa['estadonatal']?'selected':''; ?> value="<?php echo $estado->id; ?>"><?php echo $estado->nome; ?></option>
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
                                                    <option <?php echo ($cidade->id)==$pessoa['cidade']?'selected':''; ?> value="<?php echo $cidade->id; ?>"><?php echo $cidade->nome; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="telefone1" class="control-label">Telefone 1<span class="required"></span></label>
                                        <div class="controls">
                                            <input id="telefone1" type="text" class="mask-phone" name="telefone1" value="<?php echo $pessoa['telefone1']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="telefone2" class="control-label">Telefone 2<span class="required"></span></label>
                                        <div class="controls">
                                            <input id="telefone2" type="text" class="mask-phone" name="telefone2" value="<?php echo $pessoa['telefone2']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="telefone3" class="control-label">Telefone 3<span class="required"></span></label>
                                        <div class="controls">
                                            <input id="telefone3" type="text" class="mask-phone" name="telefone3" value="<?php echo $pessoa['telefone3']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="email" class="control-label">E-mail</label>
                                        <div class="controls">
                                            <input id="email" type="text" name="email" value="<?php echo $pessoa['email']; ?>"  />
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="docPessoa">
                                    <div class="control-group">
                                        <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="cpf" type="text" class="mask-cpf" name="cpf" value="<?php echo $pessoa['cpf']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="rg" class="control-label">RG</label>
                                        <div class="controls">
                                            <input id="rg" type="text" name="rg" value="<?php echo $pessoa['rg']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="ufcartident " class="control-label">Estado emissor</label>
                                        <div class="controls">
                                            <input id="ufcartident " type="text" name="ufcartident " value="<?php echo $pessoa['ufcartident ']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="orgemissorident" class="control-label">Orgão emissor</label>
                                        <div class="controls">
                                            <input id="orgemissorident" type="text" name="orgemissorident" value="<?php echo $pessoa['orgemissorident']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="dtemissaoident" class="control-label">Data de emissão</label>
                                        <div class="controls">
                                            <div data-date="dd-mm-yyyy" data-date-format="dd/mm/yyyy" class="input-append date datepicker">
                                                <input id="dtemissaoident" class="span mask-date" type="text" name="dtemissaoident" value="<?php echo $pessoa['dtemissaoident']; ?>"  />
                                                <span class="add-on"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="endPessoa">
                                    <div class="control-group">
                                        <label for="cep" class="control-label">CEP</label>
                                        <div class="controls">
                                            <input id="cep" class="mask-cep" type="text" name="cep" value="<?php echo $pessoa['cep']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="estado" class="control-label">Estado</label>
                                        <div class="controls">
                                            <select name="estado" id="estado">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($estados as $estado):?>
                                                    <option <?php echo ($estado->id)==$pessoa['estado']?'selected':''; ?> value="<?php echo $estado->id; ?>"><?php echo $estado->uf; ?></option>
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
                                                    <option <?php echo ($cidade->id)==$pessoa['cidade']?'selected':''; ?> value="<?php echo $cidade->id; ?>"><?php echo $cidade->nome; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="bairro" class="control-label">Bairro</label>
                                        <div class="controls">
                                            <input id="bairro" type="text" name="bairro" value="<?php echo $pessoa['bairro']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="rua" class="control-label">Rua</label>
                                        <div class="controls">
                                            <input id="rua" type="text" name="rua" value="<?php echo $pessoa['rua']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="complemento" class="control-label">Complemento</label>
                                        <div class="controls">
                                            <input id="complemento" type="text" name="complemento" value="<?php echo $pessoa['complemento']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="numero" class="control-label">Numero</label>
                                        <div class="controls">
                                            <input id="numero" type="text" name="numero" value="<?php echo $pessoa['numero']; ?>"  />
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

