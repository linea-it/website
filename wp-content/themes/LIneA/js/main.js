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
    
    // Grid Afiliados
    var $gridAfiliados = $('.grid-afiliados').isotope({
        // options
        itemSelector: '.grid-item-afiliado',
        layoutMode: 'fitRows',
        getSortData: {
            name: '.nome',
            institution: '.instituicao'
        }
    });
    $gridAfiliados.imagesLoaded().progress( function() {
        $gridAfiliados.isotope('layout');
    });
    $('.grid-sort-name').click(function(){
        console.log("Sorting by name");
        console.log($gridAfiliados);
        $gridAfiliados.isotope({ sortBy: 'name' });
    });
    $('.grid-sort-institution').click(function(){
        console.log("Sorting by institution");
        $gridAfiliados.isotope({ sortBy: 'institution' });
    });
    $('.filter').click(function() {
        var filterValue = $( this ).attr('data-filter');
        console.log(filterValue);
        $gridAfiliados.isotope({ filter: filterValue });
        $('.filter.active-filter').toggleClass('active-filter');
        $(this).toggleClass('active-filter');
    });
    $('.sort').click(function() {
        $('.sort.active-filter').toggleClass('active-filter');
        $(this).toggleClass('active-filter');
    });

    // Landing Page

    $('.lpcard-content').hover(function(){
        $(this).addClass('lpcard-content-fullwidth');
        $(this).parent().find('.lpcard-icon-container').addClass('lpcard-icon-container-hide');
    }, function(){
        $(this).removeClass('lpcard-content-fullwidth');
        $(this).parent().find('.lpcard-icon-container').removeClass('lpcard-icon-container-hide');
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

function visao_compacta(){
    var x = document.getElementsByClassName('afiliados-foto-td');
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }

    var x = document.getElementsByClassName('afiliados-foto-th');
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
}

function visao_normal(){
    var x = document.getElementsByClassName('afiliados-foto-td');
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "table-cell";
    }

    var x = document.getElementsByClassName('afiliados-foto-th');
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "table-cell";
    }
}