$(document).ready(function(){
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd'
    });

    $('.video-grupo-titulo').click(function() {
      $(this).next().toggleClass('show-video-grupo');
      $(this).find('.fa').toggleClass('fa-caret-down fa-caret-right');
    });
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
