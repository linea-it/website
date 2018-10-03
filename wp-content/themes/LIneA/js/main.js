$(document).ready(function(){
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd'
    });

    $('.video-grupo-titulo').click(function() {
      $(this).next('.video-grupo').toggleClass('show-video-grupo');
      $(this).find('.fa').toggleClass('fa-caret-down fa-caret-right');
    });
    $('.video-subgrupo-titulo').click(function() {
        $(this).next('.video-subgrupo').toggleClass('show-video-subgrupo');
        $(this).find('.fa').toggleClass('fa-caret-down fa-caret-right');
      });

    // Set the date we're counting down to
    var dataAgendada = document.getElementById("contador").innerHTML;
    console.log(dataAgendada);
    var countDownDate = new Date(dataAgendada).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //   hours = ("0" + hours).slice(-2);
    //   minutes = ("0" + minutes).slice(-2);
    //   seconds = ("0" + seconds).slice(-2);
    //
      // Display the result in the element with id="demo"
      document.getElementById("contador").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s";

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("contador").innerHTML = "EXPIRED";
      }
    }, 1000);

});


function toggleYear(obj){
      var el = document.getElementById(obj);
      if ( el.style.display == "block" ){
         el.style.display = "none";
      }
      else{
         el.style.display = "block";
      }
   }

function showAll(classToShow){
    var x = document.getElementsByClassName(classToShow);
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "block";
    }
}

function hideAll(classToHide){
    var x = document.getElementsByClassName(classToHide);
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
}