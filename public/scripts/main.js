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
        if (responseParse.url) {
          window.location.href = `/${responseParse.url}`
        } else {
          if (responseParse.status === 'success') {
            $('#registration-form').hide();
            $('#success-message').show();
            alert('Status: ' + responseParse.status + ', Message: ' + responseParse.message)
          } else {
            $('#error-message').show();
            alert('Status: ' + responseParse.status + ', Message: ' + responseParse.message)
          }
        }
      },
      error: function () {
        $('#error-message').show();
      }
    });
  });

  $('.slider').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    dots: true,
    infinite: false,
    responsive: [
      {
        breakpoint: 1175,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 769,
        setings: {
          slidesToShow: 4,
          slidesToScroll: 4,
        }
      }
    ]
  });

  $('.menu__btn').on('click', function () {
    $('.menu__list').toggleClass('menu__list--active')
  })

});