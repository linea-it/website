

<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>User Registrarion</title>
      <!-- Bootstrap -->
      <!--link href="css/bootstrap.min.css" rel="stylesheet"-->
      <link href="../css/bootstrap.css" rel="stylesheet">
     
      <link href="../css/home.css" rel="stylesheet">
    
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
   </head>
   <body style="background-color: #bbbbbb; background-image: linear-gradient(to bottom, #000000, #bbbbbb 73%);  overflow-x:hidden;">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
         <div class="container">
          
            <a href="http://www.linea.gov.br" style="font-size:23px;color:#777777;float: right;">LIneA</a>
         </div>
      </nav>

    
      <!-- Carousel================================================== -->
      <div class="container" style="margin-top: 100px;">
         <div class="panel panel-default">
            <div class="page-header">
               <h3>User Resgistration</h3>
            </div>
            <div class="container-fluid">
               <div class="form-group" >
                  <label for="searchBar" style="font-family: sans-serif;margin-bottom:50px;margin-top:30px;">Please, select your nationality:</label>
               </div>
             
               <div class="position" >
                 
                 <input type="hidden" name="brazillian" id="brazillian" value="Brazillian" >
                  <button id="brasileiro" class="btn btn-lg" name="nationality" value="Brasileiro" data-toggle="modal" data-target=".bs-example-modal-lg"  style="display:inline;margin-left:200px;" onclick="function_brasileiro()" >Brazillian</button> 

                  <input type="hidden" name="foreign" id="foreign" value="Foreign" >
                  <button id="estrangeiro" type="submit" class="btn btn-lg"   name="nationality"  value="Estrangeiro" data-toggle="modal" data-target=".bs-example-modal-lg"  style="display:inline;margin-left:60px;" onclick="function_estrangeiro() " >Foreign</button>
                  
                  <input type="hidden" name="foreign_resident" id="foreign_resident" value="Foreign Resident" >
                  <button id="estrangeiroresidente" type="submit"   name="nationality" class="btn btn-lg" value="Estrangeiro Resident" data-toggle="modal" data-target=".bs-example-modal-lg" style="display:inline;margin-left:60px;" onclick="function_estrangeirores()" >Foreign Resident</button>
                
               </div>
               <br>
               <div id="nacionalidadebr"  >Brasileiro</div>
               <div id="nacionalidadees" >Estrangeiro</div>
               <div id="nacionalidaderb" >Reside no Brasil</div>

              
               <div   style="margin-bottom:10px;text-align:right;margin-top:60px;">For other information contact the <a href="http://www.linea.gov.br/contato/" target="_blank">Help desk</a> of LIneA
               </div>
               
<div class="origin"></div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <br>
      
     


         <form class="form-horizontal" id="form1" action="" name="form1" method="post" style="margin-left:-65px;">
         
            <style>
               .control-label{
               display: inline-block;
               width:200px;
               margin-right:10px;
               font-family: Arial;
               font-size: 14px;
               }
               .panel{
               margin-bottom:2px;
               }
               .input{
               display:inline-block;
               margin-right: 15px;
               margin-bottom:20px;
               }
               .position{display:inline;}
               .checkbox{
               margin-left:10px;
               margin-bottom:500px;    
               }
               #linha{
               padding-top:  10px;

               /*padding-right:  1px;*/
               padding-left: 16px;
               padding-bottom:  8px;
               border-width: 1px;
               border-style: solid;
               border-color: #f2f2f2;
               
               border-bottom-width: 2px;
               border-top-width: 2px;
               border-right-width: 2px;
               border-left-width: 2px;
               width:600px;
               
               margin-left:133px;
               

               
               }
            </style>
            <div>
               <!-- Text input-->
               
       


               <div>
                  
                  <div class="control-group">
        
                     
                      <input id="teste" value="" type="hidden" name ="nationality" placeholder="" class="form-control" type="text" style="width:340px;display:inline;">
                  
                     <label class="control-label" style="text-align:right;">Name (Complete):</label>
                     <div class="input" >
                        <!--input id="name" name="name" placeholder="Name" class="input-xlarge" type="text" style="display:inline;"-->
                       <input id="name" name="name"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;">
                       
                   
                       
                     </div>
             
                  </div>
                 

               


                  
                  <!-- Text input-->
                  <!--div class="control-group">
                     <label class="control-label" style="text-align:left;">Last Name:</label>
                     <div class="input">
                        <input id="lname" name="lname" placeholder="Last name" class="input-xlarge" type="text">
                     </div>
                  </div-->
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Date of birth:</label>

                     <div class="input">
                        
                        <!--input id="datebirth" name="datebirth" placeholder="Date of birth" class="input-xlarge" type="text"><span class="input-group-addon">.00</span-->
                     
                        <input id="datebirth" name="datebirth"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;"><span class="input-group-addon" style="display:inline;">dd/mm/yyyy</span>
                   
                    
                   
                     </div>

                  </div>
                 
                  <!--div class="control-group" >
                     <label class="control-label" style="text-align:right;">Nationality:</label>

                     <div id="brasileiro" class="input"  style="margin-bottom:-10px;display:inline-block;">
                        <label class="radio" >
                        <input name="nationality" id="nationality0" value="Brazillian"  type="radio" style="display:inline;">Brazillian</label>
                     </div>

                     <div id="estrangeiro" class="input" style="type:display:inline-block;margin-left:20px;margin-bottom:10px;">
                        <label class="radio" >
                        <input name="nationality" id="nationality1" value="Foreign" type="radio" style="display:inline;">Foreign</label>
                     </div>

                     <div id="estrangeiroresidente" class="input" style="type:display:inline-block;margin-left:20px;margin-bottom:10px;">
                        <label class="radio" >
                        <input name="nationality" id="nationality2" value="Foreign Resident" type="radio" style="display:inline;">Resident Foreign</label>
                     </div>
                  </div-->


                     <div id="br" style="display:none;margin-bottom:15px;display:none;margin-left:140px;" >
           
                        <!--div id="linha" -->
                           <label class="control-label" style="display:inline-block;">CPF:</label>
                           <input class="form-control" name="cpf" placeholder="" id="cpf"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-140px;margin-bottom:5px;"><br />
                           <label class="control-label" id="identify" style="display:inline-block;">Identity:</label>
                           <input class="form-control" name="identity" placeholder="" id="identity" checked="checked" type="label" style="display:inline;width:300px;margin-left:-140px;margin-bottom:5px;"><br />
                           <label class="control-label"  >Issued by:</label>
                           <input class="form-control" name="organofconsultation" placeholder="" id="organofconsultation" checked="checked" type="label" style="display:inline;width:300px;width:60px;margin-left:-140px;margin-bottom:5px;">
                           <label class="control-label" id="uf" style="margin-left:20px;margin-bottom:10px;">UF:</label>
                           <input class="form-control" name="uf" placeholder="" id="uf" checked="checked" type="label" style="display:inline;width:70px;display:inline;margin-left:-187px;margin-bottom:5px;">
                        <!--/div-->

                  
                     </div>

                     
                     
                     <div id="estrangeiros" style="display:none;margin-bottom:10px;display:none;margin-left:130px;" >
                        <!--div id="linha"-->
                         
                           <label class="control-label" style="display:inline-block;">Passaport:</label>
                           <input class="form-control" name="passaport" placeholder="" id="passaport"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;" >
                        <!--/div-->
                     </div>

                       <div id="estrangeiro_residente" style="display:none;margin-bottom:10px;display:none;margin-left:130px;" >
                        <!--div id="linha"-->
                           <label class="control-label" style="display:inline-block;">Passaport:</label>
                           <input class="form-control" name="passaportr" placeholder="" id="passaportr"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;margin-bottom:5px;" ><br />
                           <label class="control-label" style="display:inline-block;">CPF:</label>
                           <input class="form-control" name="cpfr" placeholder="" id="cpfr"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;margin-bottom:5px;" >

                        <!--/div-->
                     </div>

                    
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Address:</label><br>
                     <div class="input"  style="margin:left;">
                  <div id="linha">
                        <!--input id="address" name="address" placeholder="Address" class="input-xlarge" type="text"-->
                           <label class="control-label" name="address"  style="text-align:right;margin-right:-18px;display:inline;">Street:</label>
                           <input id="street" name="street"  placeholder=" " class="form-control" type="text" style="width:360px;display:inline;margin-bottom:5px;margin-left:34px;"><br />
                           <label class="control-label" name="address"  style="text-align:right;margin-right:-18px;display:inline;margin-bottom:5px;">City:</label>        
                           <input id="city" name="city"  placeholder="" class="form-control" type="text" style="width:260px;margin-bottom:5px;display:inline;margin-left:46px;"><br />
                           <label class="control-label" name="address"  style="text-align:right;display:inline;margin-right:-15px;margin-bottom:5px;">Zip Code:</label>    
                           <input id="zipcode" name="zipcode"  placeholder="" class="form-control" type="text" style="width:260px;margin-left:10px;margin-bottom:5px;display:inline;"><br />
                           <label class="control-label" name="address"  style="text-align:right;display:inline;margin-right:-15px;margin-bottom:5px;">State:</label>    
                           <input id="state" name="state"  placeholder="" class="form-control" type="text" style="width:260px;margin-bottom:5px;display:inline;margin-left:35px;"><br/>
                           <label class="control-label" name="address"  style="text-align:right;display:inline;margin-right:-18px;margin-bottom:5px;">Country:</label>        
                           <input id="country" name="country"  placeholder="" class="form-control" type="text" style="width:340px;margin-bottom:5px;display:inline;margin-left:18px;"><br />
                           
                  </div> 

                      
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Contact telephone:</label>
                     <div class="input">
                        <!--input id="contacttelephone" name="contacttelephone" placeholder="Contact telephone" class="input-xlarge" type="text"-->
                        <input id="contacttelephone" name="contacttelephone"  placeholder="ex:00 00 0000-0000" class="form-control" type="text" style="width:340px;display:inline;">
                        <div id="helptel" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                    <div class="quadrado" id="testetel" style="display:inline;margin-top:-30px;">+00(Code international of country)<br>00(Code of area)<br>0000-0000(Number of telephone) </div>
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Cell phone:</label>
                     <div class="input">
                        <!--input id="cellphone" name="cellphone" placeholder="Cell phone" class="input-xlarge" type="text"-->
                         <input id="cellphone" name="cellphone"  placeholder="ex:00 00 0000-0000" class="form-control" type="text" style="width:340px;display:inline;">
                         <div id="helptel2" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                    <div class="quadrado" id="testetel2" style="display:inline;margin-top:-30px;">+00(Code international of country)<br>00(Code of area)<br>0000-0000(Number of telephone) </div>
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Institution:</label>
                     <div class="input">
                        <!--input id="intitution" name="intitution" placeholder="Institution" class="input-xlarge" type="text"-->
                        <input id="institution" name="institution"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;">
                     </div>
                  </div>
                  <!-- Select Basic -->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Position:</label>
              
                     <div class="input">

                        <select id="position" name="position" class="form-control">
                           <option value="">...</option>
                           <option value="Administrative">Administrative</option>
                           <option value="InterN">Intern</option>
                           <option value="Undergraduate Student">Undergraduate Student</option>
                           <option value="MSc. Student">MSc. Student</option>
                           <option value="PhD. Student">PhD. Student</option>
                           <option value="Posdoc">Post-Doc</option>
                           <option value="IT">IT</option>
                           <option value="Scientist">Scientist</option>
                        </select>
                     </div>
                  </div>
                   <!-- Text input-->
                   <div id="responsible">
                      <div class="control-group">

                        <label class="control-label" style="text-align:right;">Supervisor:</label>
                     
                           <!--div class="input" >
                              <input id="nresponsible" name="responsible"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;">
                           </div-->
                        <div class="input" >
                  
                           <input id="responsible" name="responsible" placeholder="" class="form-control" style="width:340px;display:inline;margin-left:2px;" type="text">
                        </div>

                       
                     </div>
                     </div>



                  <!-- Appended Input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;margin-right:20px;font-size:14px;margin-left:80px;display:inline;">Wish to have an e-mail from Linea?</label>
                     
                     
                     <div id="yes" class="input" style="display:inline-block;">
                        <label class="radio"  >
                        <input type="radio"  name="emaillinea" id="yes" value="y" style="display:inline;" >Yes</label>  
                     </div>
                     <div id="no" class="input" style="display:inline-block;">
                              <label class="radio"  >
                              <input type="radio" name="emaillinea" id="no" value="n"  style="display:inline;" >No</label>
                         </div>
                        
                         <div id="sim" style="display:none;margin-left:215px;" >
                           <div class="control-group" >
                              <label class="radio" style="margin-left:-80px;">Login:</label>
                              <div class="input-group" style="margin-top:-20px;" >
                                 <div class="input">
                                  <input id="emaillinea" name="emaillinea"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;margin-top:-5px;"><span class="input-group-addon" style="display:inline;">@linea.gov.br</span>
                                  </div>

                           
                              </div>
                           </div>
                        
                           
                     </div>
                  </div>
                         
                  <!-- Text input-->
                  <div class="control-group" >
                     <label class="control-label" style="text-align:right;">Gmail:</label>
                     <div class="input" >
                        <!--input id="name" name="name" placeholder="Name" class="input-xlarge" type="text" style="display:inline;"-->
                       <input id="alternativegmail" name="alternativegmail"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;">

                     </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label" style="text-align:right;" >E-mail for contact:</label>
                     <div class="input" >
                        <input id="otheremail" name="otheremail" placeholder="" class="form-control" style="width:340px;display:inline;" type="text">
                     </div>                   
                     
                  </div>
           
           
                  
<!--div  class="input" style="margin-bottom:1px;margin-left:810px">For other information contact the <a href="http://www.linea.gov.br/contato/" target="_blank">Help desk</a> of LIneA
</div-->
     
      <div id="idcadastro"></div>
      <div id="datamensagem"></div>


   
      </form>
      </div>
      </div>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/nationality.js"></script>
      <script src="js/validate.js"></script>
      <script src="js/maskedinput.js"></script>
      <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>




<div class="modal-footer">
  <div class="control-group">
                     <label class="control-label" for="register"></label>
                     <div class="input" style="margin-left: -100px;margin-bottom:15px;">
                        <button id="submit" type="button" name="submit" class="btn btn-primary" value="submit" >Save changes</button>
                        <!--button id="cancel" name="cancel" class="btn btn-inverse">Cancel</button-->
                     <!--/div-->
                  <!--/div-->
        <button type="button" id="cancel" name="cancel" class="btn btn-inverse" data-dismiss="modal">Close</button>
        <!--button type="button" class="btn btn-primary">Save changes</button-->
      </div>
  </div>
</div>

      
       
        
     
       
      
      
    
  </div>

            </div>


         </div>

      </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../js/bootstrap.min.js"></script>
      <!--script src="../js/choose.js"></script-->
      <script src="../js/validate.js"></script>
      <script src="../js/maskedinput.js"></script>
      <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
      <script src="../js/nationality.js"></script>
      <script src="../js/validate.js"></script>
   </body>
</html>

