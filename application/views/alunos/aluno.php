<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />

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
                <div class="container">
                    <?php if (isset($custom_error)):?>
                        <div class="alert alert-danger"><?php echo $custom_error;?></div>
                    <?php endif ?>
                    <form action="<?php echo base_url()?>alunos/save" id="formAluno" method="post" class="form-horizontal" >
                        <input value="<?php echo $aluno['id'];?>" name="id" type="hidden" />
                        <div class="span2">
                            <ul class="thumbnails">
                                <li class="span">
                                    <a href="#" class="thumbnail" style="width: 70%;margin: 10px auto;">
                                        <img src="http://lorempixel.com/100/100/people/" class="img-thumbnail" alt="Cinque Terre" width="200">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="span10" style="margin: 0px">
                            <div class="control-group">
                                <label for="nome" class="control-label">Nome completo<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="nome" type="text" name="nome" value="<?php echo $aluno['nome']; ?>"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="dataNasc" class="control-label">Data Nascimento<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="dataNasc" class="datepicker" type="text" name="dataNasc" value="<?php echo $aluno['dataNasc']; ?>"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="cpf" type="text" name="cpf" value="<?php echo $aluno['cpf']; ?>"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="rg" class="control-label">RG<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="nome" type="text" name="rg" value="<?php echo $aluno['rg']; ?>"  />
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

                        <div class="form-actions">
                            <div class="span">
                                <div class="span3 pull-right">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Salvar</button>
                                    <a href="<?php echo base_url() ?>alunos" id="" class="btn"><i class="fa fa-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
      $(document).ready(function(){

          $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

           $('#formCliente').validate({
            rules :{
                  nomeCliente:{ required: true},
                  documento:{ required: true},
                  telefone:{ required: true},
                  email:{ required: true},
                  rua:{ required: true},
                  numero:{ required: true},
                  bairro:{ required: true},
                  cidade:{ required: true},
                  estado:{ required: true},
                  cep:{ required: true}
            },
            messages:{
                  nomeCliente :{ required: 'Campo Requerido.'},
                  documento :{ required: 'Campo Requerido.'},
                  telefone:{ required: 'Campo Requerido.'},
                  email:{ required: 'Campo Requerido.'},
                  rua:{ required: 'Campo Requerido.'},
                  numero:{ required: 'Campo Requerido.'},
                  bairro:{ required: 'Campo Requerido.'},
                  cidade:{ required: 'Campo Requerido.'},
                  estado:{ required: 'Campo Requerido.'},
                  cep:{ required: 'Campo Requerido.'}

            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
           });
      });
</script>






