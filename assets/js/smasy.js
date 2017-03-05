jQuery(document).ready(function () {
    jQuery('tr.row-clickable').click(function () {
        var url = jQuery(this).attr('data-link');
        window.location = url;
    });
});