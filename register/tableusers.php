<?php
//include('function_insert.php');



?>




<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Colaboradores - LIneA</title>
      
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/form.css" rel="stylesheet">

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
   <body style="background-color:#f9f9f9;overflow-x:hidden;">
      
      <nav class="navbar navbar-inverse container-fluid " style="background-color: #FAFAFA; background-image: linear-gradient(to bottom, #FFFFFF, #F2F2F2); width:1199px; margin-top:-100px; position:absolute; left:75px; border-color:#f1f1f1;" >
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
               <a href="http://devel2.linea.gov.br/~ana.marcela/bootstrap/cadastro.html" Style="font-size:23px;color:#777777;margin-left:900px;">LIneA</a>
               <!--/form-->
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      <!--/center>
      </div-->
      <!-- Carousel================================================== -->
      <div class="jumbotron" style="width:1199px; margin-top:100px; margin-left:75px; background-color: #FAFAFA;border-radius:15px;border:2px solid #a1a1a1;">
         <!--INICIO DE FORMULARIO-->
         <!--?php include 'mensagem.php'; ?-->

            <!-- Form Name -->
            <legend style="background-color:#A3A3A3;border-radius:5px;margin-top:-50px;width:1199px;margin-left:-32px;">  Colaboradores</legend></fieldset>
      
         
            <style>
               
           
            table {
                width: 1000px;
                font-size: 13px;
                border-radius: 25px;
                margin-left:75px;
            }
            table thead th:first-child th:first-child {
                border-top-right-radius: 5px;
                border-top-left-radius: 5px;
                -moz-border-top-right-radius: 5px;
                -webkit-border-top-right-radius: 5px;
                 padding: 15px;
            }
            table td {
                padding: 5px 2px 0px;
                text-align: left;
            }

             table thead th {
                background-color: #555;
                text-align: left;
                color: #FFFFFF;
                padding:8px;
                font-family: sans-serif;
                font-size: 14px;

            }
            table tfoot {
                background-color: #555;


            }
            .tbody{
                 /*border-bottom-right-radius: 5px;
                border-bottom-left-radius: 5px;
                -moz-border-bottom-right-radius: 5px;
                -webkit-border-bottom-left-radius: 5px;*/
            }
            span {
                font-size: 13px;
                font-family: sans-serif;
                padding-top: 5px;
                padding:0px;
            }
            hr {
                background-color: #555;
                border: 2px;
                height: 1px;
            }
            td{
                font-size:15px;

            }
           
            .th{

                font-color:#ffffff;
                text-align: left;
            }
            .align{

                display:inline-block;
                text-align: left;
            }


            </style>
            
            <table cellspacing='0'>
            <thead>
                <tr><th class="th" style='padding-left:2px;margin-right:-10px;background-color:#000000;text-align:left;' colspan='1' >id</th>
                <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Nome</th>
              <th  class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Posição</th>
            <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Instituição</th>
            <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >CPF</th>
            <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Status</th>
          </tr>
            </thead>
            <tbody class='tbody' style='background-color:#FAFAFA;' >

              <?php

              $db = mysql_select_db("test");
                $consult = ("SELECT u.id, cpf_br, cpf_rf, position, nationality, instituition, status, name from users as u, doc_users as d, status_users as s where u.id = d.fk_users_id=s.fk_users_id ");               
		$insert_select = mysql_query($consult);

		
                
                while($array = mysql_fetch_array($insert_select)){
              
                    //mostra na tela o nome e a data de nascimento
                    $nome = $array['name'];


                    //echo 'SELECT:'.$nome."<br />";
                   
                    $position = $array['position'];
                    //echo 'SELECT:'.$array['position']."<br />";
                   

                    $institution = $array['instituition'];  
                    //echo 'SELECT:'.$array['instituition']."<br />";
                    $nationality= $array['nationality'];  

                    $id= $array['id'];
                    echo '<tr>';
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$nome.'</td>';
                    echo '<td>'.$position.'</td>';
                    echo '<td>'.$institution.'</td>';
                    echo '</tr>';

                  //mostra na tela o nome e a data de nascimento
                  /*$cpf_br = $array['cpf_br'];                 
                  $identify_br = $array['identify_br'];                            
                  $cpf_rf = $array['cpf_rf'];
                              
                $status_c = $array['status'];

                if ($nationality == 'Brazillian'){
                      echo'<td>'.$cpf_br.'</td>';  
                          
                  }
                  else if ($nationality == 'Foreign'){
                         echo'<td>---</td>'; 
                    


                  }
                  else if ($nationality == 'Foreign Residen'){
                        echo'<td>'.$cpf_rf.'</td>';
                                
                  }

                  $status_c = $array['status'];

                  echo '<td>'.$status_c.'</td>';
                  echo '</tr>';
              */
               }
                  
              
            
                  echo mysql_error();







              ?>
           
            
                
      </tbody>
      <tfoot>
                <tr>
                    <th style='margin-left-250px;background-color:#727272;' colspan='1' >
                        <!--span style='font-size:13px;color:#CCCCCC;'>Permission for execute this register:   <a href='http://webdev.linea.gov.br/bootstrap/creationofticket.php'><font color='#cccccc'>Okay</font></a>   <font color='#cccccc'>or</font>  <a href='http://webdev.linea.gov.br/bootstrap/confirmation_register.php' target='_blank' ><font color='#cccccc'>failing</font></a></span></th-->
                </tr>
                
               
            </tfoot>

      </table>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <!--script src="js/nationality.js"></script-->
      <script src="js/update.js"></script>
      <script src="js/validate.js"></script>
      <script src="js/maskedinput.js"></script>
      <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
      

   </body>
</html>
