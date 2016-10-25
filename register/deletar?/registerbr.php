<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Cadastro de Usuário</title>
      
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
      <!--script type="text/javascript" src="jquery-ui-1.8.13.slider.min.js"></script-->
   </head>
   <body style="background-color: #bbbbbb; background-image: linear-gradient(to bottom, #000000, #bbbbbb 20%);  overflow-x:hidden;">

      
      <nav class="navbar navbar-inverse container-fluid " style="background-color: #FAFAFA; background-image:linear-gradient(to bottom, #FFFFFF, #F2F2F2); width:1199px; margin-top:-100px; position:absolute; left:75px; border-color:#f1f1f1;" >
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
               	
		<a href="http://webdev.linea.gov.br/bootstrap/registerbr.php" name'BR'><img src="br.png"></a>&nbsp&nbsp
		<a href="http://webdev.linea.gov.br/bootstrap/register.php" name='US'><img src="br2.png"></a>
		<a href="http://www.linea.gov.br/" target="_blank" Style="font-size:23px;color:#777777;margin-left:900px;">LIneA</a>
               <!--/form-->
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      <!--/center>
      </div-->
      <!-- Carousel================================================== -->
      <div class="jumbotron" style="width:1199px; margin-top:100px; margin-left:75px; background-color: #ffffff;border-radius:15px;border:2px solid #000000;box-shadow:  1px 1px 15px 1px  #000000">
         <!--INICIO DE FORMULARIO-->
         <!--?php include 'mensagem.php'; ?-->
	
            <!-- testandoForm Name -->
            <legend style="background-color:#000000;border-radius:5px;margin-top:-50px;width:1199px;margin-left:-32px;color:#ffffff"><b>Cadastro de usuário</b></legend></fieldset>
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
                     <label class="control-label" style="text-align:right;">Nome (completo):</label>
                     <div class="input" >
                        <!--input id="name" name="name" placeholder="Name" class="input-xlarge" type="text" style="display:inline;"-->
			<input id="1" name="1" value="1" type="hidden">
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
                     <label class="control-label" style="text-align:right;">Data de Nascimento:</label>

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
                     <label class="control-label" style="text-align:right;">Nacionalidade:</label>

                     <div id="brasileiro" class="input"  style="margin-bottom:-10px;display:inline-block;">
                        <label class="radio" >
                        <input name="nationality" id="nationality0" value="Brazillian"  type="radio" style="display:inline;">Brasileiro</label>
                     </div>

                     <div id="estrangeiro" class="input" style="type:display:inline-block;margin-left:20px;margin-bottom:10px;">
                        <label class="radio" >
                        <input name="nationality" id="nationality1" value="Foreign" type="radio" style="display:inline;">Estrangeiro</label>
                     </div>

                     <div id="estrangeiroresidente" class="input" style="type:display:inline-block;margin-left:20px;margin-bottom:10px;">
                        <label class="radio" >
                        <input name="nationality" id="nationality2" value="Foreign Resident" type="radio" style="display:inline;">Estrangeiro residente no Brasil</label>
                     </div>
                  </div>


                     <div id="br" style="display:none;margin-bottom:15px;display:none;margin-left:200px;" >
                        <!--div id="linha" -->
                           <label class="control-label" style="display:inline-block;">CPF:</label>
                           <input class="form-control" name="cpf" placeholder="" id="cpf"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-140px;margin-bottom:5px;"><br />
                           <label class="control-label" id="identify" style="display:inline-block;">Identidade:</label>
                           <input class="form-control" name="identity" placeholder="" id="identity" checked="checked" type="label" style="display:inline;width:300px;margin-left:-140px;margin-bottom:5px;"><br />
                           <label class="control-label"  >Órgão emissor:</label>
                           <input class="form-control" name="organofconsultation" placeholder="" id="organofconsultation" checked="checked" type="label" style="display:inline;width:300px;width:60px;margin-left:-50px;margin-bottom:5px;">
                           <label class="control-label" id="uf" style="margin-left:20px;margin-bottom:10px;">UF:</label>
                           <input class="form-control" name="uf" placeholder="" id="uf" checked="checked" type="label" style="display:inline;width:70px;display:inline;margin-left:-187px;margin-bottom:5px;">
                        <!--/div-->
                     </div>

                     
                     
                     <div id="passaporte" style="display:none;margin-bottom:10px;display:none;margin-left:200px;" >
                        <!--div id="linha"-->
                           <label class="control-label" style="display:inline-block;">Passaporte:</label>
                           <input class="form-control" name="passaport" placeholder="" id="passaport"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;" >
                        <!--/div-->
                     </div>

                       <div id="estrangeiro_residente" style="display:none;margin-bottom:10px;display:none;margin-left:200px;" >
                        <!--div id="linha"-->
                           <label class="control-label" style="display:inline-block;">Passaporte:</label>
                           <input class="form-control" name="passaportr" placeholder="" id="passaportr"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;margin-bottom:5px;" ><br />
                           <label class="control-label" style="display:inline-block;">CPF:</label>
                           <input class="form-control" name="cpfr" placeholder="" id="cpfr"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;margin-bottom:5px;" >

                        <!--/div-->
                     </div>

                    
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Endereço:</label><br>
                     <div class="input"  style="margin:left;">
                  <div id="linha">
                        <!--input id="address" name="address" placeholder="Address" class="input-xlarge" type="text"-->
                           <label class="control-label" name="address"  style="text-align:right;margin-right:-18px;display:inline;">Rua:</label>
                           <input id="street" name="street"  placeholder=" " class="form-control" type="text" style="width:360px;display:inline;margin-bottom:5px;margin-left:50px;"><br />
                           <label class="control-label" name="address"  style="text-align:right;margin-right:-18px;display:inline;margin-bottom:5px;">Cidade:</label>        
                           <input id="city" name="city"  placeholder="" class="form-control" type="text" style="width:260px;margin-bottom:5px;display:inline;margin-left:29px;"><br />
                           <label class="control-label" name="address"  style="text-align:right;display:inline;margin-right:-15px;margin-bottom:5px;">CEP:</label>    
                           <input id="zipcode" name="zipcode"  placeholder="" class="form-control" type="text" style="width:260px;margin-left:46px;margin-bottom:5px;display:inline;"><br />
                           <label class="control-label" name="address"  style="text-align:right;display:inline;margin-right:-15px;margin-bottom:5px;">Estado:</label>    
                           <input id="state" name="state"  placeholder="" class="form-control" type="text" style="width:260px;margin-bottom:5px;display:inline;margin-left:27px;"><br/>
                           <!--label class="control-label" name="address"  style="text-align:right;display:inline;margin-right:-18px;margin-bottom:5px;">País:</label>        
                           <input id="country" name="country"  placeholder="" class="form-control" type="text" style="width:340px;margin-bottom:5px;display:inline;margin-left:47px;"--><br />
                           
                  </div> 

                      
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Telefone de contato:</label>
                     <div class="input">
                        <!--input id="contacttelephone" name="contacttelephone" placeholder="Contact telephone" class="input-xlarge" type="text"-->
                        <input id="contacttelephone" name="contacttelephone"  placeholder="ex: (000) 0000-0000" class="form-control" type="text" style="width:340px;display:inline;">
                        <div id="telefone" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                        <div class="quadrado" id="testetelefone" style="display:inline;margin-top:-30px;">+00(Code international of country)<br>00(Code of area)<br>0000-0000(Number of telephone) </div>
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Telefone Celular:</label>
                     <div class="input">
                        <!--input id="cellphone" name="cellphone" placeholder="Cell phone" class="input-xlarge" type="text"-->
                         <input id="cellphone" name="cellphone"  placeholder="ex: (000) 0000-0000" class="form-control" type="text" style="width:340px;display:inline;">
                         <!--div id="helptel2" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                        <div class="quadrado" id="testetel2" style="display:inline;margin-top:-30px;">+00(Code international of country)<br>00(Code of area)<br>0000-0000(Number of telephone) </div-->

                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Instituição:</label>
                     <div class="input">
                        <!--input id="intitution" name="intitution" placeholder="Institution" class="input-xlarge" type="text"-->
                        <input id="institution" name="institution"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;">
                     </div>
                  </div>
                  <!-- Select Basic -->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Cargo:</label>
              
                     <div class="input">

                        <select id="position" name="position" class="form-control">
                           <option value="">...</option>
                           <option value="Administrative">Administrativo</option>
                           <option value="InterN">Estagiário </option>
                           <option value="Undergraduate Student">Graduando</option>
                           <option value="MSc. Student">Mestrando</option>
                           <option value="PhD. Student">Doutorando</option>
                           <option value="Posdoc">Pós-doutorando </option>
                           <option value="IT">Tecnologista </option>
                           <option value="Scientist">Cientista</option>
                        </select>
                     </div>
                  </div>
                   <!-- Text input-->
                   <div id="responsible">
                      <div class="control-group">

                        <label class="control-label" style="text-align:right;">Responsável:</label>
                     
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
                     <label class="control-label" style="text-align:right;margin-right:20px;font-size:14px;margin-left:80px;display:inline;">Gostaria de ter um e-mail do Linea?</label>
                     
                     
                     <div id="yes" class="input" style="display:inline-block;">
                        <label class="radio"  >
                        <input type="radio"  name="emaillinea" id="yes" value="y" style="display:inline;" >Sim</label>  
                     </div>
                     <div id="no" class="input" style="display:inline-block;">
                              <label class="radio"  >
                              <input type="radio" name="emaillinea" id="no" value="n"  style="display:inline;" >Não</label>
                         </div>
                        
                         <div id="sim" style="display:none;margin-left:215px;" >
                           <div class="control-group" >
                              <label class="radio" style="margin-left:-80px;">Usuário:</label>
                              <div class="input-group" style="margin-top:-20px;" >
                                 <div class="input">
                                  <input id="emaillinea" name="emaillinea"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;margin-top:-5px;"><span class="input-group-addon" style="display:inline;">@linea.gov.br</span>
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
                      <label class="control-label" style="text-align:right;" >E-mail de Contato:</label>
                     <div class="input" >
                        <input id="otheremail" name="otheremail" placeholder="" class="form-control" style="width:340px;display:inline;" type="text">
                     </div>                   
                     
                  </div>
                  <!-- Select Basic >
                  <div class="control-group" >
                     <label class="control-label" style="text-align:right; ">Projeto:</label>
                     <div class="input"  style="margin-bottom:-100%;" >
                        <select id="project" name="project" class="input-xlarge">
                           <option value="">...</option>
                           <option value="des">DES</option>
                           <option value="sdssiii">SDSS-III</option>
                        </select>
                        
                        <label class="checkbox" style="margin-left:-1px;font-weight: bold;">
                                   DES<input  name="project" id="project" value="DES" type="checkbox"  style="padding-left:30px;"></label>
                        </div><br>
                        <div class="input">
                        <label class="checkbox" style="margin-left:212px;position:initial;margin-bottom:30px;">
                           <input name="project"  id="project" value="SDSS-IV" type="checkbox">SDSS-IV
                        </label>
                     </div></label>

                  </div>
                  < Select Basic>
                  <div class="control-grou   p">
                     <label class="control-label"   style="text-align:left;">Functions:</label>
                     <div class="input">
                        <select id="functions" name="functions" class="input-xlarge">
                           <option value="">...</option>
                           <option value="staff">Staff</option>
                           <option value="it">IT</option>
                           <option value="pm">PM</option>
                           <option value="estudante">Estudante</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div  class="input" style="margin-bottom:1px;margin-left:50px">*Recomendado, a orientação do seu responsável para as opções para baixo!
</div>
<div  class="input" style="margin-bottom:1px;margin-left:800px">Para mais informações contate o <a href="http://www.linea.gov.br/contato/" target="_blank">help desk</a> do LIneA
</div>
              < Multiple Checkboxes >
            <div class="panel-group" id="accordion" style="margin-left:50px">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              
                              <a class="accordion-toggle" data-toggle="collapse"  data-parent="#accordion" href="#collapseOne">
                                 
                              <label class="control-label"  name:"objetives" id="objetives" style="text-align:left;cursor:pointer;margin-left:20px;" >Objetivos:</label>
                              </a>
                           </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                           <div class="panel-body">
                              <div class="position">
                                 <div class="input">

					<?php
                                    $db = mysql_select_db("test");
                                    

                                    $result = mysql_query("select * from objectives");
                                    while( $row = mysql_fetch_assoc($result))

                                    {
                                       $id= $row['id'];
                                       $name= $row['name_br'];
                                       $help= $row['help_br'];
                                       

                                       echo '<label class="checkbox" for="objectives-0">';
                                       echo $name;
                                       echo'<input name="objectives[]" id="objectives-'.$id.'" value="' .$id. '" type="checkbox" style="display:inline;">
                                    <div id="help'.$id.'" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                    <div class="quadrado" id="teste'.$id.'" style="display:inline;margin-top:-30px;">'.$help.'</div></label>';




                                          
                                 }                          
                                 

                                    echo mysql_error(); ?>

                                    <label class="checkbox"  >
                                    Desenvolvedor do portal  <input name="objectives[]" id="objectives-0" value="Developer portal" type="checkbox" style="display:inline;">
                                    <div id="help" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                    <div class="quadrado" id="teste" style="display:inline;margin-top:-30px;">Permissão para desenvolver no portal do linea.</div></label>
                                    
                                    <label class="checkbox" for="objectives-1">
                                    Desenvolvedor de códigos científicos <input name="objectives[]" id="objectives-1" value="developer of scientific codes" type="checkbox">
                                    <div id="help2" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                    <div class="quadrado" id="teste2" style="display:inline;margin-top:-59px;">Permissão para desenvolver códigos científicos.</div></label>

                                    <label class="checkbox" for="objectives-2">
                                    Desenvolvedor de Pipelines  <input name="objectives[]" id="objectives-2" value="Pipelines developer" type="checkbox">
                                    <div id="help3" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                    <div class="quadrado" id="teste3" style="display:inline;margin-top:-89px;">A permissão para o acesso de desenvolvedor Pipelines.</div></label>

                                    <label class="checkbox" for="objectives-3">
                                    Store codes in GIT <input name="objectives[]" id="objectives-3" value="Store codes in GIT" type="checkbox">
                                    <div id="help4" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                    <div class="quadrado" id="teste4" style="display:inline;margin-top:-110px;">Permission for  store your codes in GIT.</div></label>

                                    <label class="checkbox" for="objetives-4">
                                    User of Twiki <input name="objetives[]" id="objetives-4" value="User of Twiki" type="checkbox">
                                    <div id="help5" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                    <div class="quadrado" id="teste5" style="display:inline;margin-top:-140px;">Permission for access the twiki, for queries or editions of pages.</div></label>

                                    <label class="checkbox" for="objetives-4">
                                    Outros:<input id="other" name="other" placeholder="other" class="input-xlarge" type="text" style="display:inline;">
                                     <input id="other" name="other"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;">
                                 </div>
                                 
                             </div>
                           </div>
                        </div>
                     
                       </div>
                        

                                     < Multiple Checkboxes >
                        
                           <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                      
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">

                                          <label class="control-label" name="access" style="text-align:left;cursor:pointer;margin-left:20px;">Acesso:</label>
                                          </a>
                                    </h4>
                                 </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <div class="position">
                                             <div class="input">


						<table>
                                                
                                                <?php
                                                $db = mysql_select_db("test");
                                                

                                                $result = mysql_query("select * from access_users");
                                                while( $row = mysql_fetch_assoc($result))

                                                {
                                                   $id= $row['id'];
                                                   $name= $row['name'];
                                                   $help_br= $row['help_br'];
                                                   
                                                   echo '<tr><td>';
                                                   echo '<label class="checkbox" fro="access-0">';
                                                   echo $name;
                                                   echo'<input name="access[]" id="access-'.$id.'" value="' .$id. '" type="checkbox" style="display:inline;">
                                                <div id="help_access'.$id.'" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>
                                                <div class="quadrado" id="access'.$id.'" style="display:inline;margin-top:-30px;">'.$help_br.'</div></label></td></tr>';




                                                      
                                             }      

                                 

                                    echo mysql_error(); ?>
                                    </table>
                                             <table>
                                                <tr>
                                                   <td><label class="checkbox" id="access-0" value="Portal DES" type="checkbox">Portal DES  
                                                      <input name="access[]" id="access-0" value="Portal DES" type="checkbox">
                                                      <div id="help6" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div><div class="quadrado" id="teste6" style="display:inline;margin-top:-35px;">Permissão para o acesso a twiki, para consultas ou edições de páginas.</div></label></td>
                                                   
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="access-1" value="Portal SDSS-IV" type="checkbox">Portal SDSS-IV
                                                      <input name="access[]" id="access-1" value="Portal SDSS-IV" type="checkbox">
                                                       <div id="help7" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div><div class="quadrado" id="teste7" style="display:inline;margin-top:-63px;">Permissão para o acesso a twiki, para consultas ou edições de páginas..</div></label>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="access-2" value="Google docs" type="checkbox">Google docs
                                                      <input name="access[]" id="access-2" value="Google docs" type="checkbox">
                                                 <div id="help8" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div><div class="quadrado" id="teste8" style="display:inline;margin-top:-90px;">Permissão para o acesso a twiki, para consultas ou edições de páginas..</div></label></td>
                                                </tr>
                                                <tr>
                                                   
                                                   <td><label class="checkbox" id="access-3" value="Devel" type="checkbox">Devel
                                                      <input name="accesss[]" id="access-3" value="Devel" type="checkbox">
                                                   <div id="help9" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div><div class="quadrado" id="teste9" style="display:inline;margin-top:-115px;">Permissão para o acesso a twiki, para consultas ou edições de páginas.</div></label></td>
                                                </tr>
                                                
                                             </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                 
                     
                    
                        < Multiple Checkboxes >
                      <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                      
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                          <label class="control-label" style="text-align:left;cursor:pointer;margin-left:20px;">Agenda LineA:</label>
                                          </a>
                                       </h4>
                                 </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                       
                                       <div class="panel-body">
                                          <p  style="text-align:left;font-size:14px;margin-left:12px;">Permissão para acesso da agenda.</p>
                                          <div>
						<?php
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

                                 

                                    echo mysql_error(); ?>
                                                <div class="input">
                                                <label class="checkbox"  id="agendalinea-0" value="LIneA" type="checkbox">LIneA
                                                <input name="agendalinea[]" id="agendalinea-0" value="LineA" type="checkbox"></label>
                                                <label class="checkbox"  id="agendalinea-1" value="SDSS-IV" type="checkbox">SDSS-IV
                                                <input name="agendalinea[]" id="agendalinea-1" value="SDSS-IV" type="checkbox"></label>
                                                <label class="checkbox" id="agendalinea-2" value="DES" type="checkbox">DES
                                                <input name="agendalinea[]" id="agendalinea-2" value="DES" type="checkbox"></label>
                                                <label class="checkbox" id="agendalinea-3" value="Vacation of LIneA" type="checkbox">Vacation of LIneA
                                                <input name="agendalinea[]" id="agendalinea-3" value="Vacation of LIneA" type="checkbox"></label>
                                                <label class="checkbox"  id="agendalinea-4" value="Aniversarios" type="checkbox">Birthdays
                                                <input name="agendalinea[]" id="agendalinea-4" value="Birthdays" type="checkbox"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                             
                        < Multiple Checkboxes >
                       
                           <div class="panel panel-default">
                                     <div class="panel-heading">
                                       <h4 class="panel-title">
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                          <label class="control-label" style="text-align:left;cursor:pointer;margin-left:20px;">Twiki:</label>
                                          </a>
                                       </h4>
                                    </div>
                                 <div id="collapseFour" class="panel-collapse collapse" >
                                    <div class="panel-body">
                                       <p  style="text-align:left;font-size:14px;margin-left:12px;">Permissão para acesso do Twiki.</p>
                                       <div>
                                          <div class="input">
						<?php
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

                                 

                                    echo mysql_error(); ?>
                                             <table border="0">
                                                <tr>
                                                   <td><label class="checkbox" for="twiki-0">
                                                      <input name="twiki" id="twiki-0" value="Astrosoft" type="checkbox">Astrosoft</label>
                                                   </td>
                                                   <td><label class="checkbox" style="margin-left:150px;">
                                                      <input name="twiki" id="twiki-1" value="DEV/WorkspaceDEV" type="checkbox">DEV/WorkspaceDEV</label>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-2" value="DEV/WorkspaceDEV/MapaNavegMenus" type="checkbox">DEV/WorkspaceDEV/MapaNavegMenus</label>
                                                   </td>
                                                   <td><label class="checkbox" style="margin-left:150px;"><input name="twiki[]" id="twiki-3" value="DesBrazil" type="checkbox">DesBrazil</label></td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-4" value="Documentation" type="checkbox">Documentation</label>
                                                   </td>
                                                   <td><label class="checkbox" style="margin-left:150px;"><input name="twiki[]" id="twiki-5" value="LIneA" type="checkbox">LIneA</label>
                                                   </td>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-6" value="Main" type="checkbox">Main</label>
                                                   </td>
                                                   <td><label class="checkbox" style="margin-left:150px;"><input name="twiki[]" id="twiki-7" value="PhotoZWG" type="checkbox">PhotoZWG</label>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-8" value="PortalDocumentation_ctio" type="checkbox">PortalDocumentation_ctio</label>
                                                   </td>
                                                   <td><label class="checkbox" style="margin-left:150px;"><input name="twiki[]" id="twiki-9" value="PortalDocumentation_des" type="checkbox">PortalDocumentation_des</label>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-10" value="PortalDocumentation_sdss3" type="checkbox">
                                                      PortalDocumentation_sdss3</label>
                                                   </td>
                                                   <td><label class="checkbox" style="margin-left:150px;"><input name="twiki[]" id="twiki-11" value="PortalSkin" type="checkbox">PortalSkin
                                                      </label>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-12" value="PortalUserGuidedes" type="checkbox">PortalUserGuidedes</label>
                                                   </td>
                                                   <td><label class="checkbox" style="margin-left:150px;"><input name="twiki[]" id="twiki-13" value="PortalUserGuidesdss3" type="checkbox">PortalUserGuidesdss3</label>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-14" value="Project Manager" type="checkbox">Project Manager</label>
                                                   </td>
                                                   <td><label class="checkbox" style="margin-left:150px;"><input name="twiki[]" id="twiki-15" value="Sandbox" type="checkbox">Sandbox</label>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-16" value="SDSS3" type="checkbox">SDSS3</label>
                                                   </td>
                                                   <td><label class="checkbox" style="margin-left:150px;"><input name="twiki[]" id="twiki-17" value="StrongLensing" type="checkbox">StrongLensing
                                                      </label>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-18" value="Twiki" type="checkbox">Twiki</label>
                                                   </td>
                                                </tr>
                                             </table>
                                              <table border="0">
                                                <tr>
                                                   <td><label class="checkbox" for="twiki-0">
                                                      <input name="twiki[]" id="twiki-0" value="LineA" type="checkbox">LineA</label>
                                                
                                                   </td>
                                                   <td><label class="checkbox" id="twiki-1" style="margin-left:150px;">
                                                      <input name="twiki[]" id="twiki-1" value="Astrosoft" type="checkbox">Astrosoft</label>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-2" value="desbrazil" type="checkbox">
                                                      <input name="twiki[]" id="twiki-2" value="Des-Brazil" type="checkbox">Des-Brazil</label>
                                                   </td>
                                                   <td><label class="checkbox" id="twiki-3" style="margin-left:150px;">
                                                      <input name="twiki[]" id="twiki-3" value="GPA" type="checkbox">GPA</label></td>
                                                </tr>
                                                <tr>
                                                   <td><label class="checkbox" id="twiki-4" value="sdss3" type="checkbox">
                                                      <input name="twiki[]" id="twiki-4" value="SDSS III" type="checkbox">SDSS III</label>
                                                   </td>
                                                   <td><label class="checkbox" id="twiki-5" style="margin-left:150px;">
                                                      <input name="twiki[]" id="twiki-5" value="CS82" type="checkbox">CS82</label>
                                                   </td>
                                                </tr>
                                                   
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                          
                  
                  < Select Multiple >
                  
                     <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                    <label class="control-label" style="text-align:left;cursor:pointer;margin-left:20px;">Lista de E-mail: </label>
                                    </a>
                                 </h4>
                              </div>
                              <div id="collapseFive" class="panel-collapse collapse" style="margin-bottom:20px;">
                                 <div class="panel-body">
                                    
                                    <p  style="text-align:left;font-size:14px;margin-left:12px;">Permissão para acesso das listas </p>
                                    <div>
                                       <div class="input">

						<?php
                                                $db = mysql_select_db("test");
                                                

                                                $result = mysql_query("select * from list");
                                                while( $row = mysql_fetch_assoc($result))

                                                {
                                                   $id= $row['id'];
                                                   $name= $row['name'];
                                                   

                                                     
                                                       echo '<tr><td><label class="checkbox"  value="all" type="checkbox"><input name="emaillist[]" id="' .$id. '" value="' .$id. '" type="checkbox">';
                                                       echo $name;
                                                       echo '</label></td>';                  

                                             }      

                                 

                                    echo mysql_error(); ?>

                                          <table border="0">
                                             <tr>
                                                <td><label class="checkbox"  value="all" type="checkbox"><input name="emaillist[]" id="emaillist-0" value="All" type="checkbox">all</label>
                                                </td>
                                                <td><label class="checkbox" style="margin-left:250px;"><input name="emaillist[]" id="emaillist-1" value="bcc" type="checkbox">bcc</label>
                                                </td>
                                                <td><label class="checkbox" style="margin-left:250px;"><input name="emaillist[]" id="emaillist-2" value="bigdata" type="checkbox">bigdata</label>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-3" value="bookkeepingdb" type="checkbox">
                                                   bookkeepingdb
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-4" value="bpg-apogee" type="checkbox">
                                                   bpg-apogee
                                                   </label>
                                                </td>
                                                <td><label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-5" value="bpg-board" type="checkbox">
                                                   bpg-board
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-6" value="bpg-boss" type="checkbox">
                                                   bpg-boss
                                                   </label>
                                                </td>
                                                <td><label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-7" value="bpg-ga" type="checkbox">
                                                   bpg-ga
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-8" value="bpg-science" type="checkbox">
                                                   bpg-science
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-9" value="bpg-segue" type="checkbox">
                                                   bpg-segue
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-10" value="dc" type="checkbox">
                                                   dc
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-11" value="des-cl" type="checkbox">
                                                   des-cl
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>                                       
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-12" value="des-developers" type="checkbox">
                                                   des-developers
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-13" value="des-ga" type="checkbox">
                                                   des-ga
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-14" value="des-ge" type="checkbox">
                                                   des-ge
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-15" value="des-lss" type="checkbox">
                                                   des-lss
                                                   </label>
                                                </td>
                                                 <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-16" value="des-photoz" type="checkbox">
                                                   des-photoz
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-17" value="des-pipekeepers" type="checkbox">
                                                   des-pipekeepers
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                               
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-18" value="des-portal-dev" type="checkbox">
                                                   des-portal-dev
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-19" value="des-qso" type="checkbox">
                                                   des-qso
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-20" value="des-science" type="checkbox">
                                                   des-science
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-21" value="des-sim" type="checkbox">
                                                   des-sim
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-22" value="des-sl" type="checkbox">
                                                   des-sl
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-23" value="des-theory" type="checkbox">
                                                   des-theory
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-24" value="des-wl" type="checkbox">
                                                   des-wl
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-25" value="e2e" type="checkbox">
                                                   e2e
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-26" value="ge" type="checkbox">
                                                   ge
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-27" value="infra" type="checkbox">
                                                   infra
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-28" value="linea-news" type="checkbox">
                                                   linea-news      
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-29" value="lsst" type="checkbox">
                                                   lsst
                                                   </label>
                                                </td>
                                            
                                             </tr>
                                             <tr>
                                               
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-30" value="portal-notify" type="checkbox">
                                                   portal-notify
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-31" value="portal-users" type="checkbox">
                                                   portal-users
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-32" value="qa" type="checkbox">
                                                   qa
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <label class="checkbox" >

                                                   <input name="emaillist[]" id="emaillist-33" value="qa-desdm" type="checkbox">
                                                   qa-desdm
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-34" value="qr" type="checkbox">
                                                   qr
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-35" value="qr-local" type="checkbox">
                                                   qr-local
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-36" value="sc" type="checkbox">
                                                   sc
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-37" value="science" type="checkbox">
                                                   science
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-38" value="sciteam" type="checkbox">
                                                   sciteam
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                
                                                
                                             </tr>
                                             <tr>
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist" id="emaillist-39" value="dss-portal-de" type="checkbox">
                                                   sdss-portal-dev
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-40" value="sdss3-portal-dev" type="checkbox">
                                                   sdss3-portal-dev
                                                   </label>
                                                </td>
                                                 <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-41" value="students" type="checkbox">
                                                   students
                                                   </label>
                                                </td>
                                               
                                             </tr>
                                             <tr>
                                                
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-42" value="tawala" type="checkbox">
                                                   tawala
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-43" value="tcp" type="checkbox">
                                                   tcp
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-44" value="tech " type="checkbox">
                                                   tech      
                                                   </label>
                                                </td>
                                             </tr>
                                             <tr>
                                                
                                                <td>
                                                   <label class="checkbox" for="twiki-1">
                                                   <input name="twiki" id="twiki-1" value="DEV/WorkspaceDEV" type="checkbox">
                                                   tmp
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" >
                                                   <input name="emaillist[]" id="emaillist-45" value="users" type="checkbox">
                                                   users
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-46" value="web" type="checkbox">
                                                   web
                                                   </label>
                                                </td>
                                                <td>
                                                   <label class="checkbox" style="margin-left:250px;">
                                                   <input name="emaillist[]" id="emaillist-47" value="whitehouses" type="checkbox">
                                                   whitehouse
                                                   </label>
                                                </td>
                                               </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                   
               </div-->

               



                  <br />
                  <div class="control-group">
                     <label class="control-label" for="register"></label>
                     <div class="input" style="margin-left: -100px;margin-bottom:15px;">
                        <button id="submit" type="button" name="submit" class="btn btn-success" value="submit">Submit</button>
                        <button id="cancel" name="cancel" class="btn btn-inverse">Cancel</button>
                     </div>
                  </div>
                  <div  class="input" style="margin-bottom:1px;margin-left:810px">Para ajuda entre em contato com o <a href="http://www.linea.gov.br/contato/" target="_blank">Help desk</a> do LIneA.
</div>
     
			<div id="idcadastro">

			</div>


   
      </form>
      </div>
      </div>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/nationality_br.js"></script>
      <script src="js/validate.js"></script>
      <script src="js/maskedinput.js"></script>
      <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
      

   </body>
</html>


