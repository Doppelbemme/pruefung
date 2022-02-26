$(document).ready(function () {
    $('.hero').hide();
    $('.registration-popup-box').hide();
    $('.loader-box').fadeOut(250);
    $('.hero').fadeIn();

    var url = window.location.href;
    if(url.includes("regback")){
        var urlSplit = url.split('&');
        $('#register-surname').val(getValue(urlSplit[1]));
        $('#register-lastname').val(getValue(urlSplit[2]));
        $('#register-email').val(getValue(urlSplit[3]));
        $('.registration-popup-box').fadeIn();
    }
});

$('#close-register-popup').click(function (evt) { 
    $('.registration-popup-box').fadeOut();
    evt.preventDefault();
});

$('#open-register-popup').click(function (evt) { 
    $('#register-surname').val('');
    $('#register-lastname').val('');
    $('#register-email').val('');
    $('#register-password').val('');

    if($('#register-surname').hasClass("form-input-error")){
        $('#register-surname').removeClass("form-inputs-error");
    }

    if($('#register-lastname').hasClass("form-input-error")){
        $('#register-lastname').removeClass("form-input-error");
    }

    if($('#register-email').hasClass("form-input-error")){
        $('#register-email').removeClass("form-input-error");
    }

    if($('#register-password').hasClass("form-input-error")){
        $('#register-password').removeClass("form-input-error");
    }

    $('.registration-popup-box').fadeIn();
    evt.preventDefault();
});

function getValue(argument){
    return argument.split('=')[1];
}