<?php
//include('function_insert.php');
//include('mensagem.php');
require_once("conexao.php");





//valor de id passado pelo link em mensagem.php(nao mexer esta ok )
$id = $_GET['id'];
//$id = $id +1;

//echo 'IDconfimation:'.$id;



$query_select = "SELECT * from users  where id ='".$id."'" or die(mysql_error());
  //SELECT * from users WHERE id='$id'")
$insert_select = mysql_query($query_select);

while($array = mysql_fetch_array($insert_select))
{
  //mostra na tela o nome e a data de nascimento
  $nome = $array['name'];
  //echo 'SELECT:'.$nome."<br />";
  $date =  $array['date_of_birth'];
  //echo 'DATE:'.$date; 

if($date == '0000-00-00')
{
    $date_of_birth = 'Não informado';
}
else{
$time = strtotime($date);
 $datebirth = ($time === false) ? '0000-00-00' : date('d/m/Y ', $time);
}
 

  //echo 'SELECT:'.$array['date_of_birth']."<br />";
  $nationality =  $array['nationality'];
  //echo 'SELECT:'.$array['nationality']."<br />";
  $street =   $array['street'];
  //echo 'SELECT:'.$array['address']."<br />";
  $city =   $array['city'];
  $zipcode =   $array['zipcode'];
  $state =   $array['state'];
  $country =   $array['country'];



  $telephone =  $array['telephone'];
  $telum = substr($telephone, 0, -11);
  $teldois = substr($telephone, 3, -8);
  $teltres = substr($telephone, 6, 10);
  $telefone = $telum.' '.$teldois.' '.$teltres;
  //echo $telefone.'<br>';
  //echo $telephone ;
  
  //echo 'SELECT:'.$array['telephone']."<br />";
  $cell_phone =  $array['cell_phone'];
  $celum = substr($cell_phone, 0, -11);
  $celdois = substr($cell_phone, 3, -9);
  $celtres = substr($cell_phone, 6, 10);
  $celular = $celum.' '.$celdois.' '.$celtres;




  //echo 'SELECT:'.$array['cell_phone']."<br />";
  $institution = $array['instituition'];  
  //echo 'SELECT:'.$array['instituition']."<br />";
  $position = $array['position'];
  //echo 'SELECT:'.$array['position']."<br />";
  $responsible = $array['responsible'];
  //echo 'SELECT:'.$array['responsible']."<br />";
  $user_for_linea =  $array['user_for_linea'];
  //echo 'SELECT:'.$array['user_for_linea']."<br />";
  $gmail = $array['gmail'];
  //echo 'SELECT:'.$array['gmail']."<br />";
  $email_contact = $array['email_contact']; 
  //echo 'SELECT:'.$array['email_contact']."<br />";
  $projects = $array['project'];
  /*$project = explode(' ',$project);
  echo $projects[0];
*/
  $other = $array['other'];
  //echo "outro:".$other;

}

//echo $project.'testando';


//echo $projects[1]

//montando consulta na tabela objetives

//SELECT * from link_objectives as lo left JOIN link as l  on lo.fk_user_id=l.fk_users_id  where  l.fk_users_id='".$id."'") or die(mysql_error());
//("SELECT * from objectives WHERE ID='$id'") or die(mysql_error());




//montando consulta na tabela access
$query_access = ("SELECT * from access_users as a left JOIN link_access as l on a.id=l.fk_access_id  where  l.fk_user_id='".$id."'") or die(mysql_error());
//("SELECT * from access_users WHERE ID='$id'") or die(mysql_error());
$insert_access = mysql_query($query_access);

while($array = mysql_fetch_array($insert_access))
{
  $access = $array['name'];
  //$access_separados = explode(",",$access);
  
}

//montando consulta na tabela agenda
$query_agenda = ("SELECT * from agenda as ag left JOIN link_agenda as l  on ag.id=l.fk_agenda_id  where  l.fk_user_id='".$id."'") or die(mysql_error());
$insert_agenda = mysql_query($query_agenda);

while($array = mysql_fetch_array($insert_agenda))
{

  $agenda = $array['name'];
  //$agenda_separados = explode(",",$agenda);
}

//montando consulta na tabela twiki
$query_twiki = ("SELECT * from twiki as t left JOIN link_twiki  as l  on t.id=l.fk_twiki_id  where  l.fk_user_id='".$id."'") or die(mysql_error());
$insert_twiki = mysql_query($query_twiki);
	
while($array = mysql_fetch_array($insert_twiki))
{

  $twiki = $array['name'];
 // $twiki_separados = explode(",",$twiki);
}

//montando consulta na tabela emaillist
$query_list = ("SELECT * from list as li left JOIN link_list as l  on li.id=l.fk_list_id  where  l.fk_user_id='".$id."'") or die(mysql_error());
$insert_list = mysql_query($query_list);

while($array = mysql_fetch_array($insert_list))
{ 
  $emaillist = $array['name'];
  //$emaillist_separados = explode(",",$emaillist);

}

 
$query_select_status = ("SELECT * from status_users as s left JOIN link  as l on s.fk_users_id =l.fk_users_id where s.fk_users_id=".$id) or die(mysql_error());
$insert_select_status = mysql_query($query_select_status);
while($array = mysql_fetch_array($insert_select_status))
{
   $status_c = $array['status'];

  $date_start =  $array['date_started'];
  $convert_date = strtotime($date_start);
  $date_started = ($time === false) ?  '0000-00-00 00:00:00' : date('d/m/Y ', $convert_date);

  //echo 'SELECT:'.$date_started;"<br />";


//para exibir status
  $date_f=  $array['date_end'];
  $date_end = date("d/m/Y", strtotime($date_f));

}



//select table doc_users

$query_selectdoc = "SELECT * from doc_users as d left JOIN link  as l  on d.id=l.fk_users_id  where  l.fk_users_id='".$id."'" or die(mysql_error());
//("SELECT * from doc_users WHERE ID='$id'") or die(mysql_error());
$insert_selectdoc = mysql_query($query_selectdoc);

while($array = mysql_fetch_array($insert_selectdoc))
{
  //mostra na tela o nome e a data de nascimento
  $cpf_br = $array['cpf_br'];
  //echo 'cpf:'.$cpf_br."<br />";
  $identify_br = $array['identify_br'];
  //echo 'identity:'.$identify_br."<br />";
  $organ_of_consultation_br = $array['organ_of_cons_br'];
  //echo 'organ:'.$organ_of_consultation_br."<br />";
  $uf_br = $array['uf_br'];
  //echo 'uf:'.$uf_br."<br />";
  $passaport = $array['passaport_fo'];
 // echo 'passaporte:'.$passaport;
 
  //echo 'SELECT:'.$array['passaport_fo']."<br />";

  $passaport_rf = $array['passaport_rf'];
  //echo 'passaport_rf:'.$passaport_rf."<br />";

  $cpf_rf = $array['cpf_rf'];
  //echo 'cpf_rf:'.$cpf_rf."<br />";
  
}



if ($nationality == 'Brazillian'){
        $conteudo ="<div class='control-group'>
                        <label class='control-label' style='text-align:right;'>CPF:</label>
                        <div class='input'>                                                         
                           <label  style='text-align:right;'>$cpf_br</label>       
                        </div>
                     </div>
                     <div class='control-group'>
                        <label class='control-label' style='text-align:right;'>Identity:</label>
                        <div class='input'>                                                         
                           <label  style='text-align:right;'>$identify_br</label>       
                        </div>
                     </div>
                     <div class='control-group'>
                        <label class='control-label' style='text-align:right;'>Organ of Consultation:</label>
                        <div class='input'>                                                         
                           <label  style='text-align:right;'>$organ_of_consultation_br</label>       
                        </div>
                     </div>
                     <div class='control-group'>
                        <label class='control-label' style='text-align:right;'>Uf:</label>
                        <div class='input'>                                                         
                           <label  style='text-align:right;'>$uf_br</label>       
                        </div>
                     </div>
                     ";  
            
    }
    else if ($nationality == 'Foreign'){
           $conteudo="<div class='control-group'>
                        <label class='control-label' style='text-align:right;'>Passaport:</label>
                        <div class='input'>                                                         
                           <label  style='text-align:right;'>$passaport</label>       
                        </div>
                     </div>";
      


    }
    else if ($nationality == 'Foreign Residen'){
          $conteudo="<div class='control-group'>
                        <label class='control-label' style='text-align:right;'>Passaport:</label>
                        <div class='input'>                                                         
                           <label  style='text-align:right;'>$passaport_rf</label>       
                        </div>
                     </div>
                     <div class='control-group'>
                        <label class='control-label' style='text-align:right;'>Cpf:</label>
                        <div class='input'>                                                         
                           <label  style='text-align:right;'>$cpf_rf</label>       
                        </div>
                     </div>";
                  
    }





//echo "DOCUMENTOS: ". $conteudo;


if ($position == 'Posdoc'){
          $orientador="<div class='control-group'>
                        <label class='control-label' style='text-align:right;'>Responsible:</label>
                        <div class='input'>                                                         
                           <label  style='text-align:right;'>$responsible</label>       
                        </div>
                     </div>
                     ";
                  
    }
//echo  "RESPONSAVEL:". $orientador;

if ($date_f!='0000-00-00'){
    $finaliza="<div class='control-group' >
                     <label class='control-label' style='text-align:right;'>Date of output :</label>
                     <div class='input'>
                         <label  style='text-align:right;'>$date_end</label>
                     </div>
          </div>";

}


if ($other!=''){
    $outro="<label class='checkbox' for='objetives-4'>Other:  $other</label>";

}
     


echo mysql_error();











?>




<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Confirmation of register</title>
      
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
   <body style="background-color: #bbbbbb; background-image: linear-gradient(to bottom, #000000, #bbbbbb 20%);  overflow-x:hidden;">
      
      <nav class="navbar navbar-inverse container-fluid " style="background-color: #FAFAFA; background-image: linear-gradient(to bottom, #FFFFFF, #F2F2F2); width:1199px; margin-top:-100px; position:absolute; left:75px; border-color:#f1f1f1;" >
         <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="margin-top:0px;">
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!--div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"-->
              <div class="nav-collapse collapse navbar-responsive-collapse">
               <!--form class="navbar-form navbar-left" role="search" style="margin-left:10px;">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button></form-->
               
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

            <!-- Form Name -->
            <legend style="background-color:#000000;border-radius:5px;margin-top:-50px;width:1199px;margin-left:-32px;color:#ffffff"> <b>Confirmation of User</b>   <a href="http://webdev.linea.gov.br/bootstrap/search.php"  style="margin-left:909px;"><font color='#ffffff'><b>Search</b></font></a>              </legend></fieldset>
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
		        <input type="hidden" name="id_user" value=<?php echo $id;?>>
            <div>
               <!-- Text input-->
               <div>
                  <div class="control-group" >
                     <label class="control-label" style="text-align:right;margin-bottom:-15px;">Name (complete):</label>
                     <div class="input" >
                        <!--input id="name" name="name" placeholder="Name" class="input-xlarge" type="text" style="display:inline;"-->
                       <!--input id="name" name="name"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;"-->
                       <label  style="text-align:right;"><?php echo $nome; ?></label>

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
                        

                     
                        <!--input id="datebirth" name="datebirth"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;"><span class="input-group-addon" style="display:inline;">dd/mm/yyyy</span-->
                        <label  style="text-align:right;"><?php echo $datebirth; ?></label>
                   
                    
                   
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
                     <div class="input">
                         <label  style="text-align:right;"><?php echo $nationality; ?></label>
                     </div>

                     <!--div id="brasileiro" class="input"  style="margin-bottom:-10px;display:inline-block;">
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
                     </div-->
                  </div>
                  <div><?php echo $conteudo; ?></div>

                     <!--div id="br" style="display:none;margin-bottom:15px;display:none;margin-left:200px;" >
                        
                           <label class="control-label" style="display:inline-block;">CPF:</label>
                           <input class="form-control" name="cpf" placeholder="" id="cpf"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-140px;margin-bottom:5px;"><br />
                           <label class="control-label" id="identify" style="display:inline-block;">Identity:</label>
                           <input class="form-control" name="identity" placeholder="" id="identity" checked="checked" type="label" style="display:inline;width:300px;margin-left:-140px;margin-bottom:5px;"><br />
                           <label class="control-label"  >Organ of Consultation:</label>
                           <input class="form-control" name="organofconsultation" placeholder="" id="organofconsultation" checked="checked" type="label" style="display:inline;width:300px;width:60px;margin-left:-50px;margin-bottom:5px;">
                           <label class="control-label" id="uf" style="margin-left:20px;margin-bottom:10px;">UF:</label>
                           <input class="form-control" name="uf" placeholder="" id="uf" checked="checked" type="label" style="display:inline;width:70px;display:inline;margin-left:-187px;margin-bottom:5px;">
                        
                     </div>

                     
                     
                     <div id="passaporte" style="display:none;margin-bottom:10px;display:none;margin-left:200px;" >
                        
                           <label class="control-label" style="display:inline-block;">Passaport:</label>
                           <input class="form-control" name="passaport" placeholder="" id="passaport"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;" >
                        
                     </div>

                       <div id="estrangeiro_residente" style="display:none;margin-bottom:10px;display:none;margin-left:200px;" >
                        
                           <label class="control-label" style="display:inline-block;">Passaport:</label>
                           <input class="form-control" name="passaportr" placeholder="" id="passaportr"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;margin-bottom:5px;" ><br />
                           <label class="control-label" style="display:inline-block;">CPF:</label>
                           <input class="form-control" name="cpfr" placeholder="" id="cpfr"  checked="checked" type="label" style="display:inline;width:300px;margin-left:-130px;margin-bottom:5px;" >

                        
                     </div-->

                    
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Address:</label><br>
                     <div class="input"  style="margin:left;">
                  <div id="linha">
                        <!--input id="address" name="address" placeholder="Address" class="input-xlarge" type="text"-->
                           <div class="input" style="margin-bottom:1px;">
                             <label class="control-label" name="address"  style="text-align:right;margin-right:-18px;display:inline;">Street:</label>
                             <label  style="text-align:right;margin-left:50px;"><?php echo $street; ?></label>
                          
                           <!--input id="street" name="street"  placeholder=" " class="form-control" type="text" style="width:360px;display:inline;margin-bottom:5px;margin-left:34px;"--><br />
                           
                           <label class="control-label" name="address"  style="text-align:right;margin-right:-18px;display:inline;">City:</label>      
                           <!--input id="city" name="city"  placeholder="" class="form-control" type="text" style="width:260px;margin-bottom:5px;display:inline;margin-left:46px;"-->
                            <label  style="text-align:right;margin-left:63px;"><?php echo $city; ?></label>           <br />               
                           <label class="control-label" name="address"  style="text-align:right;margin-right:-18px;display:inline;">Zip code:</label> 
                           <!--input id="zipcode" name="zipcode"  placeholder="" class="form-control" type="text" style="width:260px;margin-left:10px;margin-bottom:5px;display:inline;"-->
                            <label  style="text-align:right;margin-left:28px;"><?php echo $zipcode; ?></label>                 <br />          
                           <label class="control-label" name="address"  style="text-align:right;margin-right:-18px;display:inline;">State:</label>   
                           <!--input id="state" name="state"  placeholder="" class="form-control" type="text" style="width:260px;margin-bottom:5px;display:inline;margin-left:35px;"-->
                            <label  style="text-align:right;margin-left:57px;"><?php echo $state; ?></label> <br />
                            <label class="control-label" name="address"  style="text-align:right;margin-right:-18px;display:inline;">Country</label>      
                           <!--input id="country" name="country"  placeholder="" class="form-control" type="text" style="width:340px;margin-bottom:5px;display:inline;margin-left:18px;"-->
                            <label  style="text-align:right;margin-left:38px;"><?php echo $street; ?></label> <br />
                          

                             </div>
                     


                  </div>
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Contact telephone:</label>
                     <div class="input">
                        <label style="text-align:right;"><?php echo $telefone; ?></label>
                        
                        <!--input id="contacttelephone" name="contacttelephone"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;"-->
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Cell phone:</label>
                     <div class="input">
                         <label style="text-align:right;"><?php echo $celular; ?></label>
                         <!--input id="cellphone" name="cellphone"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;"-->
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Institution:</label>
                     <div class="input">
                         <label style="text-align:right;"><?php echo $institution; ?></label>
                        <!--input id="institution" name="institution"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;"-->
                     </div>
                  </div>
                  <!-- Select Basic -->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;">Position:</label>
              
                     <div class="input">
                        <label style="text-align:right;"><?php echo $position; ?></label>


                        <!--select id="position" name="position" class="form-control">
                           <option value="">...</option>
                           <option value="studentundergrad">Student Undergrad</option>
                           <option value="studentmsc">Student-Msc</option>
                           <option value="studentphd">Student-Phd</option>
                           <option value="posdoc">Post-Doc</option>
                           <option value="staff">Staff</option>
                        </select>
                     </div-->
                     </div>
                  </div>
                     <div>
                        <?php echo $orientador; ?>
                     </div>
                   <!-- Text input-->
                   
                   <!--div id="responsible">
                      <div class="control-group">

                        <label class="control-label" style="text-align:right;">Responsible:</label>
                     
                           
                        <div class="input" >
                  
                           <input id="responsible" name="responsible" placeholder="" class="form-control" style="width:340px;display:inline;margin-left:2px;" type="text">
                        </div>

                       
                     </div>
                     </div-->



                  <!-- Appended Input-->
                  <div class="control-group">
                     <label class="control-label" style="text-align:right;margin-right:20px;font-size:14px;margin-left:100px;display:inline;">User for Linea:</label>
                     <div class="input">
                        <label id='label_user' style="text-align:right;"><?php echo $user_for_linea; ?></label><input id='input_user' name='input_user'  type="text" class="form-control escondido" style="width:150px;"><span >@linea.gov.br</span>  <a href='#' id='edit' style='margin-left:10px;font-style:italic;'>Edit</a>
<a href='#' id='cancel_edit'  class='escondido' style='margin-left:10px;font-style:italic;'>Cancel </a>


                        



                     </div>

                     <!--div id="modify">
                          <div class="control-group">

                            <label class="control-label" style="text-align:right;">User:</label>
                     
                           
                            <div class="input" >
                  
                              <input id="usermodify" name="usermodify" placeholder="" class="form-control" style="width:340px;display:inline;margin-left:2px;" type="text">
                            </div>

                       
                          </div>
                        </div-->

                     <!--label class="control-label" style="text-align:right;margin-right:20px;font-size:14px;margin-left:80px;display:inline;">Wish to have an e-mail from Linea?</label>
                     
                     
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
                        
                           
                     </div-->
                  </div>
                  <!-- Text input-->
                  <div class="control-group" >
                     <label class="control-label" style="text-align:right;">Gmail:</label>
                     <div class="input" >
                        
                        <label style="text-align:right;"><?php echo $gmail; ?></label>
                    
                       <!--input id="alternativegmail" name="alternativegmail"  placeholder="" class="form-control" type="text" style="width:340px;display:inline;"-->

                     </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label" style="text-align:right;" >E-mail Contact:</label>
                     <div class="input" >
                        <!--input id="otheremail" name="otheremail" placeholder="" class="form-control" style="width:340px;display:inline;" type="text"-->

                        <label style="text-align:right;"><?php echo $email_contact; ?></label>
                    
                     </div>                   
                     
                  </div>

                  <!-- Select Basic -->
             <div class="control-group" >
			<label class="control-label" style="text-align:right; ">Project:</label>
				  <?php

                                         $result = mysql_query("SELECT * from project");
                                         $query_project =  "SELECT la.fk_project_id from project as ag left JOIN link_project as la  on la.fk_project_id=ag.id  where  la.fk_user_id='".$id."' ";
                                         $result2= mysql_query($query_project);
                                         $checkeds=array();
                                         while ($r=mysql_fetch_array($result2)){
                                             $checkeds[]=$r;
                                         }
                                         while ($ag=mysql_fetch_assoc($result)) {
                                             $checked="";
                                             foreach($checkeds as $ag_checked  ){
                                                 if ($ag_checked['fk_project_id'] ==$ag['id']){
                                                     $checked='checked';
                                                     break;
                                                 }
                                             }

                                             echo '<label class="checkbox" style="margin-left:212px;position:initial;margin-bottom:8px;">';
                                             echo  $ag['name'];
                                             echo  '<input name="project[]" value="' .$ag['id']. '" type="checkbox"  '.$checked.'>';
                                             echo  '</label>';

                                         }





                                         echo mysql_error();
                                        ?>



                  </div>
            </div>

<br>

        <ul id="myTab" class="nav nav-tabs" role="tablist" style="margin-left:50px;margin-bottom:30px;">
            <li class="active">
            <a href="#content0" role="tab" data-toggle="tab">Objectives</a>
          </li>
          <li>
            <a href="#content1" role="tab" data-toggle="tab">Access</a>
          </li>
          <li>
            <a href="#content2" role="tab" data-toggle="tab">Agenda</a>
          </li>
          <li>
            <a href="#content3" role="tab" data-toggle="tab">Twiki</a>
          </li>
          <li>
            <a href="#content4" role="tab" data-toggle="tab">Listas</a>
          </li>
        </ul>
    </div>
      


         <div id="myTabContent" class="tab-content">   
          <div class="tab-pane fade active in" id="content0">

       
              <!-- Multiple Checkboxes -->
                                                <!--div><php echo $outro;></div-->
                                     <?php

                                         $result = mysql_query("SELECT * from objectives ");
                                         $query_objectives =  "SELECT la.fk_objectives_id from objectives as ag left JOIN link_objectives as la  on la.fk_objectives_id=ag.id  where  la.fk_user_id='".$id."' ";
                                         $result2= mysql_query($query_objectives);
                                         $checkeds=array();
                                         while ($r=mysql_fetch_array($result2)){
                                             $checkeds[]=$r;
                                         }
                                         while ($ag=mysql_fetch_assoc($result)) {
                                             $checked="";
                                             foreach($checkeds as $ag_checked  ){
                                                 if ($ag_checked['fk_objectives_id'] ==$ag['id']){
                                                     $checked='checked';
                                                     break;
                                                 }
                                             }

                                             echo '<label class="checkbox" style="margin-left:80px;">';
                                             echo  $ag['name'];
                                             echo  '<input name="objectives[]" value="' .$ag['id']. '" type="checkbox"  '.$checked.'>';
                                             echo '<div id="help'.$ag['id'].'" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div><div class="quadrado" id="teste'.$ag['id'].'" style="display:inline;margin-top:-30px;">'.$ag['help'].'</div>';
                                             echo '</label>';

                                         }





                                         echo mysql_error();
                                        ?>
                                     
                                </div>

                               

                        
                                 <div class="tab-pane fade" id="content1">
                                     <!-- Multiple Checkboxes -->
                        
                           
                                                 <?php

                                                 $result = mysql_query("SELECT * from access_users ");
                                                 $query_access =  "SELECT la.fk_access_id from access_users as ag left JOIN link_access as la  on la.fk_access_id=ag.id  where  la.fk_user_id='".$id."' ";
                                                 $result2= mysql_query($query_access);
                                                 $checkeds=array();
                                                 while ($r=mysql_fetch_array($result2)){
                                                     $checkeds[]=$r;
                                                 }
                                                 while ($ag=mysql_fetch_assoc($result)) {
                                                     $checked="";
                                                     foreach($checkeds as $ag_checked  ){
                                                         if ($ag_checked['fk_access_id'] ==$ag['id']){
                                                             $checked='checked';
                                                             break;
                                                         }
                                                     }

                                                     echo '<label class="checkbox" style="margin-left:80px;">';
                                                     echo  $ag['name'];
                                                     echo  '<input name="access[]" value="' .$ag['id']. '" type="checkbox"  '.$checked.'>';
                                                    // echo '<div id="access'.$ag['id'].'" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div><div class="quadrado" id="help_access'.$ag['id'].'" style="display:inline;margin-top:-30px;">'.$ag['help'].'</div>';

                                                     echo '<div id="help_access'.$ag['id'].'" class="glyphicon glyphicon-question-sign" style="display:inline;color:#A0A0A0;"></div>';
                                                     echo '<div class="quadrado" id="access'.$ag['id'].'" style="display:inline;margin-top:-30px;">'.$ag['help'].'</div></label></td></tr>';
                                                     echo '</label>';

                                                 }

                                                 echo mysql_error();
                                                ?>
                                             </div>
                 
                     
                    
                        <!-- Multiple Checkboxes -->
                        <div class="tab-pane fade" id="content2">
                      
                                              <?php

                                              $result = mysql_query("SELECT * from agenda ");
                                              $query_agenda = "SELECT la.fk_agenda_id from agenda as ag left JOIN link_agenda as la  on la.fk_agenda_id=ag.id  where  la.fk_user_id='".$id."' ";
                                              $result2= mysql_query($query_agenda);
                                              $checkeds=array();
                                              while ($r=mysql_fetch_array($result2)){
                                                  $checkeds[]=$r;
                                              }
                                              while ($ag=mysql_fetch_assoc($result)) {
                                                  $checked="";
                                                  foreach($checkeds as $ag_checked  ){
                                                      if ($ag_checked['fk_agenda_id'] ==$ag['id']){
                                                          $checked='checked';
                                                          break;
                                                      }
                                                  }
                                                  echo '<label class="checkbox" style="margin-left:80px;">';
                                                  echo  $ag['name'];
                                                  echo  '<input name="agendalinea[]" value="' .$ag['id']. '" type="checkbox"  '.$checked.'>';
                                                  echo '</label>';
                                              }


                                              echo mysql_error();
                                             ?>
                          </div>

                             
                        <!-- Multiple Checkboxes -->

                        <div class="tab-pane fade" id="content3">
                       
      
                                                  <?php

                                                  $result = mysql_query("SELECT * from twiki ");
                                                  $query_twiki = "SELECT la.fk_twiki_id from twiki as ag left JOIN link_twiki as la  on la.fk_twiki_id=ag.id  where  la.fk_user_id='".$id."' ";
                                                  $result2= mysql_query($query_twiki);
                                                  $checkeds=array();
                                                  while ($r=mysql_fetch_array($result2)){
                                                      $checkeds[]=$r;
                                                  }
                                                  while ($ag=mysql_fetch_assoc($result)) {
                                                      $checked="";
                                                      foreach($checkeds as $ag_checked  ){
                                                          if ($ag_checked['fk_twiki_id'] ==$ag['id']){
                                                              $checked='checked';
                                                              break;
                                                          }
                                                      }
                                                      echo '<label class="checkbox" style="margin-left:80px;">';
                                                      echo  $ag['name'];
                                                      echo  '<input name="twiki[]" value="' .$ag['id']. '" type="checkbox"  '.$checked.'>';
                                                      echo '</label>';
                                                  }


                                                  echo mysql_error();
                                                  ?>
                                           
                          </div>
                  
                  <!-- Select Multiple -->
                  <div class="tab-pane fade" id="content4">
                  
                                              <?php

                                              $result = mysql_query("SELECT * from list ");
                                              $query_list = "SELECT la.fk_list_id from list as ag left JOIN link_list as la  on la.fk_list_id=ag.id  where  la.fk_user_id='".$id."' ";
                                              $result2= mysql_query($query_list);
                                              $checkeds=array();
                                              while ($r=mysql_fetch_array($result2)){
                                                  $checkeds[]=$r;
                                              }
                                              while ($ag=mysql_fetch_assoc($result)) {
                                                  $checked="";
                                                  foreach($checkeds as $ag_checked  ){
                                                      if ($ag_checked['fk_list_id'] ==$ag['id']){
                                                          $checked='checked';
                                                          break;
                                                      }
                                                  }
                                                  echo '<label class="checkbox" style="margin-left:80px;">';
                                                  echo  $ag['name'];
                                                  echo  '<input name="list[]" value="' .$ag['id']. '" type="checkbox"  '.$checked.'>';
                                                  echo '</label>';
                                              }


                                              echo mysql_error();
                                              ?>
              </div>
            </div>


                                          <div class="control-group" >
                     <label class="control-label" style="text-align:right;margin-top:80px;">Date of registration :</label>
                     <div class="input">
                         <label  style="text-align:right;"><?php echo $date_started; ?></label>
                     </div>
          </div>
           <div><?php echo $finaliza; ?></div>
          <div class="control-group" style="margin-bottom:20px;">
                     <label class="control-label" style="text-align:right;margin-top;-20px;">Status:</label>
                    
                    <div id="active" class="input"  style="margin-bottom:-10px;display:inline-block;">
                        <label class="radio" >
                        <input name="change_status" id="status" value="Active"  type="radio" style="display:inline;" <?php if($status_c =='Active'){ echo "checked"; } ?>>Active</label>
                     </div>

                     <div id="inactive" class="input" style="type:display:inline-block;margin-left:20px;margin-bottom:20px;">
                        <label class="radio" >  
                        <input name="change_status" id="status" value="Inactive" type="radio" style="display:inline;" <?php if($status_c =='Inactive'){ echo "checked"; } ?>>Inactive</label>
                     </div>

                     
                     <div id="desligado" style="display:none;margin-bottom:15px;display:none;margin-left:200px;" >
                        
                           <label class="control-label" style="display:inline-block;">Withdrawal date :</label>
                           <input  name="inativo"  id="inativo" placeholder="" class="form-control" type="text" style="width:340px;display:inline;margin-left:-80px;"><span class="input-group-addon" style="display:inline;">dd/mm/yyyy</span>
                           <!--label class="control-label" id="identify" style="display:inline-block;">Cause:</label>
                           <input class="form-control" name="identity" placeholder="" id="identity" checked="checked" type="label" style="display:inline;width:300px;margin-left:-80px;margin-bottom:20px;"><br /-->
                           
                        
                     </div>


          </div>

               
              <div id="idupdate"></div>
             <div id="dataupdate"></div>


                  <br />
                  <div class="control-group">
                     <label class="control-label" for="register"></label>
                     <div class="input" style="margin-left: -100px;margin-bottom:15px;">
                        <button id="submit" type="button" name="submit" class="btn btn-success" value="submit">Accept</button>
                        <button id="cancel" name="cancel" class="btn btn-inverse">Reject</button>
                     </div>
                  </div>
     
         <div id="idcadastro">

         


   <!--?php include 'function_insert.php' ?-->

      </form>
      </div>
      </div>


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


