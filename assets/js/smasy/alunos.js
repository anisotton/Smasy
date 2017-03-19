jQuery(document).ready(function () {

    jQuery('#dataNasc').on('change',function () {
        if(jQuery(this).val()){
            var birthDate = jQuery('#dataNasc').val();
            if(getAge(birthDate) >= 18){
                jQuery('#maiorIdade').removeClass('hidden');
                jQuery('#menorIdade').addClass('hidden');
                jQuery('#tabEndereco').removeClass('disabled');

            }else{
                jQuery('#menorIdade').removeClass('hidden');
                jQuery('#maiorIdade').addClass('hidden');
                jQuery('#tabEndereco').addClass('disabled');
            }
        }
    });
    jQuery("#responsavel").autocomplete({
        source: function(request, response) {
                jQuery.ajax( {
                    url: smasy.getBase()+"responsaveis/autoCompleteResp/"+request.term,
                    dataType: "json",
                    success: function( data ) {
                        response( data );
                    }
                } );
        },
        minLength: 3,
        select: function( event, ui ) {
            $("#responsavel_id").val(ui.item.id);
        }
    });

    jQuery('#btAddResponsavel').click(function () {
        jQuery.ajax({
            type: "POST",
            url:smasy.getBase()+"responsaveis/adicionar/true",
            success: function (html) {
                jQuery('#addResponsavel').find('.modal-body').html(html);
            },
        });
    });
});

jQuery(document).ready(function(){

});

function getAge(dataNascimento) {

    dataNascimento = dataNascimento.split("/");
    dataNascimento = new Date(dataNascimento[2], dataNascimento[1] - 1, dataNascimento[0]);
    var dataAtual = new Date();

    var idade = parseInt(dataAtual.getYear()) - parseInt(dataNascimento.getYear());

    if(parseInt(dataNascimento.getMonth()) > parseInt(dataAtual.getMonth()) ){
        return --idade;
    }else if(parseInt(dataNascimento.getMonth()) == parseInt(dataAtual.getMonth()) && parseInt(dataNascimento.getDate()) > parseInt(dataAtual.getDate())){
        return --idade;
    }else{
        return idade;
    }
}