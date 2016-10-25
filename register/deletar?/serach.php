

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Search of user</title>
      <!-- Bootstrap -->
      <!--link href="css/bootstrap.min.css" rel="stylesheet"-->
      <link href="../css/bootstrap.css" rel="stylesheet">
  
      <link href="../css/search.css" rel="stylesheet">
      
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script-->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <!--script type="text/javascript" src="jquery-ui-1.8.13.slider.min.js"></script-->
   </head>
   <body style="background-color: #bbbbbb; background-image: linear-gradient(to bottom, #000000, #bbbbbb 73%);  overflow-x:hidden;">
      <!--nav class="navbar navbar-inverse container-fluid " style="background-color: #bbb bbb; background-image: linear-gradient(to bottom, #FFFFFF, #F2F2F2); width:1199px; margin-top:-100px; position:absolute; left:75px; border-color:#f1f1f1;" >
         <div class="container-fluid">
            
            <div class="navbar-header" style="margin-top:0px;">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">         
               </button>
            </div>
         
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
         <a href="http://www.linea.gov.br" target="_blank" Style="font-size:23px;color:#777777;margin-left:900px;">LIneA</a>
               
            </div>
          </div>
         
         </nav-->
      <!--/center>
         </div-->
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
         <div class="container">
            <!--a href="registration.php?lang=pt_BR" id="br-flag" class="br-flag" ></a>
               <a href="registration.php?lang=en_US" id="us-flag" class="us-flag-deselected" ></a-->
            <a href="http://www.linea.gov.br" style="font-size:23px;color:#777777;float: right;">LIneA</a>
         </div>
      </nav>
    <div class="container" style="margin-top: 100px;">
        <div class="panel panel-default">
            <div class="page-header">
                 <h3>Search User</h3>
            </div>

      
        
            <div class="container-fluid">
               <form class="form-horizontal" role="form" id="formsearch" action="" name="formsearch" method="post" style="margin-left:-70px;">
                <br><br>
                      <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Name:</label>
                           <div class="input-group" style="display:inline;">
                                    <input type="text" class="form-control" name="name" placeholder=""  style="margin-left:50px;width:500px;display:inline;"/>
                                    <span class="input-group-btn" style="display:inline;">
                                        <button type="submit"  id="submit" name="enviar" class="btn btn-success" value="enviar">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>                                                   
                                
                 
                                </div>                      
                                
                            </div>                      
                     
                    

                        
               </form>
               <label style="margin-left:80px;"><?php require_once("search_result.php");?></label>
               
            <div   style="text-align:right;margin-top:50px;">For other information contact the <a href="http://www.linea.gov.br/contato/" target="_blank">Help desk</a> of LIneA
                        </div>
        

           
            </div>
            
        </div>
  </div>
      <div id="idcadastro"></div>
      <div id="datamensagem"></div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/busca.js"></script>
      <!--script src="../js/validate.js"></script-->
      <script src="../js/maskedinput.js"></script>
      <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
   </body>
</html>



