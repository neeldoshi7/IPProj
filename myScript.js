console.log("Hello from my javascript");

$(document).ready(function(){
  $(".clicked").click(function(){
    $("#indexContent").fadeOut();
  });
});
