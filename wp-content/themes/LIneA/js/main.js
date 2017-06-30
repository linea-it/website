$(document).ready(function(){
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd'
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
