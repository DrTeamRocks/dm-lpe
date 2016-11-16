document.addEventListener("DOMContentLoaded", function () {
    var b = document.getElementsByTagName("body")[0];
    var s = document.getElementById("main-container");
    console.log(b.offsetHeight);
    console.log(s.offsetHeight);
    b.offsetHeight > s.offsetHeight && document.getElementsByClassName("footer")[0].classList.add("stick-to-bottom")
}, !1);
