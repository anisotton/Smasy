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

    var Mask = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 0000-00000' : '(00) 0000-00009';
    };
    var spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(Mask.apply({}, arguments), options);
        }
    };

    jQuery('.mask-phone').mask(Mask, spOptions);
    jQuery(".mask-cpf").mask("999.999.999-99");
    jQuery(".mask-date").mask("99/99/9999");
    jQuery(".mask-cep").mask("99999-999");
    jQuery('.mask-money').mask('#.##9,99', {reverse: true});
    jQuery('.mask-hour').mask('00:00');

    jQuery(this).on("click",'tr.row-clickable td.no-clickable',function(e) {
        e.stopPropagation();
    });
    jQuery(this).on("click",'tr.row-clickable',function(e) {
        var url = jQuery(this).attr('data-link');
        window.location = url;
    });


    jQuery('input[type=checkbox],input[type=radio],input[type=file]').uniform();

    jQuery(this).on('click','.nav-tabs a',function (e) {
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