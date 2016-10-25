



$(document).ready(function(){

//controle de paginas

  $("button#brasileiro" ).on( "click", function() {

      $.ajax({

      url:"registerbr.php",

        success:function(data){
    
          $('.receberegisterbr').html(data);
          $(".receberegisterbr").css("display", "block");
          $(".receberegisterus").css("display", "none");
        
          

        
        }     
      });
    });


  $("button#cancel").on( "click", function() {

         location.reload();



  });



  $("button#estrangeiro" ).on( "click", function() {

      $.ajax({

      url:"registerus.php",

        success:function(data){
    
        $('.receberegisterus').html(data);
              $(".receberegisterus").css("display", "block");
             $(".receberegisterbr").css("display", "none"); 
        $('#estrangeiro_residente').hide();

         var $x = $("#nacionalidade");
    
        $x.append("<input type='hidden'  name='nationality' value='Foreign'> ") ;
                                
                                       
                                     
          

        
        }     
      });
    });


  $("button#estrangeiroresidente" ).on( "click", function() {

      $.ajax({

      url:"registerus.php",

        success:function(data){
    
        $('.receberegisterus').html(data);
              $(".receberegisterus").css("display", "block");
             $(".receberegisterbr").css("display", "none"); 
        $('#estrangeiros').hide();


         var $x = $("#nacionalidade");
    
          $x.append("<input type='hidden'  name='nationality' value='Foreign Resident'> ") ;
          

        
        }     
      });
    });



  /*$("button#estrangeiro, button#estrangeiroresidente" ).on( "click", function() {


      $.ajax({
      url:"registerus.php",
        success:function(data){
    
            $('.receberegisterus').html(data);
              $(".receberegisterus").css("display", "block");
             $(".receberegisterbr").css("display", "none"); 
        }  
      });
  });*/  







//mascara-formatação dos campos//


    $(function() {
       $('#cpf').mask('999.999.999-99');
        //$('#identity').mask('99.999.999-9');
        $('#datebirth').mask('99/99/9999');
        $('#telephone').mask('999 9999-9999');
        $('#celphone').mask('999 99999-9999');
        $('#inativo').mask('99/99/9999');
     });


//nationality//  

      
      $("#brasileiro").click(function(){
      $("#br").show();
      $("#passaporte").hide();
      $("#estrangeiro_residente").hide();

     });
     

     
      $("#estrangeiro" ).click(function() {
        $("#estrangeiros").show();

        
        //$(".input_estrangeiros").attr("value","Foreign");
       

       //   $("#input_estrangeiros").removeAttr("value");
        //  $("#input_estrangeiros").attr("value","Foreign");
        


         //$("#input_estrangeiro").attr("value","Foreign");
      
     });






      $("#estrangeiroresidente").click(function(){
                $("#estrangeiro_residente").show();
              //  $(".input_estrangeiros").attr("value","Foreign Resident");
                 //$("#input_estrangeiror").attr("value","Foreign Resident");
                     // $("#input_estrangeiros").removeAttr("value");
                   // $("#input_estrangeiros").attr("value","Foreign Resident");
        
                
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

    $("select[name='position']").click(function(){
      if($(this).val() == 'Graduando' ){
  
    $("#responsible").show(); 
    }
    else if($(this).val() == 'Mestrando'){
         $("#responsible").show(); 

    } 
    else if($(this).val() == 'Pos-Doutorando'){
         $("#responsible").show(); 
    }
    
      else{$("#responsible").hide();}    
    });




    
    $("#nacionalidadebr").hide();       
    $("#brasileiro").mouseenter(function(){
        $("#nacionalidadebr").show();   
    });
    $("#brasileiro").mouseleave(function(){
        $("#nacionalidadebr").hide();
    }); 

    $("#nacionalidadees").hide();       
    $("#estrangeiro").mouseenter(function(){
        $("#nacionalidadees").show();   
    });
    $("#estrangeiro").mouseleave(function(){
        $("#nacionalidadees").hide();
    }); 

    $("#nacionalidaderb").hide();       
    $("#estrangeiroresidente").mouseenter(function(){
        $("#nacionalidaderb").show();   
    });
    $("#estrangeiroresidente").mouseleave(function(){
        $("#nacionalidaderb").hide();
    }); 



 
//decrição dos checkbos do accordion

  $("#testetel").hide();       
    $("#helptel").mouseenter(function(){
        $("#testetel").show();   
    });
    $("#helptel").mouseleave(function(){
        $("#testetel").hide();
    }); 


    $("#testetel2").hide();       
    $("#helptel2").mouseenter(function(){
        $("#testetel2").show();   
    });
    $("#helptel2").mouseleave(function(){
        $("#testetel2").hide();
    }); 
/*

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

*/
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


/*

 $("#brasileiro").click(function(){
   var nome  = $("#brazillian").val();
    $.post("../function_insert.php",(name:brazillian),function(origin){
      $(".origin").html(origin)

   });


 });
    
  */
                /*

                          function function_brasileiro() {
                         var x = document.getElementById("brasileiro").value;
                         
                         if (x !=''){
                          document.getElementById("teste").value = x;
                          alert('teste ok');
                            }
                       

                     }

                     function function_estrangeiro() {
                         var y = document.getElementById("estrangeiro").value;
                         if (y !=''){
                         document.getElementById("teste").value = y;
                      }

                     }

                     function function_estrangeirores() {
                      var z = document.getElementById("estrangeiroresidente").value;
                      if (z !=''){                         
                               document.getElementById("teste").value = z;
                    }
                    }   
                              */
         


                

   

     
 $("#submit").click(function(){

  if ($("#form1").valid()) {

  
      $.post("../function_insert.php", $("#form1").serialize(), function(data) {
          $("#idcadastro").html(data);
		alert('You are going to receive an email of Registration Confirmation.');
 
      });
      $.post("../mensagem.php", $("#form1").serialize(), function(data) {
         $("#datamensagem").html(data);
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
