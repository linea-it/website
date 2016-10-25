<?php

$db = mysql_select_db("test");
$query_id = ("SELECT id FROM  users ORDER BY id DESC LIMIT 1") or die(mysql_error());
$insert_id = mysql_query($query_id);
$identificacao = mysql_fetch_array($insert_id);

$id = $identificacao['id'];
//$id = $id + 1;



$url = "http://webdev.linea.gov.br/bootstrap/confirmation_register.php?id=".$id;
$url_id = "<a href=\"". $url . "\" ><font color='#cccccc'>".Permissions."</font></a>"; 

session_start();


//2 - resgatar o nome digitado no formulÃ¡rio e  grava na variavel $nome
$name=$_POST['name'];
$_SESSION['name']=$name;


$datebirth=$_POST['datebirth'];
$_SESSION['datebirth']=$datebirth;

$contacttelephone=$_POST['contacttelephone'];
$_SESSION['contacttelephone']=$contacttelephone;


$cellphone=$_POST['cellphone'];
$_SESSION['cellphone']=$cellphone;

//nacionalidade

//$nationality = $_POST['nationality'];
//$_SESSION['nationality']=$nationality;


$radio = $_POST["nationality"];
$_SESSION['nationality']=$radio;

// dados de brazilian

$cpf =$_POST["cpf"];
$_SESSION['cpf']=$cpf;

$identity= $_POST["identity"];
$_SESSION["identity"]=$identity;

$organ= $_POST["organofconsultation"];
$_SESSION["organofconsultation"]=$organ;

$uf =$_POST["uf"];
$_SESSION["uf"]=$uf;

//dados de foreign
$passaport = $_POST['passaport'];
$_SESSION['passaport']=$passaport;

//dados de foreign resident

$passaportr = $_POST['passaportr'];
$_SESSION['passaportr']=$passaportr;

$cpfr =$_POST["cpfr"];
$_SESSION['cpfr']=$cpfr;



    if ($radio == 'Brazillian'){
        $documents ="<tr>
                <td>Cpf:</td>
                <td><p class='align'>$cpf</p></td>
            </tr>
            <tr>
                <td>Identity:</td>
                <td><p class='align'>$identity</p></td>
            </tr>
	    <tr>
		<td>Organ of Consultation:</td>
		<td><p class='align'>$organ</td>
	    </tr>
            <tr>
                <td>UF:</td>
                <td><p class='align'>$uf</p></td>
            </tr>";

       
            
    }
    else if ($radio == 'Foreign'){
           $documents="<tr>
                <td>Passaport:</td>
                <td><p class='align'>$passaport</p></td>
            </tr>";

            


    }
    else if ($radio == 'Foreign Resident'){
          $documents="<tr>
                <td>Passaport:</td>
                <td><p class='align'>$passaportr</p></td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td><p class='align'>$cpfr</p></td>
            </tr>";
                  
    }

     //echo "DOCUMENTOS: ". $documents;


//$_SESSION['access']=$access;

//$snationality = "";
//foreach( $nationality  as $vN  )
//{
 // $snationality = $snationality .$vN.', ';

     
//}


 //brazilian
///$cpf=$_POST['cpf'];
//$_SESSION['cpf']=$cpf;

//$identify=$_POST['identify'];
//$_SESSION['identify']=$identify;

//$organofconsultation=$_POST['organofconsultation'];
//$_SESSION['organofconsultation']=$organofconsultation;

//$uf=$_POST['uf'];
//$_SESSION['uf']=$uf;

//Foreign

//$passaport=$_POST['passaport'];
//$_SESSION['passaport']=$passaport;

//Foreign Resident

//$passaportr=$_POST['passaportr'];
//$_SESSION['passaportr']=$passaportr;

//$cpfr=$_POST['cpfr'];
//$_SESSION['cpfr']=$cpfr;

//função de nacionalidades 
//$nationality0=$_POST['nationality0'];
//$_SESSION['nationality0']=$nationality0;

//$nationality1=$_POST['nationality-1'];
//$_SESSION['nationality1']=$nationality1;

//$nationality2=$_POST['nationality-2'];
//$_SESSION['nationality2']=$nationality2;


//function nationality($nationality0,$nationality1,$nationality2)
//{



//}
   
                                   




//endereço

$street=$_POST['street'];
$_SESSION['street']=$street.', ';


$city=$_POST['city'];
$_SESSION['city']=$city.', ';

$zipcode=$_POST['zipcode'];
$_SESSION['zipcode']=$zipcode.', ';

$state=$_POST['state'];
$_SESSION['state']=$state.', ';

$country=$_POST['country'];
$_SESSION['country']=$country.'.';





$institution= $_POST['institution'];
$_SESSION['institution']=$institution;

$responsible= $_POST['responsible'];
$_SESSION['responsible']=$responsible;

$position=$_POST['position'];
$_SESSION['position']=$position;

$emaillinea=$_POST['emaillinea'];
$_SESSION['emaillinea']=$emaillinea;

$alternativegmail=$_POST['alternativegmail'];
$_SESSION['alternativegmail']=$alternativegmail;

$otheremail=$_POST['otheremail'];
$_SESSION['otheremail']=$otheremail;

$project=$_POST['project'];
$_SESSION['project']=$project;

//testando






$objectives=$_POST['objectives'];
$_SESSION['objectives']=$objectives;

$sObjectives = "";
foreach( $objectives  as $vO  )
{
  $sObjectives = $sObjectives .$vO.', ';

     
}



$other=$_POST['other'];
$_SESSION['other']=$other;


$access=$_POST['access'];
$_SESSION['access']=$access;

$sAccess = "";
foreach( $access  as $vA  )
{
  $sAccess = $sAccess .$vA.', ';
     
}

$agendalinea=$_POST['agendalinea'];
$_SESSION['agendalinea']=$agendalinea;

$sAgendalinea = "";
foreach( $agendalinea  as $vAg  )
{
  $sAgendalinea = $sAgendalinea .$vAg.', ';
     
}



$twiki=$_POST['twiki'];
$_SESSION['twiki']=$twiki;
//var_dump($twiki);

$sTwiki = "";
foreach( $twiki  as $vT  )
{
   $sTwiki = $sTwiki .$vT.', ';
   
     
}
//var_dump($sTwiki);

$emaillist=$_POST['emaillist'];
$_SESSION['emaillist']=$emaillist;
//var_dump($twiki);

$sEmaillist = "";
foreach( $emaillist  as $vE  )
{


   $sEmaillist = $sEmaillist .$vE.', ';
    //$test = '<ul><li>',$sEmaillist,'</li></ul>';
     
}

//1 â€“ Definios Para quem vai ser enviado o email
$para = $otheremail;

$assunto .="Confirma&ccedil;&atilde;o de cadastro no LIneA";
//$mensagem .="<br><br><strong>Objetivo Principal:</strong>".$selecione4[$i];

$mensagem .="<html>
                <head>    <style>
            body {
                margin: 0;
                padding: 0 170px;
                position:center;
            }
            table {
                width: 600px;
                font-size: 13px;
                border-radius: 25px 25px 25px 25px;
            }
            table thead tr:first-child th:first-child {
                border-top-right-radius: 5px;
                border-top-left-radius: 5px;
                -moz-border-top-right-radius: 5px;
                -webkit-border-top-right-radius: 5px;


                 padding: 5px; 
            }
            table thead th {
                background-color: #555;
                text-align: left;
                color: #FFFFFF;
                font-family: sans-serif;
                font-size: 18px;
            }
            table td {
                padding: 1px 60px 10px;
            }
            table tfoot {
                background-color: #555;
                
                
            }
            .tbody{
            	 border-bottom-right-radius: 5px;
  				border-bottom-left-radius: 5px;
  				-moz-border-bottom-right-radius: 5px;
  				-webkit-border-bottom-left-radius: 5px;
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
            	font-size:14px;

            }
            th{

            	font-color:#000000;
            }
        </style>
      <title>Confirmation of Register</title>
        </head>
        <body>
        <table cellspacing='0'>
            <thead>
                <tr><th style='padding-left:160px;background-color:#727272;'>Confirma&ccedil;&atilde;o de cadastro</th></tr>
            </thead>
            <tbody class='tbody' style='background-color: #C8C8C8;' >
            <tr>
            <td>
        	<br><br>Caro $name <br>
			Obrigado por se cadastrar em nosso site.<br><br>
				N&oacute;s estamos provid&ecirc;nciando seu registro em nosso sistema.<br>
			IT Team.  <br>
			<a href='http://www.linea.gov.br'>LineA.</a>
			</td></tr>
			</tbody>
			</table></body></html>";
        $html="";
//5 â€“ agora inserimos as codificaÃ§Ãµes corretas e  tudo mais.
$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From:  Register LIneA<itteam@linea.gov.br>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender:  <ana.marcela@linea.gov.br\n"; //email do servidor //que enviou
$headers .= "X-Mailer: PHP v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <ana.marcela@linea.gov.br>\n"; //caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";
                                       
$eu="ana.marcela@linea.gov.br";
$subject="New Solicitation of User";




/*if($name == $nome){*/
$message="<html><head>  
        <style>
            body {
                margin: 0;
                padding: 0 170px;
                position:center;
            }
            table {
                width: 700px;
                font-size: 13px;
                border-radius: 25px;
            }
            table thead tr:first-child th:first-child {
                border-top-right-radius: 5px;
                border-top-left-radius: 5px;
                -moz-border-top-right-radius: 5px;
                -webkit-border-top-right-radius: 5px;
                 padding: 5px;
            }
            table td {
                padding: 5px 20px 10px;
                text-align: left;
            }

             table thead th {
                background-color: #555;
                text-align: left;
                color: #FFFFFF;
                font-family: sans-serif;
                font-size: 18px;
            }
            table tfoot {
                background-color: #555;


            }
            .tbody{
                 border-bottom-right-radius: 5px;
                border-bottom-left-radius: 5px;
                -moz-border-bottom-right-radius: 5px;
                -webkit-border-bottom-left-radius: 5px;
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
                font-size:14px;

            }
            th{

                font-color:#000000;
            }
            .align{

                display:inline-block;
                text-align: left;
            }
  

        </style>
        <title></title>
        </head>
        <body>
        <table cellspacing='0'>
            <thead>
                <tr><th style='padding-left:260px;background-color:#727272;' colspan='4' >New Solicitation of User</th></tr>
            </thead>
            <tbody class='tbody' style='background-color:#C8C8C8;' >
            <tr>
                
                <td>Name:</td>
                <td><p class='align'>$name</p></td>
                
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><p class='align'>$datebirth</p></td>
            </tr>
            <tr>
                <td>Nacionality:</td>
                <td><p class='align'>$radio </p></td>
            </tr>
                ".$documents."
            <tr>
                <td>Address:</td>
                <td><p class='align'>$street  $city </p>  <p class='align'>$zipcode  $state  $country</p></td>
            </tr>
            <tr>
            	<td>Telephone contact:</td>
                <td><p class='align'>$contacttelephone</p></td>
            </tr>
            <tr>
            	<td>Cellphone:</td>
                <td><p class='align'>$cellphone</p></td>
            </tr>
            <tr>
            	<td>Instituition:</td>
                <td><p class='align'>$institution</p></td>
            </tr>
            <tr>
            	<td>Responsible:</td>
                <td><p class='align'>$responsible</p></td>
            </tr>
            <tr>
            	<td>Position:</td>
                <td><p class='align'>$position</p></td>
            </tr>
            <tr>            	<td>User for email LineA:</td>
                <td><p class='align'>$emaillinea</p></td>
            </tr>
            <tr>
            	<td>Gmail:</td>
                <td><p class='align'>$alternativegmail</p></td>
            </tr>
            <tr>
            	<td>email contact:</td>
                <td><p class='align'>$otheremail</p></td>
			</tr>
            <tr>
                      <td></td>
                     <td></td>
            </tr>
		    
			</tbody>
			<tfoot>
                <tr>
                    <th style='margin-left-250px;background-color:#727272;' colspan='4' >


                        <span style='font-size:13px;color:#CCCCCC;'>Select  <a href='http://webdev.linea.gov.br/bootstrap/creationofticket.php'><font color='#cccccc'>Okay</font></a>   <font color='#cccccc'>or</font>  $url_id :<!--a href='http://webdev.linea.gov.br/bootstrap/confirmation_register.php?$id' target='_blank' --> <!--font color='#cccccc'>Failing</font></a--></span></th>
                </tr>
                
               
            </tfoot>

			</table>
			
     		</body></html>";


//echo $message;
           

/*
    
}else {

   $message="<html><head>  
        <style>
            body {
                margin: 0;
                padding: 0 170px;
                position:center;
            }
            table {
                width: 700px;
                font-size: 13px;
                border-radius: 25px;
            }
            table thead tr:first-child th:first-child {
                border-top-right-radius: 5px;
                border-top-left-radius: 5px;
                -moz-border-top-right-radius: 5px;
                -webkit-border-top-right-radius: 5px;
                 padding: 5px;
            }
            table td {
                padding: 5px 20px 10px;
                text-align: left;
            }

             table thead th {
                background-color: #555;
                text-align: left;
                color: #FFFFFF;
                font-family: sans-serif;
                font-size: 18px;
            }
            table tfoot {
                background-color: #555;


            }
            .tbody{
                 border-bottom-right-radius: 5px;
                border-bottom-left-radius: 5px;
                -moz-border-bottom-right-radius: 5px;
                -webkit-border-bottom-left-radius: 5px;
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
                font-size:14px;

            }
            th{

                font-color:#000000;
            }
            .align{

                display:inline-block;
                text-align: left;
            }
  

        </style>
        <title>Registration confirmation‏</title>
        </head>
        <body>
        <table cellspacing='0'>
            <thead>
                <tr><th style='padding-left:260px;background-color:#727272;' colspan='4' >New Solicitation of User</th></tr>
            </thead>
            <tbody class='tbody' style='background-color:#C8C8C8;' >
            <tr>
                
                <td>Error in database , wasnt possible the register in database.</td>
                
                
            </tr>
          
            </table>
            
            </body></html>";
}
*/


mail($para, $assunto, $mensagem, $headers);//funÃ§Ã£o que faz o envio do email.
mail($eu, $subject, $message, $headers);

//header ("location: http://webdev.linea.gov.br/bootstrap/register.php");

// enviando email para chefia  com as informações dos cadastrados
echo mysql_error();
?>
