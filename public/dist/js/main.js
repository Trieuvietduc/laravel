$(function () {
  $('.js-check-all').on('click', function () {

    if ($(this).prop('checked')) {
      $('th input[type="checkbox"]').each(function () {
        $(this).prop('checked', true);
        $(this).closest('tr').addClass('active');
        var result = [];
        for (let i = 0; i < $(this).length; i++) {
          if ($(this).prop('checked', true)) {
            result += $(this)[i].value;
          }
        }
        console.log(result);

      })
    } else {
      $('th input[type="checkbox"]').each(function () {
        $(this).prop('checked', false);
        $(this).closest('tr').removeClass('active');
      })
    }
  });

  $('th[scope="row"] input[type="checkbox"]').on('click', function () {
    if ($(this).closest('tr').hasClass('active')) {
      $(this).closest('tr').removeClass('active');
    } else {
      $(this).closest('tr').addClass('active');
    }
  });
});

function test(id) {
  console.log(id);
  // var a = document.getElementById('all')
  // console.log(a);
  // if (a.checked) {
  //   // console.log(id);
  //   document.getElementById('but').setAttribute('onclick', 'sua(' + id + ')');

  // } else if (!(a.checked)) {
  //   // console.log(id);  

  // }

}


