$(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
        $('#back-to-top').fadeIn("slow");
    } else {
        $('#back-to-top').fadeOut("slow");
    }
});

$("#back-to-top").on("click touchstart", function() {
    $(window).scrollTop(0);
});

