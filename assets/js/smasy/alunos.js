jQuery(document).ready(function () {
    jQuery(this).on('change',"#dtnascimento",function () {
        if(jQuery(this).val()){
            var birthDate = jQuery('#dtnascimento').val();
            if(getAge(birthDate) >= 18){
                jQuery('#maiorIdade').removeClass('hidden');
                jQuery('#menorIdade').addClass('hidden');
                jQuery('#tabEndereco').removeClass('disabled');
                jQuery('#tabDocumentos').removeClass('disabled');

            }else{
                jQuery('#menorIdade').removeClass('hidden');
                jQuery('#maiorIdade').addClass('hidden');
                jQuery('#tabEndereco').addClass('disabled');
                jQuery('#tabDocumentos').addClass('disabled');
            }
        }
    });
    jQuery("#responsavel").autocomplete({
        source: function(request, response) {
                jQuery.ajax( {
                    url: smasy.getBase()+"alunos/buscaRespAutocomplete/"+request.term,
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
    jQuery('#btAddResponsavel').click(function (e) {
        e.preventDefault();
        window.open(smasy.getBase()+"pessoas/adicionar",'Adicionar pessoa');
    });
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