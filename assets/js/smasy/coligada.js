jQuery(document).ready(function () {
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
