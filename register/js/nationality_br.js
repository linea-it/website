
$(document).ready(function(){

//mascara-formatação dos campos//


    $(function() {
       $('#cpf').mask('999.999.999-99');
        //$('#identity').mask('99.999.999-9');
        $('#datebirth').mask('99/99/9999');
        //$('#contacttelephone').mask('(999) 9999-9999');
       // $('#cellphone').mask('(999) 99999-9999');
        $('#inativo').mask('99/99/9999');
     });


//nationality//

  

      
      $("#brasileiro").click(function(){
      $("#br").show();
      $("#passaporte").hide();
      $("#estrangeiro_residente").hide();

     });
     

   
     $("#estrangeiro").click(function(){
      $("#br").hide();
      $("#estrangeiro_residente").hide();
      $("#passaporte").show();
   
     });

     $("#estrangeiroresidente").click(function(){
      $("#br").hide();
      $("#passaporte").hide();
     $("#estrangeiro_residente").show();
   
     });


    

//email linea//
    $("#yes").click(function(){
    $("#sim").show();
      

     });

     $("#no").click(function(){
        $("#sim").hide();
          
   
     }); 

    $("#responsible").hide('fast');


//campo responsible

    $(" select[name='position']").click(function(){
      if($(this).val() == 'Posdoc'){
  
    $("#responsible").show(); 
    }
      else{$("#responsible").hide();}    
    });



 
//decrição dos checkbos do accordion

    $("#teste1").hide();       
    $("#help1").mouseenter(function(){
        $("#teste1").show();   
    });
    $("#help1").mouseleave(function(){
        $("#teste1").hide();
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





    $("#access1").hide();       
    $("#help_access1").mouseenter(function(){
        $("#access1").show();   
    });
    $("#help_access1").mouseleave(function(){
        $("#access1").hide();
    });
    
    $("#access2").hide();       
    $("#help_access2").mouseenter(function(){
        $("#access2").show();   
    });
    $("#help_access2").mouseleave(function(){
        $("#access2").hide();
    });

    $("#access3").hide();       
    $("#help_access3").mouseenter(function(){
        $("#access3").show();   
    });
    $("#help_access3").mouseleave(function(){
        $("#access3").hide();
    });

    $("#access4").hide();       
    $("#help_access4").mouseenter(function(){
        $("#access4").show();   
    });
    $("#help_access4").mouseleave(function(){
        $("#access4").hide();
    });

    $("#access9").hide();       
    $("#help_access9").mouseenter(function(){
        $("#access9").show();   
    });
    $("#help_access9").mouseleave(function(){
        $("#access9").hide();
    });


//data de saida

      $("#inactive").click(function(){
          $("#desligado").show();
      })
      $("#active").click(function(){
      $("#desligado").hide();

     });










// validade fields//

    
    $("#form1").validate({      
        // Define as regras
        

        rules:{
            name:{
                // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                required: true, minlength: 2
            },
           // datebirth:{
           //     required: true, minlength:8
            //},
            //nationality:{
                //required: true
           // },
           // street:{
             // required: true, minlenght: 2
            //},
            

            /*contacttelephone:{
              required: true, minlength: 11
            },
            cellphone:{
              required: true, minlength: 11
            },*/
            intitution:{
              required:true, minlength: 2
            },
            //responsible:{
             // required: true, minlength: 2
            //},
            //position:{
           //   required:true
           // },
            //emaillinea:{
              //required:true
            //},
            //emaildolinea:{
              //required:true, minlength:2
            //},
            //alternativegemail:{
              //required:true, minlength:2
           // },
            otheremail:{
              required:true, minlength:2
            },
            

            /*project:{
              required:true
            },*/
            functions:{
              required:true
            },
            //objetives:{
              //required:true
           // }
            

            
        },





        // Define as mensagens de erro para cada regra
        messages:{
            name:{
                required: "Digite seu nome",
                minLength: "Esse campo deve conter mais de 2 caracteres."

            },
            

    //datebirth:{
      //        required:"Digite sua data de nascimento.",
        //        minlength:"Data de nascimento deve conter  8 characters"
          //  },
        // highlight: function(nationality) {
         //   $(nationality).addClass('error'); 
    //}   

  //street:{
              //required:"Enter your address",
              //minLength:"This field must contain 2 characters"
            //},
            

            /*contacttelephone:{
              required:"Enter your telephone number",
              minlength:"This field must contain 11  numbers"

            },
            cellphone:{
              required:"Enter your cellphone number",
              minlength:"this field must contain 11 numbers"

            },*/
            intitution:{
              required:"Enter your Institution",
              minlength:"This field must contain 11 numbers"
            },
  
            //responsible:{
              //required:"Enter the name your responsible",
              //minlength:"This field must contain 2 characters"
            //},
           // position:{
          //    required:"Choice a option."
              
          //  },
            //emaillinea:{
              //  required:"Write your email ",
                //minlength:"This field must contain 2 characters"
            //},
           //alternativegemail:{
              //required:"Enter your email for contact",
              //minlength:"This field must contain 2 characters"
            //},
            otheremail:{
              required:"Digite um email para contato",
              minlength:"esse campo deve conter mais de 2 caracteres."
            },
            project:{
              required:"Choice a option."
              
            },
            //objetives:{
              //required:"Enter a information."
            //}
            
         }
      
       
   

 });

    //marcadores de campos obrigatorios:


  //$("#form1").submit(function() {
  //
  //
          //if ($("#nationality").val() == ""){
   //if ($('input:radio[name="nationality"]:checked').val() === ""){

           //$("#nationality").css("border","1px solid red").focus();
          //alert('FUNCIONOU');
    //return false;
         //}           
    //});
  

/* 

   $("#form1").submit(function() {
       if ($("#name").val() == "") {
           $("#name").css("border","1px solid red").focus();
           return false;
       }           
    });*/

    //$("#form1").submit(function() {
       //if ($("#passaport").val() == "") {
        //   $("#passaport").css("border","1px solid red").focus();
        //   return false;
       //}           
    //});

     /*$("#form1").submit(function() {
       if ($("#contacttelephone").val() == "") {
           $("#contacttelephone").css("border","1px solid red").focus();
           return false;
       }           
    });

      $("#form1").submit(function() {
       if ($("#cellphone").val() == "") {
           $("#cellphone").css("border","1px solid red").focus();
           return false;
       }           
    });*/
  /*
       $("#form1").submit(function() {
       if ($("#intitution").val() == "") {
           $("#intitution").css("border","1px solid red").focus();
           return false;
       }           
    });*/




//confirmando validação dos campos para envio do email 
     
 $("#submit").click(function(){

  if ($("#form1").valid()) {

  
      $.post("function_insert.php", $("#form1").serialize(), function(data) {
          $("#idcadastro").html(data);
    alert('You are going to receive an email of Registration Confirmation.');
 
      });
      $.post("mensagem_br.php", $("#form1").serialize(), function(data) {
         $("#datamensagem").html(data);
               //alert('You are going to receive an email of Registration Confirmation.');
      

  });
      $('#form1').each (function(){
    this.reset();});


  }else{
  alert('You should input information in fields  mandatory!');
            return false;
  }
  
//tesntando

    
  });
 

    


});

