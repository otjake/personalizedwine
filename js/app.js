//accordions in index
$(document).ready(function() {
  //uses the shown.bs.collapse' function
  //when toggle is to be shown searches for things with the collapse class,finds the .glyphicon-menu-down in span class,removes it and replaces it with glyphicon-menu-up class
  $(".collapse").on("shown.bs.collapse", function() {
    $(this)
      .parent()
      .find(".fa-angle-down")
      .removeClass("fa-angle-down")
      .addClass("fa-angle-up");
  });
  //uses the hidden.bs.collapse' function
  //when toggle is to be hidden searches for things with the collapse class,finds the .glyphicon-menu-down in span class,removes it and replaces it with glyphicon-menu-up class
  $(".collapse").on("hidden.bs.collapse", function() {
    $(this)
      .parent()
      .find(".fa-angle-up")
      .removeClass("fa-angle-up")
      .addClass("fa-angle-down");
  });
});
//accordions in index

//slider in our cart overlay

function openNav() {
  document.getElementsByClassName("cart")[0].style.transform = "translateX(0)";
}
function closeNav() {
  document.getElementsByClassName("cart")[0].style.transform =
    "translateX(101%)";
}
//slider in our cart overlay

function opensearch() {
  document.getElementsByClassName("search_overlay")[0].style.transform =
    "translateX(0)";
}
function closesearch() {
  document.getElementsByClassName("search_overlay")[0].style.transform =
    "translateX(101%)";
}
