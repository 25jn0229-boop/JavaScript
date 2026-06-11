$(function () {
  $("a.modal").click(function () {
    $("#glayLayer").show();
    $("#overLayer").show();
    let imgfile = $(this).attr("href");
    $("#overLayer").html(`<img src="${imgfile}">`);
    return false;
  });

  $("#glayLayer").click(function () {
    $("#glayLayer").hide();
    $("#overLayer").hide();
  });
});
