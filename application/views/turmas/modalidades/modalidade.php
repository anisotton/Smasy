<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-tags"></i>
                </span>
                <h5>Cadastro de modalidade</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>

                    <form  action="<?php echo base_url()?>modalidades/save" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal" >
                        <input value="<?php echo $dado['id'];?>" name="id" type="hidden" />
                        <div class="span" style="margin-left: 5%">
                            <div class="control-group">
                                <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="nome" type="text" name="nome" value="<?php echo $dado['nome']; ?>"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="valor" class="control-label">Valor<span class="required">*</span></label>
                                <div class="controls">
                                    <div class="input-prepend span3">
                                        <span class="add-on">R$</span>
                                        <input placeholder="Valor" id="valor" class="mask-money" type="text" name="valor" value="<?php echo $dado['valor']; ?>"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span">
                                <div class="span3 pull-right">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Salvar</button>
                                    <a href="<?php echo base_url() ?>modalidades" id="" class="btn pull-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

