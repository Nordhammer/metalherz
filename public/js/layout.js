/* "TO TOP" START */
$('body').append('<div id="toTop" class="btn btn-primary"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>');
$(window).scroll(function() {
    if ($(this).scrollTop() != 0) {
        $('#toTop').fadeIn();
    } else {
        $('#toTop').fadeOut();
    }
});
$('#toTop').click(function() {
    $("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
});
$(".nav a").click(function() {
    if ($(".navbar-collapse").hasClass("in")) {
        $('[data-toggle="collapse"]').click();
    }
});


/* kennwort im formular anzeigen oder verstecken */
$(document).ready(function() {
    $('.pass_show').append('<span class="ptxt">Show</span>');
});

$(document).on('click', '.pass_show .ptxt', function() {
    $(this).text($(this).text() == "Show" ? "Hide" : "Show");
    $(this).prev().attr('type', function(index, attr) { return attr == 'password' ? 'text' : 'password'; });
});


// EINBLENDUNG DER HINWEISE OBEN IM HEADER => footer.tpl
$(document).ready(function() {
    $("#hint_header").fadeIn("slow").delay(2000).fadeOut("slow");
    $("#text").delay(1250).fadeOut(3000);
});

/* drag and drop image upload */
+

function($) {
    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}(jQuery);