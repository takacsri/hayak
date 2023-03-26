/*$(document).ready(function(){

$('#demo').hover(
  function () {
    $(this).toggle();

 
});



}); */


// Add active class to the current button (highlight it)
var a = document.querySelectorAll(".side-nav a");
for (var i = 0, length = a.length; i < length; i++) {
  a[i].onclick = function() {
    var b = document.querySelector(".side-nav li.active");
    if (b) b.classList.remove("active");
    this.parentNode.classList.add('active');
  };

}