$(document).ready(function() {
  //form text and textarea fancylabels (mobile, tablet, desktop)
  function applyFancylabel(field) {
    if ($(field).val() !== "") {
      $(field).parent().addClass("filled");
    } else {
      $(field).parent().removeClass("filled");
    }
  }
  $(".fancylabel input, .fancylabel textarea").each(function() {
    applyFancylabel($(this));
    $(this).on("change keyup", function() {
      applyFancylabel($(this));
    });
  });

  //form select fancylabels (mobile, tablet, desktop)
  function applyFancylabelSelect(field) {
    if (!$(field).children(":selected").hasClass("select-placeholder")) {
      $(field).parent().addClass("filled");
    } else {
      $(field).parent().removeClass("filled");
    }
  }
  $(".select-input select option:first-of-type").each(function() {
    $(this).addClass("select-placeholder");
  });
  $(".fancylabel select, select").each(function() {
    applyFancylabelSelect($(this));
    $(this).on("change", function() {
      applyFancylabelSelect($(this));
      if ($(this).find("option:selected").hasClass("select-placeholder")) {
        $(this).blur();
      }
    });
  });
});

