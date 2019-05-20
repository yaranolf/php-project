
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
    
   

});
    
});