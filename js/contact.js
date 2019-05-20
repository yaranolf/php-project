
$(function() {
    // Get the form.
    var form = $('#contact');

    // Get the messages div.
    var formMessages = $('#form-messages');

// Set up an event listener for the contact form.
$(form).submit(function(event) {
    // Stop the browser from submitting the form.
    event.preventDefault();

    var formData = $(form).serialize();

    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: formData
    })
    
    .done(function(response) {
        // Make sure that the formMessages div has the 'success' class.
        $(formMessages).removeClass('error');
        $(formMessages).addClass('success');
    
        // Set the message text.
        $(formMessages).text(response);
    
        // Clear the form.
        $('#name').val('');
        $('#email').val('');
        $('#message').val('');
    })
   

});
    
});