var smasy = {}
jQuery(document).ready(function(){

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