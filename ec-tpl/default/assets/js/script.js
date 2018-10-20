$('.selection').dropdown({
    onChange: function(value) {
      $('.demo.icon') .popup({ transition: value }).popup('toggle') ;
    }
  });

var content = [
  { title: 'Работа', url: 'job.html' },
  { title: 'Чат', url: 'chat.html' },
  { title: 'Информация', url: 'info.html' },
  { title: 'Create', url: 'wladek.html' },
  { title: 'Работа', url: 'job.html' }
  // etc
];

$('.ui.search')
  .search({
    source: content
  })
;

var count = 1;
window.loadFakeContent = function() {
  // load fake content
  var
    $segment = $('.ui.comments'),
    $loader  = $segment.find('.inline.loader'),
    $content = $('<div class="comment"><a class="avatar"><img src="https://semantic-ui.com/images/avatar/small/matt.jpg"></a><div class="content"><a class="author">Matt</a><div class="metadata"><span class="date">Today at 5:42PM</span></div><div class="text">How artistic!</div><div class="actions"><a class="reply">Reply</a></div></div></div>')
  ;
  if(count <= 5) {
    $loader.addClass('active');
    setTimeout(function() {
      $loader
        .removeClass('active')
        .before($content)
      ;
      $('.ui.comments')
        .visibility('refresh')
      ;
    }, 1000);
  }
  count++;
}

$('#auth_form').on('submit', function(e) {
  e.preventDefault();
  var $that = $(this);
  var formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
  $('#btn_auth').prop('disabled', true);
  function clean() {
    $('#result')
      .animate({opacity: 0, top: '45%'}, 200,
      function(){ 
        $('#result').html('');
        $('#result').css('opacity', '1');
      }
    );
  }
  $.ajax({
    url: './ec-inc/update.php',
    type: 'POST',
    contentType: false, // важно - убираем форматирование данных по умолчанию
    processData: false, // важно - убираем преобразование строк по умолчанию
    data: formData,
    cache: false,   
    success: function(data) { 
      if(data) {
        $('#btn_auth').prop('disabled', false);
          $('#result').html(data);
        setTimeout(clean, 2000);
      } else {
        $('#result').html('<br><center>Заполните все поля</center>');
        $('#btn_auth').prop('disabled', false);
        setTimeout(clean, 2000);
      }
    }
  });
});

/*
$('.demo')
  .visibility({
    once: false,
    // update size when new content loads
    observeChanges: true,
    // load content on bottom edge visible
    onBottomVisible: function() {
      window.loadFakeContent();
    }
  })
;*/

