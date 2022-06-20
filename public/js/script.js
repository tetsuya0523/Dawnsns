$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});

$(function () {
  $('.pull_dawn').click(function () { //下矢印のプルダウンを(.pull_dawn)をクリック
    $(this).toggleClass('active'); //.pull_dawnに(.active)を追加・削除
    $('.g-navi').toggleClass('active'); //(.g-navi)にも(.active)を追加
  });
});
