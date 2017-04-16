jQuery(document).ready(function(){
    jQuery('select').select2();

    jQuery('#codplanopgto, #meses').change(function () {
        calculaInfos();
    });
});

function calculaInfos() {
    var option = jQuery('#codplanopgto').find('option:selected');

    var valorTotalSemDesc,valorTotal,valorParcela;
    var tipodesconto = jQuery(option).attr('data-tipodesconto');
    var desconto = jQuery(option).attr('data-desconto');
    var parcelas = jQuery(option).attr('data-parcelas');
    var meses = jQuery('#meses').val();
    var valorMensalidade = jQuery('#infoMensalidade').html().replace('R$ ','').replace(',','.');

    if(tipodesconto=='Real'){
        jQuery('#infoDesconto').html('R$ '+desconto);
    }else if(tipodesconto == 'Percentual'){
        jQuery('#infoDesconto').html(parseInt(desconto)+'%');
    }else{
        jQuery('#infoDesconto').html('R$ 0,00');
    }

    valorTotalSemDesc = FormatMoney(valorMensalidade*meses);
    if(tipodesconto == 'Real'){
        valorTotal = FormatMoney((valorMensalidade-desconto)*meses);
    }else if(tipodesconto == 'Percentual'){
        desconto = (desconto/100)*valorMensalidade;
        valorTotal = FormatMoney((valorMensalidade-desconto)*meses);
    }else{
        valorTotal = FormatMoney(valorMensalidade*meses);
    }
    valorParcela = FormatMoney(valorTotal.replace(',','.')/parcelas);
    jQuery('#infoTotalParcela').html(parcelas+'x R$ '+valorParcela);
    jQuery('#infoTotal').html('R$ '+valorTotal);
    jQuery('#infoTotalSemDesconto').html('R$ '+valorTotalSemDesc);

}

var WGdc=","; var WGgc="."; var WGnc="(";
function FormatMoney(A,W) {
    var N=Math.abs(Math.round(A*100));
    var S=((N<10)?"00":((N<100)?"0":""))+N;
    S=((A<0)?WGnc:"")+Group(S.substring(0,(S.length-2)))+WGdc+
        S.substring((S.length-2),S.length)+((A<0&&WGnc=="(")?")":"");
    return (S.length>W)?"over":S;
}
function Group(S) {
    return (S.length<4)?S:(Group(S.substring(0,S.length-3))+
        WGgc+S.substring(S.length-3,S.length));
}
