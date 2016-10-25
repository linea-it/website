 






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



/* $("#input_user").hide();
      //edit user_of_linea
      $("#edit, #cancel_edit").click(function(e){
    e.preventDefault();
          $("#label_user").toggle();
    $("#input_user").toggle();
          $("#edit").toggle();
          $("#cancel_edit").toggle();
          $("#edit").show();
          $("#cancel_edit").show();
         
      });*/
      $("#input_user").hide();
      //edit user_of_linea
      $("#edit").click(function(e){
	  e.preventDefault();
          $("#label_user").toggle();
	  $("#input_user").toggle();
          $("#edit").toggle();
        
          $("#edit").show();
               
      });


       $("#input_telefone").hide();
      //edit user_of_linea
      $("#edit_telefone").click(function(e){
    e.preventDefault();
          $("#label_telefone").toggle();
    $("#input_telefone").toggle();
          $("#edit_telefone").toggle();
          
          $("#edit_telefone").show();
         
         
      });


      $("#input_celular").hide();
      //edit user_of_linea
      $("#edit_celular").click(function(e){
    e.preventDefault();
          $("#label_celular").toggle();
    $("#input_celular").toggle();
          $("#edit_celular").toggle();
          
          $("#edit_celular").show();
         
         
      });










      //$("#active").click(function(){
      //$("#desligado").hide();




      //decrição dos checkbos do accordion

   //decrição dos checkbos do accordion
 $("#telefone").hide();       
    $("#helptelefone").mouseenter(function(){
        $("#telefone").show();   
    });
    $("#helptelefone").mouseleave(function(){
        $("#telefone").hide();
    }); 
/*
    $("#testetel2").hide();       
    $("#helptel2").mouseenter(function(){
        $("#testetel2").show();   
    });
    $("#helptel2").mouseleave(function(){
        $("#testetel2").hide();
    }); 
*/



   jQuery("#send_ticket").click(function(){     
      
      if(jQuery(this).is(":checked")){
      
        alert('testes');
      
      }     

      
    });


       $("#submit").click(function(){

        //if ($("#form1").valid()) {

        
            $.post("function_update.php", $("#form1").serialize(), function(data) {
                $("#idupdate").html(data);
      		alert('You are going to receive an email of Registration Confirmation.');
       
              location.reload()
            }); 

            


              if ($("input[type='checkbox'][name='send_ticket']").is(':checked') ){
                    $.post("creationofticket.php", $("#form1").serialize(), function(data) {
                    $("#dataupdate").html(data);
                    //alert('You are going to receive an email of Registration Confirmation.');                 
                  });
                     alert('was sent an email for HelpDesk of LIneA.');                    
                     return false; 
                     // para submit habilite esta linha
              }


              if ($("input[type='checkbox'][name='send_user']").is(':checked') ){
                    $.post("notification.php", $("#form1").serialize(), function(data) {
                    $("#datanotification").html(data);
                    //alert('You are going to receive an email of Registration Confirmation.');                 
                  });
                     alert('was sent an email for the user.');                    
                     return false; 
                     // para submit habilite esta linha
              }



                
      });

            

  
 




});
 