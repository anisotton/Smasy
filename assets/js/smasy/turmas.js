jQuery(document).ready(function () {

    jQuery(this).on("focus",".autocompleteProf",function(e) {
        jQuery(this).autocomplete({
            source: function(request, response) {
                jQuery.ajax( {
                    url: smasy.getBase()+"turmas/buscaProfessorAutocomplete/"+request.term,
                    dataType: "json",
                    success: function( data ) {
                        response( data );
                    }
                } );
            },
            minLength: 3,
            select: function( event, ui ) {
                $(this).parent().find('#codprof').val(ui.item.id);
            }
        });
    });
    jQuery(this).on("focus",".autocompletePlanosPgto",function(e) {
        jQuery(this).autocomplete({
            source: function(request, response) {
                jQuery.ajax( {
                    url: smasy.getBase()+"turmas/buscaPlanosAutocomplete/"+request.term,
                    dataType: "json",
                    success: function( data ) {
                        response( data );
                    }
                } );
            },
            minLength: 3,
            select: function( event, ui ) {
                $(this).parent().find('#codhorario').val(ui.item.id);
            }
        });
    });

    jQuery(this).on("focus",".autocompleteHorario",function(e) {
        jQuery(this).autocomplete({
            source: function(request, response) {
                jQuery.ajax( {
                    url: smasy.getBase()+"turmas/buscaHorarioAutocomplete/"+request.term,
                    dataType: "json",
                    success: function( data ) {
                        response( data );
                    }
                } );
            },
            minLength: 3,
            select: function( event, ui ) {
                $(this).parent().find('#codhorario').val(ui.item.id);
            }
        });
    });
    jQuery(this).on("focus",".autocompleteDia",function(e) {
        jQuery(this).autocomplete({
            source: function(request, response) {
                jQuery.ajax( {
                    url: smasy.getBase()+"turmas/buscaDiaAutocomplete/"+request.term,
                    dataType: "json",
                    success: function( data ) {
                        response( data );
                    }
                } );
            },
            minLength: 3,
            select: function( event, ui ) {
                $(this).parent().find('#coddia').val(ui.item.id);
            }
        });
    });
});

function addDetalhe() {
    var div = jQuery('.detalhes').first().clone();
    jQuery(div).find('#addDetalhe').attr('id','removeDetalhe').find('i').removeClass('fa-plus').addClass('fa-times');
    jQuery(div).find('#removeDetalhe').attr('onclick','removeDetalhe(this);return false;');
    jQuery(div).find('input').each(function () {
        jQuery(this).val('');
        var name = jQuery(this).attr('name');
        name = name.split('[');
        name[1] = jQuery('.detalhes').length+']';
        name = name.join('[');
        jQuery(this).attr('name',name);
    });

    jQuery('#turmacmpl').append(div);
}
function removeDetalhe(element){
    jQuery(element).parent().parent().parent().remove();
}

