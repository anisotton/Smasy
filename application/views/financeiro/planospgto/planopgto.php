<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-money"></i>
                </span>
                <h5>Cadastro de Planos de pagamento</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>

                    <form  action="<?php echo base_url()?>planospgto/save" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal" >
                        <input value="<?php echo $dado['id'];?>" name="id" type="hidden" />
                        <div class="span" style="margin-left: 5%">
                            <div class="control-group">
                                <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="nome" type="text" name="nome" value="<?php echo $dado['nome']; ?>"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="tipodesconto" class="control-label">Tipo de desconto<span class="required">*</span></label>
                                <div class="controls">
                                    <select name="tipodesconto" id="tipodesconto">
                                        <option <?php echo ($dado['tipodesconto']=='-1')?'selected':'';?> value="-1">Selecione uma opção</option>
                                        <option <?php echo ($dado['tipodesconto']==1)?'selected':'';?> value="1">Real</option>
                                        <option <?php echo ($dado['tipodesconto']==2)?'selected':'';?> value="2">Percentual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="parcelas" class="control-label">Detalhes<span class="required">*</span></label>
                                <div class="controls">
                                    <div class="input-prepend span2" style="margin-right: 10px;">
                                        <span id="real" class="add-on <?php echo ($dado['tipodesconto']!=1)?'hidden':''?>">R$</span>
                                        <input placeholder="Desconto" id="desconto" class="<?php echo ($dado['tipodesconto']==1)?'mask-money':''?> span10" type="text" name="desconto" value="<?php echo $dado['desconto']; ?>"  />
                                        <span id="percentual" class="add-on <?php echo ($dado['tipodesconto']!=2)?'hidden':''?>">%</span>
                                    </div>
                                    <input class="span1" style="width: 9%;" placeholder="Nº Parcelas" id="parcelas" type="text" name="parcelas" value="<?php echo $dado['parcelas']; ?>"  />
                                </div>

                            </div>
                            <div class="control-group">
                                <label for="desconto" class="control-label">Valor</label>
                                <div class="controls">
                                    <div class="input-prepend span2">
                                        <span id="real" class="add-on">R$</span>
                                        <input placeholder="Desconto Matricula" id="desconto_matricula" class="mask-money span9" type="text" name="desconto_matricula" value="<?php echo $dado['desconto_matricula']; ?>"  />
                                    </div>
                                    <label class="span2">
                                        <input id="global" type="checkbox" name="global" value="1" <?php echo ($dado['global']==1)?'checked="checked"':''?> />
                                        Global
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span">
                                <div class="span3 pull-right">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Salvar</button>
                                    <a href="<?php echo base_url() ?>planospgto" id="" class="btn pull-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

