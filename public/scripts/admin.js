$(document).ready(function () {
  $('#form').submit(function (event) {
    event.preventDefault();

    var form = $(this);

    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize(),
      success: function (response) {
        console.log(response);
        let responseParse = jQuery.parseJSON(response);
        if(responseParse.url) {
          window.location.href = `/${responseParse.url}`
        } else {
          alert('Status: ' + responseParse.status + ', Message: ' + responseParse.message);
        }
        // if (responseParse.status === 'success') {
        //   $('#registration-form').hide();
        //   $('#success-message').show();
        //   alert('Status: ' + responseParse.status + ', Message: ' + responseParse.message)
        // } else {
        //   $('#error-message').show();
        //   alert('Status: ' + responseParse.status + ', Message: ' + responseParse.message)
        // }
      },
      error: function () {
        $('#error-message').show();
      }
    });
  });

});