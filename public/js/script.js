var $ = jQuery;
$(document).ready(function () {
    $('#dropdown-menu').hide();
    $('#navbarDropdown').click(()=> {
        $('#dropdown-menu').toggle();
    })
});
