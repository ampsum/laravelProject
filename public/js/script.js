var $ = jQuery;
$(document).ready(function () {
    $('#dropdown-menu').hide();
    $('#navbarDropdown').click(()=> {
        $('#dropdown-menu').toggle();
    })

    $('#counter').submit((e) => {
        $('.result').toggle();
    })

    $('.navbar-toggler-icon').click(function() {
        $('#navbarSupportedContent').fadeToggle();
    })
});
