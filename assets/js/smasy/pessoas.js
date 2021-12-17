jQuery(document).ready(function () {
    jQuery('#estado').on('change',function () {
        var value = jQuery(this).val();
        jQuery('#cidade').html('').append(jQuery('<option>').val('').html('Selecione uma opção'));
        jQuery.ajax( {
            url: smasy.getBase()+"smasy/getCidadesAjax/"+value,
            dataType: "json",
            success: function( data ) {
                jQuery(data).each(function () {
                    console.log(this);
                    jQuery('#cidade').append(jQuery('<option>').val(this.id).html(this.label));
                });
            }
        } );
    });
    jQuery(".estadoAjax").on('change keyup',function () {
        jQuery('.cidadeAjax').val('');
        jQuery(jQuery('.cidadeAjax').attr('data-input-value')).val('');
    });

    jQuery(".cidadeAjax").on('change keyup',function () {
        if(jQuery(this).val().length<3){
            return false;
        }
        var estado = jQuery(jQuery(this).attr('data-input-estado')).val();
        var input_value =  jQuery(this).attr('data-input-value');
        jQuery(this).autocomplete({
            source: function(request, response) {
                jQuery.ajax( {
                    url: smasy.getBase()+"smasy/getCidadesAjax/"+estado+'/'+request.term,
                    dataType: "json",
                    success: function( data ) {
                        response( data );
                    }
                 });
            },
            minLength: 3,
            select: function( event, ui ) {
                console.log(input_value);
                jQuery(input_value).val(ui.item.id);
            }
        });
    });


    jQuery('#cep').on('change keyup',function () {
        var value = jQuery(this).val().replace(/[^0-9]/g,'');
        if(value.length<8){
            return false;
        }
        jQuery.ajax( {
            url: "https://viacep.com.br/ws/"+value+"/json/",
            dataType: "json",
            success: function( data ) {
                jQuery("#estado").val(jQuery("#estado option:contains('"+data.uf+"')").val());
                jQuery("#bairro").val(data.bairro);
                jQuery("#rua").val(data.logradouro);
                jQuery.ajax( {
                    url: smasy.getBase()+"smasy/getCidadesAjax/"+data.localidade,
                    dataType: "json",
                    success: function( result ) {
                        jQuery('#cidade').html('');
                        jQuery(result).each(function () {
                            jQuery('#cidade').append(jQuery('<option>').val(this.value).html(this.nome));
                        });
                    }
                });
                jQuery('#complemento').focus();
            }
        } );
    });



});