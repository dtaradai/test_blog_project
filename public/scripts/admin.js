$(document).ready(function () {
  $('#form').submit(function (event) {
    event.preventDefault();

    var form = $(this);
    var formData = new FormData();  // Для отправки файлов понадобится объект FormData. Подробнее про него можно прочитать в документации - https://developer.mozilla.org/en-US/docs/Web/API/FormData

    // Сбор данных из обычных полей
    form.find(':input[name]').not('[type="file"]').each(function () {
      var field = $(this);
      formData.append(field.attr('name'), field.val());
    });

    // Сбор данных о файле (будет немного отличаться для нескольких файлов)
    var filesField = form.find('input[type="file"]');
    var fileName = filesField.attr('name');
    var file = filesField.prop('files')[0];
    formData.append(fileName, file);

    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        console.log(response);
        let responseParse = jQuery.parseJSON(response);
        if (responseParse.url) {
          window.location.href = `/${responseParse.url}`
        } else {
          alert('Status: ' + responseParse.status + ', Message: ' + responseParse.message);
        }
      },
      error: function () {
        $('#error-message').show();
      }
    });
  });

});