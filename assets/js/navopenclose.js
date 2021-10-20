function opens() {
  document.getElementById("sidebar-menu").style.left = "0px";
}

function closes() {
  document.getElementById("sidebar-menu").style.left = "-300px";
}

document
  .getElementsByClassName("container")[0]
  .addEventListener("click", closes);

window.onclick = function (event) {
  if (
    !event.target.matches(".sidebar-icon") &&
    !event.target.matches(".sidebar-menu-item") &&
    !event.target.matches(".sidebar-menu") &&
    !event.target.matches(".sidebar-menu-search")
  ) {
    document.getElementById("search-country").value = "";
    var input, a, i;
    a = document.getElementsByClassName("sidebar-menu-item");
    var input = document.getElementById("search-country").value;
    if (input == "") {
      for (i = 0; i < a.length; i++) {
        a[i].style.display = "";
      }
    }
    closes();
  }
};

function showcountry() {
  var input, filter, a, i, text;
  var input = document.getElementById("search-country").value;
  filter = input.toUpperCase();
  a = document.getElementsByClassName("sidebar-menu-item");
  for (i = 0; i < a.length; i++) {
    text = a[i].innerHTML;
    if (text.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
