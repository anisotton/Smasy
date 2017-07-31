<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-window-restore"></i>
                </span>
                <h5>Cadastro de sala</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>

                    <form  action="<?php echo base_url()?>salas/save" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal" >
                        <input value="<?php echo $dado['id'];?>" name="id" type="hidden" />
                        <div class="span" style="margin-left: 5%">
                            <div class="control-group">
                                <label for="nome" class="control-label">Sala<span class="required">*</span></label>
                                <div class="controls">
                                    <div class="input-prepend span4">
                                        <input placeholder="Nome" id="nome" class="span12" type="text" name="nome" value="<?php echo $dado['nome']; ?>"  />
                                    </div>
                                    <div class="input-prepend span2">
                                        <span class="add-on"><i class="fa fa-users"></i></span>
                                        <input placeholder="Capacidade" id="capacidade" class="span10" type="text" name="capacidade" value="<?php echo $dado['capacidade']; ?>"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span">
                                <div class="span3 pull-right">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Salvar</button>
                                    <a href="<?php echo base_url() ?>horarios" id="" class="btn pull-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

