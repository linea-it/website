

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
    
      <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
        <script src="../js/jquery.1.11.0.js"></script>

    
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
               <div class="container-fluid">
               <div class="form-group" >
                  <label for="searchBar" style="font-family: sans-serif;margin-bottom:50px;margin-top:30px;">Please, select your nationality:</label>
               </div>
            
               <div class="position" >
                 
                 
                  <button id="brasileiro" class="btn  btn-lg" name="nationality" value="Brasileiro" data-toggle="modal" data-target=".bs-example-modal-lg"  style="display:inline;position:fixed;" >Brazilian</button> 

                
                  <button id="estrangeiro" type="submit" class="btn btn-lg"   name="nationality"  value="Estrangeiro" data-toggle="modal" data-target=".bs-example-modal-lg"  style="display:inline;position:fixed;margin-left:190px;"  >Foreign</button>
                  
             
                  <button id="estrangeiroresidente" type="submit"   name="nationality" class="btn btn-lg" value="Estrangeiro Resident" data-toggle="modal" data-target=".bs-example-modal-lg" style="display:inline;position:fixed;margin-left:390px;" >Foreign Resident</button>
                 
                
               </div>
                <div id="nacionalidadebr">Brasileiro</div>
                  <div id="nacionalidadees">Estrangeiro</div>
                  <div id="nacionalidaderb">Residente no Brasil</div>
            
               <br>
               
               

              
               <div   style="margin: 60px 30px 10px 0px;text-align:right;"> <a href="mailto:helpdesk@linea.gov.br"><span style="color:#000;" class="glyphicon glyphicon-envelope"></span></a>
                  
               </div>
               <p style="margin-top:-10px;text-align:right;">Help Desk</p>
               
               <div class="origin"></div>

               <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                   <div class="modal-content">
                     <br>  
                        <div class="receberegisterbr"></div>
                        <div class="receberegisterus"></div>
                    

               <div class="modal-footer">

                  <!--button type="button" id="cancel" name="cancel" class="btn btn-inverse" data-dismiss="modal">Close</button-->
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

