
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


//data de saida
/*
      $("#inactive").click(function(){
          $("#desligado").show();
      })
      $("#active").click(function(){
      $("#desligado").hide();

     });


*/







// validade fields//

    
    $("#form1").validate({      
        // Define as regras
        

        rules:{
            name:{
                // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                required: true, minlength: 2
            },
           // datebirth:{
             //   required: true, minlength:8
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
                required: "Enter your name",
                minLength: "Your name must contain at least 2 characters"

            },
            

		//datebirth:{
              //  required:"Enter your date of birth",
                //minlength:"The date of birth must contain 8 characters"
            //},
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
              required:"Enter your email for contact",
              minlength:"This field must contain 2 characters"
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
      $.post("mensagem.php", $("#form1").serialize(), function(data) {
         $("#idcadastro").html(data);
               //alert('You are going to receive an email of Registration Confirmation.');
      

	});
      $('#form1').each (function(){
  	this.reset();});


  }else{
	alert('You should input information in fields  mandatory!');
            return false;
	}
	


    
  });
 

    


});

