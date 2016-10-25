 






$(document).ready(function(){









      $(function() {
             
              $('#inativo').mask('99/99/9999');
           });


     //data de saida

      $("#inactive").click(function(){
          $("#desligado").show();
      })
      $("#active").click(function(){
      $("#desligado").hide();

     });




      //decrição dos checkbos do accordion

    $("#teste").hide();       
    $("#help").mouseenter(function(){
        $("#teste").show();   
    });
    $("#help").mouseleave(function(){
        $("#teste").hide();
    });            

    $("#teste2").hide();       
    $("#help2").mouseenter(function(){
        $("#teste2").show();   
    });
    $("#help2").mouseleave(function(){
        $("#teste2").hide();
    });  

    $("#teste3").hide();       
    $("#help3").mouseenter(function(){
        $("#teste3").show();   
    });
    $("#help3").mouseleave(function(){
        $("#teste3").hide();
    }); 

    $("#teste4").hide();       
    $("#help4").mouseenter(function(){
        $("#teste4").show();   
    });
    $("#help4").mouseleave(function(){
        $("#teste4").hide();
    });     

    $("#teste5").hide();       
    $("#help5").mouseenter(function(){
        $("#teste5").show();   
    });
    $("#help5").mouseleave(function(){
        $("#teste5").hide();
    });
    
    $("#teste6").hide();       
    $("#help6").mouseenter(function(){
        $("#teste6").show();   
    });
    $("#help6").mouseleave(function(){
        $("#teste6").hide();
    });

    $("#teste7").hide();       
    $("#help7").mouseenter(function(){
        $("#teste7").show();   
    });
    $("#help7").mouseleave(function(){
        $("#teste7").hide();
    });

    $("#teste8").hide();       
    $("#help8").mouseenter(function(){
        $("#teste8").show();   
    });
    $("#help8").mouseleave(function(){
        $("#teste8").hide();
    });

    $("#teste9").hide();       
    $("#help9").mouseenter(function(){
        $("#teste9").show();   
    });
    $("#help9").mouseleave(function(){
        $("#teste9").hide();
    });



       $("#submit").click(function(){

        if ($("#form1").valid()) {

        
            $.post("function_insert.php", $("#form1").serialize(), function(data) {
                $("#idcadastro").html(data);
      		alert('You are going to receive an email of Registration Confirmation.');
       
            });
            
          
        }
          
        });
});