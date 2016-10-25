<?php
// Inclui o arquivo que faz a conexão ao MySQL
require_once("conexao.php");
//include ("confirmation_resgister.php");

// Definição das variáveis para montar a query
session_start();


//esta ok nao mexer ...pegando  id do link na mensagem
$id =$_POST['id_user'];
//echo "ID_update:".$id;



$emaillinea=$_POST['emaillinea'];
$alternativegmail=$_POST['alternativegmail'];
$otheremail=$_POST['otheremail'];


$objectives=$_POST['objectives'];


/*$sObjectives = "";
foreach( $objectives  as $vO  )
{
  $sObjectives = $sObjectives .$vO.', ';

}

$other=$_POST['other'];

$access=$_POST['access'];
$_SESSION['access']=$access;
$sAccess = "";
foreach( $access  as $vA  )
{
  $sAccess = $sAccess .$vA.', ';

}


$agendalinea=$_POST['agendalinea'];
$sAgendalinea = "";
foreach( $agendalinea  as $vAg  )
{
  $sAgendalinea = $sAgendalinea .$vAg.', ';

}


$twiki=$_POST['twiki'];
$sTwiki = "";
foreach( $twiki  as $vT  )
{
   $sTwiki = $sTwiki .$vT.', ';


}

$emaillist=$_POST['emaillist'];
$sEmaillist = "";
foreach( $emaillist  as $vE  )
{


   $sEmaillist = $sEmaillist .$vE.', ';

}
//nationality

$radio = $_POST["nationality"];
$_SESSION['nationality']=$radio;


//NATIONALITY == BRAZILLIAN

$cpf =$_POST["cpf"];
$identity = $_POST["identity"];
$organ= $_POST["organofconsultation"];
$uf =$_POST["uf"];
//NATIONALITY == Foreign

$passaport= $_POST["passaport"];

//NATIONALITY ==  Foreign Resident

$passaportr = $_POST["passaportr"];

$cpfr =$_POST["cpfr"];
*/




date_default_timezone_set('America/Sao_Paulo');
$date_started = date('Y/m/d');


$status_change = $_POST["change_status"];

$date_final = $_POST["inativo"];
$dateend = strtotime($date_final);
$date_end = ($dateend === false) ? '0000-00-00' : date('Y/m/d ', $dateend);





$db = mysql_select_db("test");


$edit_user = $_POST["input_user"];
$edit_telefone = $_POST["input_telefone"];
$edit_celular = $_POST["input_celular"];
//edit_post

if($edit_user!=""){

$query_edituser = ("UPDATE users  SET user_for_linea='".$edit_user."' where id='".$id."'");
//("UPDATE users SET user_for_linea='".$edit_user."' where id='$id'");
$query_edit = mysql_query($query_edituser);
}


if($edit_telefone!=""){

$query_edittelefone = ("UPDATE users  SET telephone='".$edit_telefone."' where id='".$id."'");
//("UPDATE users SET user_for_linea='".$edit_user."' where id='$id'");
$query_edit = mysql_query($query_edittelefone);
}

if($edit_celular!=""){

$query_editcelular = ("UPDATE users  SET cell_phone='".$edit_celular."' where id='".$id."'");
//("UPDATE users SET user_for_linea='".$edit_user."' where id='$id'");
$query_edit = mysql_query($query_editcelular);
}





//inserind project escolhinho pelo administrator
$project=$_POST['project'];


$query_project = ("DELETE  from link_project where fk_user_id=".$id);
$insert_project = mysql_query($query_project);
foreach ($project as $p ){

    $query_project= "INSERT into link_project (fk_user_id,fk_project_id) VALUES('".$id."','".$p."')";
    $update_project = mysql_query($query_project);
    //echo $query_objectives.'<br>';
}




//inserindo objectives escolhidos pelo ususario
$objectives = $_POST['objectives'];

$query_objectives = ("DELETE  from link_objectives where fk_user_id=".$id);
$insert_objectives = mysql_query($query_objectives);
foreach ($objectives as $o ){

    $query_objectives= "INSERT into link_objectives (fk_user_id,fk_objectives_id) VALUES('".$id."','".$o."')";
    $update_objectives = mysql_query($query_objectives);
    //echo $query_objectives.'<br>';
}



//inserindo access escolhidos pelo ususario
$access = $_POST['access'];

$query_access = ("DELETE  from link_access where fk_user_id=".$id);
$insert_access = mysql_query($query_access);
foreach ($access as $a ){

    $query_access= "INSERT into link_access (fk_user_id,fk_access_id) VALUES('".$id."','".$a."')";
    $update_access = mysql_query($query_access);
    //echo $query_access.'<br>';
}




//inserindo agenda_linea escolhida pelo usuario

$agenda = $_POST['agendalinea'];

$query_agenda = ("DELETE  from link_agenda where fk_user_id=".$id);
$insert_agenda = mysql_query($query_agenda);
foreach ($agenda as $ag ){

    $query_agenda= "INSERT into link_agenda (fk_user_id,fk_agenda_id) VALUES('".$id."','".$ag."')";
    $update_agenda = mysql_query($query_agenda);
    //echo $query_agenda.'<br>';
}




//inserindo twiki encolhido pelo usuario
$twiki = $_POST['twiki'];

$query_twiki  = ("DELETE  from link_tiwki where fk_user_id=".$id);
$insert_twiki  = mysql_query($query_twiki );
foreach ($twiki  as $t ){

    $query_twiki = "INSERT into link_twiki (fk_user_id,fk_twiki_id) VALUES('".$id."','".$t."')";
    $update_twiki  = mysql_query($query_twiki);
    //echo $query_twiki .'<br>';
}


//inserindo email_lint escolhido pelo usuario
$list = $_POST['list'];

$query_list  = ("DELETE  from link_list where fk_user_id=".$id);
$insert_list  = mysql_query($query_list );
foreach ($list  as $l ){

    $query_list= "INSERT into link_list (fk_user_id,fk_list_id) VALUES('".$id."','".$l."')";
    $update_list  = mysql_query($query_list);
    //echo $query_list .'<br>';
}


//atualizando o campo other digitado pelo administrator
/*
$query_other = ("DELETE  from users where id=".$id);
$delete_other = mysql_query($query_other);

foreach ($other as $ot ){

	$query_other= "INSERT into users (other) VALUES('".$ot."')";
	$update_other = mysql_query($query_other);


	
}*/

date_default_timezone_set('America/Sao_Paulo');
$date_started = date('Y/m/d');


$status_change = $_POST["change_status"];


//data de saida
$date_end = $_POST["inativo"];
$date_us=explode('/',$date_end);
$date_end=$date_us[2].'-'.$date_us[1].'-'.$date_us[0];




if ($status_change !=" ")
{
		if ($status_change != 'Ativo' ){
		  $query_status =("UPDATE status_users   SET status='".$status_change."' , date_end='".$date_end."'   where fk_users_id='".$id."'");

		  	
		  $insert_status = mysql_query($query_status);


		}
		else if ( $status_change !='Inativo'){
			//$query_status = ("INSERT INTO status_users (status) VALUES ('Ativo')");
			$query_status = ("UPDATE status_users as u, link as l SET status='".$status_change."' , date_end='0000-00-00' where l.fk_users_id='".$id."'");
			$insert_status = mysql_query($query_status);
			

		}

}






echo mysql_error();


?>

