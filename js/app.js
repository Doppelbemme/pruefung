$(document).ready(function () {
    $('.hero').hide();
    $('.popup-box').hide();
    $('.success-popup').hide();
    $('.registration-popup')
    $('.loader-box').fadeOut(250);
    $('.hero').fadeIn();

    var url = window.location.href;
    if(url.includes("regback=success")){
        $('.popup-box').fadeIn();
        $('.success-popup').show();
    }else if(url.includes("regback=mail")){
        console.log("mail regback");
        var urlSplit = url.split('&');
        $('#register-surname').val(getValue(urlSplit[1]));
        $('#register-lastname').val(getValue(urlSplit[2]));
        $('#register-email').val(getValue(urlSplit[3]));
        $('.popup-box').fadeIn();
        $('.registration-popup').show();
    }
});

$('#close-success-button').click(function (evt) { 
    $('.popup-box').fadeOut();
    $('.success-popup').hide();
    evt.preventDefault();
});

$('#close-register-popup').click(function (evt) { 
    $('.popup-box').fadeOut();
    $('registration-popup').hide();
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

    $('.popup-box').fadeIn();
    $('.registration-popup').show();

    evt.preventDefault();
});

content =   '<div class="question-box quiz-active quiz-remove">' +
                '<div class="question-box-header">' +  
                    '<h2>Der Großhandelsbetrieb ist das Bindeglied für?</h2>' +
                '</div>' + 
                '<div class="question-box-content">' +
                    '<form class="question-answer">' +
                        '<div class="question-answer-box">' +
                            '<input class="question-answer-input" type="checkbox" name="answer-1">' +
                            '<label class="question-answer-label" for="answer-1">Erzeuger & Verbraucher</label>' +
                        '</div>' +
                        '<div class="question-answer-box">' +
                            '<input class="question-answer-input" type="checkbox" name="answer-2">' +
                            '<label class="question-answer-label" for="answer-2">Staat & Bürger</label>' +
                        '</div>' +
                        '<div class="question-answer-box">' +
                            '<input class="question-answer-input" type="checkbox" name="answer-3">' +
                            '<label class="question-answer-label" for="answer-3">Staat & Staaten</label>' +
                        '</div>' +
                    '<input class="question-answer-submit btn btn--big register-btn btn-inactive" type="submit" value="Weiter">' +
                '</form>' + 
                '</div>' +
            '</div>'

$('#quiz-start').click(function (evt) { 
    evt.preventDefault();
});

$('#answer-1').click(function (evt) { 
    if($('#answer-1').is('[disabled=disabled]')){
        return;
    }

    console.log("Pass");

    if($('#answer-2').is('[disabled=disabled]') == false && $('#answer-3').is('[disabled=disabled]') == false){
        $('#answer-2').attr("disabled", true);
        $('#answer-3').attr("disabled", true);
        $('#answer-submit').attr("disabled", false);
        $('#answer-submit').removeClass('btn-inactive');
    }else{
        $('#answer-2').attr("disabled", false);
        $('#answer-3').attr("disabled", false);
        $('#answer-submit').attr("disabled", true);
        $('#answer-submit').addClass('btn-inactive');
    }
});

$('#answer-2').click(function (evt) { 
    if($('#answer-2').is('[disabled=disabled]')){
        return;
    }

    console.log("Pass");

    if($('#answer-1').is('[disabled=disabled]') == false && $('#answer-3').is('[disabled=disabled]') == false){
        $('#answer-1').attr("disabled", true);
        $('#answer-3').attr("disabled", true);
        $('#answer-submit').attr("disabled", false);
        $('#answer-submit').removeClass('btn-inactive');
    }else{
        $('#answer-1').attr("disabled", false);
        $('#answer-3').attr("disabled", false);
        $('#answer-submit').attr("disabled", true);
        $('#answer-submit').addClass('btn-inactive');
    }
});

$('#answer-3').click(function (evt) { 
    if($('#answer-3').is('[disabled=disabled]')){
        return;
    }

    console.log("Pass");

    if($('#answer-2').is('[disabled=disabled]') == false && $('#answer-1').is('[disabled=disabled]') == false){
        $('#answer-2').attr("disabled", true);
        $('#answer-1').attr("disabled", true);
        $('#answer-submit').attr("disabled", false);
        $('#answer-submit').removeClass('btn-inactive');
    }else{
        $('#answer-2').attr("disabled", false);
        $('#answer-1').attr("disabled", false);
        $('#answer-submit').attr("disabled", true);
        $('#answer-submit').addClass('btn-inactive');
    }
});

function getValue(argument){
    return argument.split('=')[1];
}