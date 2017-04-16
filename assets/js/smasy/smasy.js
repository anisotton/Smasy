var smasy = {}


var languageDataTable = {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
    "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
        "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
    }
};
jQuery(document).ready(function(){

    jQuery('.data-table').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "sDom": '<""l>t<"F"fp>',
        "language": languageDataTable
    });

    jQuery(".mask-phone").focusout(function(){
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    }).trigger('focusout');
    jQuery(".mask-cpf").mask("999.999.999-99");
    jQuery(".mask-date").mask("99/99/9999");
    jQuery(".mask-cep").mask("99999-999");
    jQuery('.mask-money').mask('#.##9,99', {reverse: true});
    jQuery('.mask-hour').mask('00:00');

    jQuery('tr.row-clickable td.no-clickable').click(function (e) {
        e.stopPropagation();
    });
    jQuery('tr.row-clickable').click(function () {
        var url = jQuery(this).attr('data-link');
        window.location = url;
    });


    jQuery('input[type=checkbox],input[type=radio],input[type=file]').uniform();

    jQuery('.nav-tabs a').on('click',function (e) {
        if(jQuery(this).parent().hasClass('disabled')){
            e.preventDefault();
            e.stopImmediatePropagation();
        }
    });
    jQuery(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' }).on('changeDate', function (ev) {
        jQuery(this).find('input').change();
    });

});
smasy.submitAjax = function (form) {
    var method = jQuery(form).attr('method');
    var url = jQuery(form).attr('action');
    var contentResult = jQuery(form).attr('data-result');

    jQuery.ajax({
        type: method,
        url:url,
        data:jQuery(form).serializeArray(),
        success: function (html) {
            jQuery(contentResult).html(html);
        },
    });

    return false;
}
smasy.getBase = function () {
    return jQuery('base').attr('href');
}