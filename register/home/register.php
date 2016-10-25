<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Register of User</title>
      
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/form.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script-->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <!--script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script-->

   </head>
   <body style="background-color: #bbbbbb; background-image: linear-gradient(to bottom, #000000, #bbbbbb 20%);  overflow-x:hidden;">
      
      <!--nav class="navbar navbar-inverse container-fluid " style="background-color: #bbbbbb; background-image: linear-gradient(to bottom, #FFFFFF, #F2F2F2); width:1199px; margin-top:-100px; position:absolute; left:75px; border-color:#f1f1f1;" >
         <div class="container-fluid">
           
            <div class="navbar-header" style="margin-top:0px;">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">         
               </button>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           
                <a href="http://webdev.linea.gov.br/bootstrap/registerbr.php"><img src="br.png"></a>&nbsp&nbsp
      <a href="http://webdev.linea.gov.br/bootstrap/register.php" targe="_blanck"><img src="br2.png"></a>
      <a href="http://www.linea.gov.br" target="_blank" Style="font-size:23px;color:#777777;margin-left:900px;">LIneA</a>
             
            </div>
         
         </div>
        
      </nav-->
      <!-- Carousel================================================== -->
       <div class="container theme-showcase" role="main">
      <div class="jumbotron" style="margin-top:100px; margin-left:75px; background-color: #ffffff;border-radius:15px;border:2px solid #000000;box-shadow:  1px 1px 15px 1px  #000000">
         <!--INICIO DE FORMULARIO-->
         <!--?php include 'function_insert.php'; ?-->
	
            <!-- testandoForm Name -->
            <legend style="background-color:#000000;border-radius:5px;margin-top:-50px;width:1064px;margin-left:-62px;color:#ffffff"><b>Register of User</b></legend></fieldset>
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
                  <div class="control-group" >
                     <label class="control-label" style="text-align:right;">Name (complete):</label>
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
                  <!-- Text input-->

                  <!--div class="control-group">
                     <label class="control-label" style="text-align:right;">Passaport:</label>
                     <div  class="input"-- >
                        <!--input id="passaport" name="passaport" placeholder="Passaport" class="input-xlarge" type="text"-->
                        <!--input id="passaport" name="passaport"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;">
                     </div-->
                  
                  <!-- Multiple Radios -->
                  <div class="control-group" >
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
                  </div>


                     <div id="br" style="display:none;margin-bottom:15px;display:none;margin-left:200px;" >
                        <!--div id="linha" -->
                           <label class="control-label" style="display:inline-block;">CPF:</label>
                           <input class="form-control" name="cpf" placeholder="" id="cpf"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-140px;margin-bottom:5px;"><br />
                           <label class="control-label" id="identify" style="display:inline-block;">Identity:</label>
                           <input class="form-control" name="identity" placeholder="" id="identity" checked="checked" type="label" style="display:inline;width:300px;margin-left:-140px;margin-bottom:5px;"><br />
                           <label class="control-label"  >Organ of Consultation:</label>
                           <input class="form-control" name="organofconsultation" placeholder="" id="organofconsultation" checked="checked" type="label" style="display:inline;width:300px;width:60px;margin-left:-50px;margin-bottom:5px;">
                           <label class="control-label" id="uf" style="margin-left:20px;margin-bottom:10px;">UF:</label>
                           <input class="form-control" name="uf" placeholder="" id="uf" checked="checked" type="label" style="display:inline;width:70px;display:inline;margin-left:-187px;margin-bottom:5px;">
                        <!--/div-->
                     </div>

                     
                     
                     <div id="passaporte" style="display:none;margin-bottom:10px;display:none;margin-left:200px;" >
                        <!--div id="linha"-->
                           <label class="control-label" style="display:inline-block;">Passaport:</label>
                           <input class="form-control" name="passaport" placeholder="" id="passaport"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;" >
                        <!--/div-->
                     </div>

                       <div id="estrangeiro_residente" style="display:none;margin-bottom:10px;display:none;margin-left:200px;" >
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
                      <label class="control-label" style="text-align:right;" >E-mail Contact:</label>
                     <div class="input" >
                        <input id="otheremail" name="otheremail" placeholder="" class="form-control" style="width:340px;display:inline;" type="text">
                     </div>                   
                     
                  </div>
                  <!-- Select Basic -->
                  <!--div class="control-group" >
                     <label class="control-label" style="text-align:right; ">Project:</label>
                     <div class="input"  style="margin-bottom:-100%;" >
                        <php
                                    $db = mysql_select_db("test");
                                    
                                    $result = mysql_query("select * from project");
                                    while( $row = mysql_fetch_assoc($result))

                                    {
                                       $id= $row['id'];
                                       $name= $row['name'];
                                                                              

                                       echo '<label class="checkbox" for="objectives-0">';
                                       echo $name;
                                       echo'<input name="project[]" id="project-'.$id.'" value="'.$id.'" type="checkbox" style="display:inline;"></label><br>';
                                    



                                          
                                 }                          
                                 

                                    echo mysql_error(); 
                                    mysql_close($conecta_db);?>
                        
                        
                  </div>
               </div-->
                
            <!--div  class="input" style="margin-bottom:1px;margin-left:50px">*Recommended, the orientation of your responsible to the options down!
</div>
<div  class="input" style="margin-bottom:1px;margin-left:321px">For other information contact the <a href="http://www.linea.gov.br/contato/" target="_blank">help desk</a> of LIneA
</div>
              <!-- Multiple Checkboxes -->
            <!--div class="panel-group" id="accordion" style="margin-left:50px">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              
                              <a class="accordion-toggle" data-toggle="collapse"  data-parent="#accordion" href="#collapseOne">
                                 
                              <label class="control-label"  name:"objetives" id="objetives" style="text-align:left;cursor:pointer;margin-left:20px;" >Objectives:</label>
                              </a>
                           </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                           <div class="panel-body">
                              <div class="position">
                                 <div class="input">
                                    <php
                                    $db = mysql_select_db("test");
                                    $result = mysql_query("select * from objectives");

                                    $result = mysql_query("select * from objectives");
                                    while( $row = mysql_fetch_assoc($result))

                                    {
                                       $id= $row['id'];
                                       $name= $row['name'];
                                       $help= $row['help'];
                                       

                                       echo '<label class="checkbox" for="objectives-0">';
                                       echo $name;
                                       echo'<input name="objectives[]" id="objectives-'.$id.'" value="' .$id. '" type="checkbox" style="display:inline;">
                                    <div id="help'.$id.'" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                    <div class="quadrado" id="teste'.$id.'" style="display:inline;margin-top:-30px;">'.$help.'</div></label>';




                                          
                                 }                          
                                 

                                    echo mysql_error(); 
                                    mysql_close($conecta_db);?>
                                    
                                  

                                    
                                    <label class="checkbox" for="objetives-4">
                                    Other:<input id="other" name="other"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;">
                                 </div>
                                 
                             </div>
                           </div>
                        </div>
                     
                       </div-->
                        

                                     <!-- Multiple Checkboxes -->
                        
                           <!--div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                      
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">

                                          <label class="control-label" name="access" style="text-align:left;cursor:pointer;margin-left:20px;">Access:</label>
                                          </a>
                                    </h4>
                                 </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <div class="position">
                                             <div class="input">
                                                <table>
                                                
                                                <php
                                                $db = mysql_select_db("test");
                                                

                                                $result = mysql_query("select * from access_users");
                                                while( $row = mysql_fetch_assoc($result))

                                                {
                                                   $id= $row['id'];
                                                   $name= $row['name'];
                                                   $help= $row['help'];
                                                   
                                                   echo '<tr><td>';
                                                   echo '<label class="checkbox" fro="access-0">';
                                                   echo $name;
                                                   echo'<input name="access[]" id="access-'.$id.'" value="' .$id. '" type="checkbox" style="display:inline;">
                                                <div id="help_access'.$id.'" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                                <div class="quadrado" id="access'.$id.'" style="display:inline;margin-top:-30px;">'.$help.'</div></label></td></tr>';




                                                      
                                             }      

                                 

                                    echo mysql_error(); 
                                    mysql_close($conecta_db);?>
                                    </table
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div-->
                 
                     
                    
                        <!-- Multiple Checkboxes -->
                      <!--div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                      
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                          <label class="control-label" style="text-align:left;cursor:pointer;margin-left:20px;">Agenda LineA:</label>
                                          </a>
                                       </h4>
                                 </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                       
                                       <div class="panel-body">
                                          <p  style="text-align:left;font-size:14px;margin-left:12px;">Permission for access the agenda.</p>
                                          <div>
                                                 <php
                                                $db = mysql_select_db("test");
                                                

                                                $result = mysql_query("select * from agenda");
                                                while( $row = mysql_fetch_assoc($result))

                                                {
                                                   $id= $row['id'];
                                                   $name= $row['name'];
                                                   
                                                   
                                                   
                                                   
                                                   
                                                echo '<label class="checkbox"  id="agendalinea-0" value="' .$id. '" type="checkbox">';
                                                echo $name;
                                                echo'<input name="agendalinea[]" id="agendalinea-'.$id.'"" value="' .$id. '" type="checkbox"></label>';

                                                


                                                      
                                             }      

                                 

                                    echo mysql_error(); 
                                    mysql_close($conecta_db);?>
                                              
                                             </div>
                                          
                                       </div>
                                    </div>
                                 </div-->
                             
                        <!-- Multiple Checkboxes -->
                       
                           <!--div class="panel panel-default">
                                     <div class="panel-heading">
                                       <h4 class="panel-title">
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                          <label class="control-label" style="text-align:left;cursor:pointer;margin-left:20px;">Twiki:</label>
                                          </a>
                                       </h4>
                                    </div>
                                 <div id="collapseFour" class="panel-collapse collapse" >
                                    <div class="panel-body">
                                       <p  style="text-align:left;font-size:14px;margin-left:12px;">Permission for access  groups of Twiki.</p>
                                       <div>
                                          <div class="input">
                                           
                                              <table border="0">
                                               <php
                                                $db = mysql_select_db("test");
                                                

                                                $result = mysql_query("select * from twiki");
                                                while( $row = mysql_fetch_assoc($result))

                                                {
                                                   $id= $row['id'];
                                                   $name= $row['name'];
                                                   
                                                   
                                                   
                                                   
                                                   
                                                

                                                
                                                echo '<tr><td><label class="checkbox" for="twiki-0">';
                                                echo '<input name="twiki[]" id="twiki-'.$id.'"" value="' .$id. '" type="checkbox">';
                                                echo $name; 
                                                echo '</label></td>';
                                                
                                              

                                                      
                                             }      

                                 

                                    echo mysql_error(); 
                                    mysql_close($conecta_db);?>
                                                
                                                   
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div-->
                          
                  
                  <!-- Select Multiple -->
                  
                     <!--div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                    <label class="control-label" style="text-align:left;cursor:pointer;margin-left:20px;">E-mail list: </label>
                                    </a>
                                 </h4>
                              </div>
                              <div id="collapseFive" class="panel-collapse collapse" style="margin-bottom:20px;">
                                 <div class="panel-body">
                                    
                                    <p  style="text-align:left;font-size:14px;margin-left:12px;">Permission for receive emails of lists </p>
                                    <div>
                                       <div class="input">
                                          <table border="0">
                                                 <php
                                                $db = mysql_select_db("test");
                                                

                                                $result = mysql_query("select * from list");
                                                while( $row = mysql_fetch_assoc($result))

                                                {
                                                   $id= $row['id'];
                                                   $name= $row['name'];
                                                   


						echo '<tr><td><label class="checkbox" for="twiki-0">';
                                                echo '<input name="emaillist[]" id="emaillist-'.$id.'"" value="' .$id. '" type="checkbox">';
                                                echo $name;
                                                echo '</label></td>';



                                             }      

                                 

                                    echo mysql_error(); 
                                    mysql_close($conecta_db);?>
                                             
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </div-->
                   


               <!-- perdido/div-->

               



                  <br />
                  <div class="control-group">
                     <label class="control-label" for="register"></label>
                     <div class="input" style="margin-left: -100px;margin-bottom:15px;">
                        <button id="submit" type="button" name="submit" class="btn btn-success" value="submit">Submit</button>
                        <button id="cancel" name="cancel" class="btn btn-inverse">Cancel</button>
                     </div>
                  </div>
                  
<div  class="input" style="margin-bottom:1px;margin-left:810px">For other information contact the <a href="http://www.linea.gov.br/contato/" target="_blank">Help desk</a> of LIneA
</div>
     
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
      

   </body>
</html>
