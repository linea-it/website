<?php



// Inclui o arquivo que faz a conexão ao MySQL
require_once("conexao.php");




//include("mensagem.php");
//include ("confirmation_resgister.php");

// Definição das variáveis para montar a queryklklkl

$name = $_POST['name'];

$datebirth = $_POST['datebirth'];
if (!empty($datebirth)){
$time = strtotime($datebirth);
$date_of_birth = ($time === false) ? NULL : date('Y/m/d H:i:s', $time);
}else
{

	$date_of_birth = NULL;
}




$nationality = $_POST["nationality"]; 



//$address =  ($street  . $city . $zipcode . $state . $country);
$street=$_POST['street'];
$city=$_POST['city'];
$zipcode=$_POST['zipcode'];
$state=$_POST['state'];
$country=$_POST['country'];


//fim de address

$contacttelephone=($_POST['contacttelephone']);
$pontos = array(",", ".","(",")","-"," ");
$contacttelephone_a= str_replace($pontos,"",$contacttelephone);

$cellphone=($_POST['cellphone']);
$pontuacao = array(",","(",")","-"," ");
$cellphone_a = str_replace($pontuacao,"",$cellphone);
//echo 'celular:'.$cellphone_a;
//echo "telefone:".$contacttelephone_a;
//echo 'telefpone:'.rtrim($contacttelephone,"(");
$institution= $_POST['institution'];
$position=$_POST['position'];
$responsible= $_POST['responsible'];
$emaillinea=$_POST['emaillinea'];
$alternativegmail=$_POST['alternativegmail'];
$otheremail=$_POST['otheremail'];





//$_SESSION['twiki']=$twiki;



$other=$_POST['other'];

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

date_default_timezone_set('America/Sao_Paulo');
$date_started = date('Y/m/d');


$status_change = $_POST["status"];

$date_final = $_POST["inativo"];
$dateend = strtotime($date_final);
$date_end = ($dateend === false) ? '0000-00-00' : date('Y/m/d ', $dateend);

// inserindo dados do usuario
$query = "INSERT INTO `users` (name, date_of_birth, nationality, street, city, zipcode, state, country, telephone, cell_phone, instituition, position, responsible, user_for_linea, gmail, email_contact, other) VALUES ('".$name."', '".$date_of_birth."', '".$nationality."','".$street."','".$city."','".$zipcode."','".$state."','".$country."','".$contacttelephone_a."','".$cellphone_a."','".$institution."','".$position."','".$responsible."','".$emaillinea."','".$alternativegmail."','".$otheremail."','".$other."')";
$insert_users = mysql_query($query);

$id = ("SELECT id FROM  users ORDER BY id DESC LIMIT 1") or die(mysql_error());
$select_id = mysql_query($id);
$last_id = mysql_fetch_array($select_id);


//echo nacionalidade;
if ($radio == 'Brazillian'){

$query_br = "INSERT INTO  `doc_users` (id,cpf_br, identify_br, organ_of_cons_br, uf_br, fk_users_id) VALUES ('".$last_id['id']."','".$cpf."','".$identity."','".$organ."','".$uf."','".$last_id['id']."')";
$insert_br = mysql_query($query_br);
}
elseif ($radio == 'Foreign'){
$query_fn = "INSERT INTO  `doc_users` (id,passaport_fo, fk_users_id) VALUES ('".$last_id['id']."','".$passaport."','".$last_id['id']."')";
$insert_fn = mysql_query($query_fn);	

}
elseif ($radio == 'Foreign Resident'){
$query_fr = "INSERT INTO  `doc_users` (id,passaport_rf, cpf_rf, fk_users_id) VALUES ('".$last_id['id']."','".$passaportr."','".$cpfr."','".$last_id['id']."')";
$insert_fr = mysql_query($query_fr);
}
elseif ($radio==""){
//echo "<script>alert('Nationality was not chosen');</script>";
}
//$edit_user =$_POST["input_user"];
//$edit_user = $_POST["input_user"];

//if($edit_user!=''){

//$query_edituser = ("UPDATE users as u, link as l SET user_for_linea=$edit_user where l.fk_users_id='$id'");
//("UPDATE users SET user_for_linea='".$edit_user."' where id='$id'");
//$query_edit = mysql_query($query_edituser);
//}

//adcionando chave estrangeira



$query_fk_link = "INSERT INTO `link` (fk_users_id) VALUES ('".$last_id['id']."')";
$insert_fk = mysql_query($query_fk_link);




//adicionando os checkbox na tabela objectives
//$project=$_POST['project'];

if(!empty($_POST['project'])) {
foreach($_POST['project'] as $userid)
    {
         $query_project = "INSERT INTO `link_project` (fk_user_id,fk_project_id)  VALUES ('".$last_id['id']."','".$userid."')" or die ('Error posting data');
	$insert_project = mysql_query($query_project);
    }

}


if(!empty($_POST['objectives'])) {
foreach($_POST['objectives'] as $userID)
    {
         $query_objectives = "INSERT INTO `link_objectives` (fk_user_id,fk_objectives_id)  VALUES ('".$last_id['id']."','".$userID."')" or die ('Error posting data');
	$insert_objectives = mysql_query($query_objectives);
    }

}

if(!empty($_POST['twiki'])) {
foreach($_POST['twiki'] as $userID5)
    {
         $query_objectives = "INSERT INTO `link_twiki` (fk_user_id,fk_twiki_id)  VALUES ('".$last_id['id']."','".$userID5."')" or die ('Error posting data');
	$insert_objectives = mysql_query($query_objectives);
    }

}

if(!empty($_POST['agendalinea'])) {
foreach($_POST['agendalinea'] as $userID2)
    {
         $query_objectives = "INSERT INTO `link_agenda` (fk_user_id,fk_agenda_id)  VALUES ('".$last_id['id']."','".$userID2."')" or die ('Error posting data');
	$insert_objectives = mysql_query($query_objectives);
    }

}

if(!empty($_POST['emaillist'])) {
foreach($_POST['emaillist'] as $userID3)
    {
         $query_objectives = "INSERT INTO `link_list` (fk_user_id,fk_list_id)  VALUES ('".$last_id['id']."','".$userID3."')" or die ('Error posting data');
	$insert_objectives = mysql_query($query_objectives);
    }

}

if(!empty($_POST['access'])) {
foreach($_POST['access'] as $userID4)
    {
         $query_objectives = "INSERT INTO `link_access` (fk_user_id,fk_access_id)  VALUES ('".$last_id['id']."','".$userID4."')" or die ('Error posting data');
	$insert_objectives = mysql_query($query_objectives);
    }

}






$date_end='0000-00-00';
$status='Ativo';

//inserindo dados de status do usuario
$query_status = "INSERT INTO `status_users` (date_started,date_end,status,fk_users_id) VALUES ('".$date_started."','".$date_end."','".$status."','".$last_id['id']."')";
$insert_status = mysql_query($query_status);




//adicionando os checkboxs na tabela acecss

/*
$access=$_POST['access'];
$_SESSION['access']=$access;
//$sAccess = "";
foreach( $access  as $vA  )
{
  //$sAccess = $vA;
	$query_access = "INSERT INTO `link_access` (fk_user_id,fk_access_id)  VALUES (".$last_id['id']."','".$vA."')";
	$insert_access = mysql_query($query_access);
}
//adicionando os checkbos na tabela agenda

$agendalinea=$_POST['agendalinea'];
//$sAgendalinea = "";
foreach( $agendalinea  as $vAg  )
{
  //$sAgendalinea = $vAg;
	$query_agenda = "INSERT INTO `link_agenda` (fk_user_id,fk_agenda_id)  VALUES (".$last_id['id']."','".$vAg."')";
	$insert_agenda = mysql_query($query_agenda);
}
//adicionando os checkbos na tabela twiki

$twiki=$_POST['twiki'];
//$sTwiki = "";
foreach( $twiki  as $vT  )
{
   //$sTwiki = $vT;
	$query_twiki = "INSERT INTO `link_twiki` (fk_user_id,fk_twiki_id)  VALUES (".$last_id['id']."','".$vT."')";
	$insert_twiki = mysql_query($query_twiki);
	echo "</script>alert('TWIKI'.'".$vT."')</script>";
}
//adicionando os checkbocs na tabela list



$emaillist=$_POST['emaillist'];
//$sEmaillist = "";
foreach( $emaillist  as $vE  )
{


  // $sEmaillist =$vE;
	$query_list = "INSERT INTO `link_list` (fk_user_id,fk_list_id)  VALUES (".$last_id['id']."','".$vE."')";
	$insert_list = mysql_query($query_list);
}*/


//status






 //fk_objetivo_id, fk_agenda_id, fk_access_id,  pk_twiki, fk_list_id


//status

//status
/*
$status_change = $_POST["status"];
$date_final = $_POST["inativo"];
if ($status_change != 'Active' ){
  $query_inativo = ("UPDATE users SET status='Inactive' , date_end='$date_final'  WHERE id='125'");
  $insert_inativo = mysql_query($query_inativo);
}
else if($status_change =='Active')
{
 $query_ativo = ("UPDATE users SET status='Active' , date_end=''  WHERE id='125'");
 $insert_ativo = mysql_query($query_ativo);
 
}*/




/*

if ($status_change !='')
{
		if ($status_change != 'Ativo' ){
		  $query_status =("UPDATE status_users SET status='Inativo' like id='$id'");
		  $insert_status = mysql_query($query_status);


		}
		else if ( $status_change !='Inativo'){
			//$query_status = ("INSERT INTO status_users (status) VALUES ('Ativo')");
			$query_status = ("UPDATE status_users SET status='Ativo' where id='$id'");
			$insert_status = mysql_query($query_status);
			

		}
//else if  ($status_change ==''){
	//$query_status = ("UPDATE users SET status='Active' , date_end=''  WHERE id='185'");
	//$insert_status = mysql_query($query_status);
}*/

//UPDATE do user_for_linea




//$dateend=$_POST['inativo'];

//$dateend = date("Y-m-d", strtotime($dateend));
//$timeend = strtotime($dateend);
//$date_end = ($time === false) ? '0000-00-00' : date('Y-m-d', $timeend);





//$query_br = "INSERT INTO  `doc_users` (id) VALUES ('".$id."')";
//$insert_br = mysql_query($query_br);
// Executa a query
/*
$inserir = mysql_query($query);

$query_select = ("SELECT * from doc_users where id='10'") or die(mysql_error());
$insert_select = mysql_query($query_select);

while($array = mysql_fetch_array($insert_select))
{
  //mostra na tela o nome e a data de nascimento
  echo 'SELECT:'.$array['passaport_fo']."<br />";
}*/


if ($inserir_fr) {
//echo "Notícia inserida com sucess $dateofbirth";
//echo 'ok';

} else {
//echo  "<script>alert('Ocorreu um erro ao salvar sueus dados.');</script>";
//echo "Exibe dados sobre o erro:";
}
//if ($radio==""){
//echo "<script>alert('Nationality was not chosen');</script>";

//}


//echo $insert_fr;

echo mysql_error();



?>

