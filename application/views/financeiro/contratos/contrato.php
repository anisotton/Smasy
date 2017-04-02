<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-file-text-o"></i>
                </span>
                <h5>Cadastro de contrato</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>

                    <form  action="<?php echo base_url()?>contratos/save" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal" >
                        <input value="<?php echo $contrato['id'];?>" name="id" type="hidden" />
                        <input value="" name="mudararquivo" type="hidden" id="mudarArquivo" />
                        <div class="span" style="margin-left: 5%">
                            <div class="control-group">
                                <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="nome" type="text" name="nome" value="<?php echo $contrato['nome']; ?>"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="tipo" class="control-label">Tipo<span class="required">*</span></label>
                                <div class="controls">
                                    <select name="tipo" id="tipo">
                                        <option value="">Selecione uma opção</option>
                                        <?php foreach ($tipos as $tipo):?>
                                            <option <?php echo ($contrato['tipo']==$tipo['id'])?'selected':'';?> value="<?php echo $tipo['id']?>"><?php echo $tipo['descricao']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="sexo" class="control-label">Arquivo<span class="required">*</span></label>
                                <div class="controls">
                                    <?php if($contrato['arquivo']):?>
                                        <div id="envioArquivo" class="hidden">
                                            <input name="arquivo" type="file" />
                                        </div>
                                        <input name="arquivo" type="hidden" value="<?php echo $contrato['arquivo'];?>" />
                                        <a id="nomeArquivo" target="_blank" href="<?php echo $contrato['arquivo']?>"><?php echo @array_pop(explode('/',$contrato['arquivo']));?></a>
                                        <a id="removeArquivo" href="#" ><i class="fa fa-times-circle"></i></a>
                                    <?php else:?>
                                        <input name="arquivo" type="file" />
                                    <?php endif;?>

                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span">
                                <div class="span3 pull-right">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Salvar</button>
                                    <a href="<?php echo base_url() ?>contratos" id="" class="btn pull-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

