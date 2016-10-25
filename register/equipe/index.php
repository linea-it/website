

<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Participantes do LIneA</title>
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
               <h3>Participantes do LIneA</h3>
            </div>
              <div class="container-fluid">
                
                  <div class="form-group" >
                      <style>
                           
                       
                        table {
                            width: 1000px;
                            font-size: 13px;
                            border-radius: 25px;
                            margin-left:45px;
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
                         .th:nth-child(2)
                          { width:45%;
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
                        
                        <table cellspacing='0' class="zebra">
                        <thead>
                            <!--tr><th class="th" style='padding-left:2px;margin-right:-10px;background-color:#000000;text-align:left;' colspan='1' >id</th-->
                            <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Membros</th>
                          <th  class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Posição</th>
                        <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Instituição</th>
                        <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Status</th>
                      </tr>
                        </thead>
                        <tbody class='tbody' style='background-color:#FAFAFA;' >

                          <?php

                          $db = mysql_select_db("test");
                            $consult = ("SELECT * from users as u left JOIN status_users as s on u.id=s.fk_users_id where s.status='Ativo' ORDER BY name;");               
                  $insert_select = mysql_query($consult);

                  
                            $cont=1;
                            while($array = mysql_fetch_array($insert_select)){
                          	
                              




                                //mostra na tela o nome e a data de nascimento
                                $nome = $array['name'];


                                //echo 'SELECT:'.$nome."<br />";
                               
                                $position = $array['position'];
                                //echo 'SELECT:'.$array['position']."<br />";
                               

                                $institution = $array['instituition'];  
                                //echo 'SELECT:'.$array['instituition']."<br />";
                                $nationality= $array['nationality'];  

                                $id= $array['ID'];
                                $status= $array['status'];

                                


                                echo '<tr>';
                                //echo '<td>'.$cont++.'</td>';
                                echo '<td>'.$nome.'</td>';
                                echo '<td>'.$position.'</td>';
                                echo '<td>'.$institution.'</td>';
                                echo '<td>'.$status.'</td>';
                                echo '</tr>';
                          }
                              echo mysql_error();

                          ?>                
                  </tbody></table>
                  </div>
                  <br /><br />


                  <div class="form-group" >
                  <table cellspacing='0' class="zebra">
                        <thead>
                            <tr><th class="th" style='padding-left:2px;margin-right:-10px;background-color:#000000;text-align:left;' colspan='1' >id</th>
                            <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Ex-membros</th>
                          <th  class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Posição</th>
                        <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Instituição</th>
                        <th class="th" style='padding-left:2px;background-color:#000000;text-align:left;' colspan='1' >Status</th>
                      </tr>
                        </thead>
                        <tbody class='tbody' style='background-color:#FAFAFA;' >

                          <?php

                          $db = mysql_select_db("test");
                            $consult = ("SELECT * from users as u left JOIN status_users as s on u.id=s.fk_users_id where s.status='Inativo' ORDER BY name;");               
                  $insert_select = mysql_query($consult);

                  
                            $cont=1;
                            while($array = mysql_fetch_array($insert_select)){
                            
                              




                                //mostra na tela o nome e a data de nascimento
                                $nome = $array['name'];


                                //echo 'SELECT:'.$nome."<br />";
                               
                                $position = $array['position'];
                                //echo 'SELECT:'.$array['position']."<br />";
                               

                                $institution = $array['instituition'];  
                                //echo 'SELECT:'.$array['instituition']."<br />";
                                $nationality= $array['nationality'];  

                                $id= $array['ID'];
                                $status= $array['status'];

                                


                                echo '<tr>';
                                echo '<td>'.$cont++.'</td>';
                                echo '<td>'.$nome.'</td>';
                                echo '<td>'.$position.'</td>';
                                echo '<td>'.$institution.'</td>';
                                echo '<td>'.$status.'</td>';
                                echo '</tr>';
                          }
                              echo mysql_error();

                          ?>                
                  </tbody></table>
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

