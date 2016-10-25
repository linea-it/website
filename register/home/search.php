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
      <link href="../css/form.css">
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
   <body style="background-color: #bbbbbb; background-image: linear-gradient(to bottom, #000000, #bbbbbb 20%);  overflow-x:hidden;">
      
     <nav class="navbar navbar-inverse container-fluid " style="background-color: #bbbbbb; background-image: linear-gradient(to bottom, #FFFFFF, #F2F2F2); width:1199px; margin-top:-100px; position:absolute; left:75px; border-color:#f1f1f1;" >
         <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="margin-top:0px;">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">         
               </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <!--form class="navbar-form navbar-left" role="search" style="margin-left:10px;">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button></form-->
                <a href="http://webdev.linea.gov.br/bootstrap/registerbr.php"><img src="br.png"></a>&nbsp&nbsp
      <a href="http://webdev.linea.gov.br/bootstrap/register.php" targe="_blanck"><img src="br2.png"></a>
      <a href="http://www.linea.gov.br" target="_blank" Style="font-size:23px;color:#777777;margin-left:900px;">LIneA</a>
               <!--/form-->
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      <div class="container theme-showcase" role="main">
      <!-- Carousel================================================== -->
      <div class="jumbotron" style=" margin-top:100px;  background-color: #ffffff;border-radius:15px;border:2px solid #000000;box-shadow:  1px 1px 15px 1px  #000000">
         <!--INICIO DE FORMULARIO-->
         <!--?php include 'function_insert.php'; ?-->
	
            <!-- testandoForm Name -->
            <legend style="background-color:#000000;border-radius:5px;margin-top:-50px;width:1140px;margin-left:-62px;color:#ffffff"><b>Search of User</b></legend></fieldset>

      <form class="form-horizontal" role="form" id="formsearch" action="" name="formsearch" method="post" style="margin-left:-65px;">
 				
		 <!-- Text input-->
              
                  <div class="control-group" >                 

                    
                            <div class="form-group">
                                <label for="searchBar" style="text-align:left; margin-left:-550px;">Name:</label>
                                <div class="input-group" style="display:inline;">
                                    <input type="text" class="form-control" name="name" placeholder=""  style="margin-left:120px;width:500px;display:inline;"/>
                                    <span class="input-group-btn" style="display:inline;margin-left:500px;">
                                      <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
                                        <!--button type="submit"  id="submit" name="enviar" class="btn btn-success" value="enviar"-->
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        
		                </div>
      </form>
                     <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <?php require_once("../search_result.php");?>
                  </div>
              </div>
          </div>

          </div>
<?php
	//require_once("conexao.php");
	//colocar no action =<?php echo $_SERVER['PHP_SELF']; ?
    /*if( $_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $name= $_POST["name"];
	echo'echo:'. $name;

	
	}

	if(isset($_POST['name'])){
		include("conexao.php");
       	 	$query = ("SELECT * from users where name =".$name) or die(mysql_error());
        	$query_result = mysql_query($query);
		
        	while($array = mysql_fetch_array($query_result)){
                	echo 'banco:';$array['name'];}
	}*/

require_once("search_result.php");
?>




                                         
                                       
                              
                          
                  
                  



                  <br />

             



                  
     
			<div id="idcadastro"></div>
			<div id="datamensagem"></div>


   
     
     
     

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/busca.js"></script>
      <script src="../js/validate.js"></script>
      <script src="../js/maskedinput.js"></script>
      <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
      

   </body>
</html>

