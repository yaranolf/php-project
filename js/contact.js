
$(function() {
    var form = $('#contact');
    var formMessages = $('#form-messages');

$(form).submit(function(e) {
    event.preventDefault();

    var formData = $(form).serialize();

    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: formData
    })

    .done(function(response) {
        $(formMessages).removeClass('error');
        $(formMessages).addClass('success');
    

        $(formMessages).text(response);

        $('#name').val('');
        $('#email').val('');
        $('#message').val('');
    })

   .fail(function(data) {
    $(formMessages).removeClass('success');
    $(formMessages).addClass('error');

    if (data.responseText !== '') {
        $(formMessages).text(data.responseText);
    } else {
        $(formMessages).text('Oops! Your message could not be sent.');
    }
});

});
    
});