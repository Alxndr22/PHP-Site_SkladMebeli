$(document).ready(function () {
    $("#menu_toggle").click(function ()  {
        if ( $("body").hasClass("lock")) {
            $("body").removeClass("lock");
            $("#offcanvas").removeClass("active");
        } else {
            $("body").addClass("lock");
            $("#offcanvas").addClass("active");
        }
    });
});






