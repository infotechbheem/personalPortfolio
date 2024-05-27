$(document).ready(function () {
    $('#myForm').submit(function (event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    // Show success message
                    $('.sent-message').text(response.message).show();
                    // Clear form fields
                    $('#myForm')[0].reset();
                } else {
                    // Show error message
                    $('.error-message').text(response.message).show();
                }
            },
            error: function (xhr, status, error) {
                // Handle AJAX error
                console.error('Error:', error);
                // Show error message
                $('.error-message').text('An error occurred while processing your request. Please try again later.').show();
            }
        });
    });
});