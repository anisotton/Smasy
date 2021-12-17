<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-university"></i>
                </span>
                <h5>Cadastro de Coligada</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>
                    <form action="<?php echo base_url()?>coligadas/save" id="form" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal" >
                        <input value="<?php echo $dado['codigo'];?>" name="codigo" type="hidden" />
                        <div class="span11" style="margin-left: 5%">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#identificacao" aria-controls="identificacao" role="tab" data-toggle="tab">Identificação</a></li>
                                <li id="tabEndPessoa" role="presentation"><a href="#endereco" aria-controls="endereco" role="tab" data-toggle="tab">Endereço</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="identificacao">
                                    <div class="control-group">
                                        <label for="nome_fantasia" class="control-label">Nome Fantasia<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="nome_fantasia" type="text" name="nome_fantasia" value="<?php echo $dado['nome_fantasia']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="nome" type="text" name="nome" value="<?php echo $dado['nome']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="cnpj" class="control-label">CNPJ<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="cnpj" type="text" name="cnpj" value="<?php echo $dado['cnpj']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inscricao_estadual" class="control-label">Inscrição Estadual<span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="inscricao_estadual" type="text" name="inscricao_estadual" value="<?php echo $dado['inscricao_estadual']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="telefone" class="control-label">Telefone<span class="required"></span></label>
                                        <div class="controls">
                                            <input id="telefone" type="text" class="mask-phone" name="telefone" value="<?php echo $dado['telefone']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="email" class="control-label">E-mail</label>
                                        <div class="controls">
                                            <input id="email" type="text" name="email" value="<?php echo $dado['email']; ?>"  />
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="endereco">
                                    <div class="control-group">
                                        <label for="cep" class="control-label">CEP</label>
                                        <div class="controls">
                                            <input id="cep" class="mask-cep" type="text" name="cep" value="<?php echo $dado['cep']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="estado" class="control-label">Estado</label>
                                        <div class="controls">
                                            <select name="estado" id="estado">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($estados as $estado):?>
                                                    <option <?php echo ($estado->id)==$dado['estado']?'selected':''; ?> value="<?php echo $estado->id; ?>"><?php echo $estado->uf; ?></option>
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
                                                    <option <?php echo ($cidade->id)==$dado['cidade']?'selected':''; ?> value="<?php echo $cidade->id; ?>"><?php echo $cidade->nome; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="bairro" class="control-label">Bairro</label>
                                        <div class="controls">
                                            <input id="bairro" type="text" name="bairro" value="<?php echo $dado['bairro']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="rua" class="control-label">Rua</label>
                                        <div class="controls">
                                            <input id="rua" type="text" name="rua" value="<?php echo $dado['rua']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="numero" class="control-label">Numero</label>
                                        <div class="controls">
                                            <input id="numero" type="text" name="numero" value="<?php echo $dado['numero']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="complemento" class="control-label">Complemento</label>
                                        <div class="controls">
                                            <input id="complemento" type="text" name="complemento" value="<?php echo $dado['complemento']; ?>"  />
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

