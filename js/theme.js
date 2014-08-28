jQuery(document).ready(function ($) {
  $('[data-toggle="offcanvas"]').click(function () {
    $('.row-offcanvas').toggleClass('active')
  });
  $('.current').parent('li').addClass('active');
  $('.search-submit').addClass('btn btn-primary');
  $('.search-field').addClass('form-control');
  $('.ninja-forms-cont input,.ninja-forms-cont textarea').addClass('form-control');
  $('.ninja-forms-cont').addClass('form-group');
  $('.ninja-forms-cont :submit').addClass('btn btn-primary');

  $('#commentform').addClass('form-group');
  $('#comment').addClass('form-control');
  $('#commentform :submit').addClass('btn btn-success');
});
