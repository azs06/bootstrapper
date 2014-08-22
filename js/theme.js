jQuery(document).ready(function ($) {
  $('[data-toggle="offcanvas"]').click(function () {
    $('.row-offcanvas').toggleClass('active')
  });
  $('.current').parent('li').addClass('active');
  $('.search-submit').addClass('btn btn-primary');
  $('.search-field').addClass('form-control');
});
