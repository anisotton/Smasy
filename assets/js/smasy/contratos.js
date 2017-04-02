jQuery(document).ready(function () {
    jQuery('#removeArquivo').on('click',function (e) {
        e.preventDefault();

        jQuery('#mudarArquivo').val('1');
        jQuery(this).siblings('input[type=hidden]').remove();
        jQuery(this).siblings('#nomeArquivo').remove();
        jQuery(this).siblings('#envioArquivo').removeClass('hidden');
        jQuery(this).remove();


    });

});