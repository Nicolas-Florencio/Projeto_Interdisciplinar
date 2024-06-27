function toggleNav() {
  var sidebar = document.getElementById("mySidebar");
  var main = document.getElementById("main");
  if (sidebar.style.width === "250px") {
      sidebar.style.width = "0";
      main.style.marginRight = "0";
  } else {
      sidebar.style.width = "250px";
      main.style.marginRight = "250px";
  }
}
