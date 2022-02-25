$(document).ready(function () {
    $('.hero').hide();
    $('.registration-popup-box').hide();
    $('.loader-box').fadeOut(250);
    $('.hero').fadeIn();
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
    $('.registration-popup-box').fadeIn();
    evt.preventDefault();
});