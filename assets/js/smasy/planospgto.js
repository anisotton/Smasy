jQuery(document).ready(function () {
    jQuery(this).on("change","#tipodesconto",function(e) {
        jQuery('#desconto').val('');
        if(jQuery(this).val() == 1){
           jQuery('#desconto').addClass('mask-money');
           jQuery('#real').removeClass('hidden');
           jQuery('#percentual').addClass('hidden');
        } else if(jQuery(this).val() == 2){
           jQuery('#desconto').removeClass('mask-money');
           jQuery('#percentual').removeClass('hidden');
           jQuery('#real').addClass('hidden');
        }
    });
});