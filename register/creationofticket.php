<?php

require_once("conexao.php");
/*$query_id = ("SELECT id  FROM  users ORDER BY id DESC LIMIT 1") or die(mysql_error());
$insert_id = mysql_query($query_id);
$identificacao = mysql_fetch_array($insert_id);

$id = $identificacao['id'];*/

$id =$_POST['id_user'];
$query_users = ("SELECT *  FROM  users where id=".$id) or die(mysql_error());
$select_users  = mysql_query($query_users);
$users = mysql_fetch_array($select_users);



$url = "http://webdev.linea.gov.br/bootstrap/confirmation_register.php?id=".$id;
$url_id = "<a href=\"". $url . "\" ><font color='#cccccc'>".Permissions."</font></a>";


$email_contact = $users['email_contact'];
//echo $email_contact;
$para='ana.marcela@linea.gov.br';//colocar aqui o email do helpdesk@linea.gov.br
$subject="Register new User";




$message="";
$message .="<html><head>
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
        <table id='notification' cellspacing='0'>
            
            <tbody class='tbody' >";
$message .="<tr><td></td></tr>";
$message .="<tr><td></td></tr>";

$query_name = ("SELECT * from users where id=".$id);
$select_user = mysql_query($query_name);
$array_user = mysql_fetch_array($select_user);

$name = $array_user['name'];
$user_linea = $array_user['user_for_linea'];

$message .="<tr>";
$message .="<td>Create permissions of access for $name :</td></tr>";
//$message .="<td><p class='align'></p></td><";

$message .="<tr><td>User : $user_linea </td></tr>";


$message .= "<tr><td>Objectives:";
$x=0;
for ($x=1; $x<=4; $x++) {

    $query_objectives = ("SELECT name from objectives as lo left JOIN link_objectives as l  on l.fk_objectives_id=lo.id  where  l.fk_user_id='".$id."' and lo.id=".$x);
    $select_objectives = mysql_query($query_objectives);
    $array_objectives = mysql_fetch_array($select_objectives);


    $name_objectives =  $array_objectives['name'];
    $message .=$name_objectives."  ";

}


$message .="</td></tr>";
//$message .="<td><p class='align'>";

$message .= "<tr><td>Access:";

$a=0;
for ($a=1; $a<=4; $a++) {

    $query_access = ("SELECT name from access_users as a left JOIN link_access as l  on l.fk_access_id=a.id  where  l.fk_user_id='".$id."'  and a.id='".$a."'") or die(mysql_error());
    $select_access= mysql_query($query_access);
    $access = mysql_fetch_array($select_access);
    $name_access = $access['name'];


    $message .=$name_access." ";
    //if(!empty($name_access)){

    // <td><p class='align'>'".$name_access."'</p></td></tr>";

    //}

}

$message .="</td></tr>";


$message .= "<tr><td>Agenda LineA:";

$ag=0;
for ($ag=1; $ag<=4; $ag++) {

    $query_agenda = ("SELECT name from agenda as ag left JOIN link_agenda as la  on la.fk_agenda_id=ag.id  where  la.fk_user_id='".$id."'  and ag.id='".$ag."'") or die(mysql_error());
    $select_agenda= mysql_query($query_agenda);
    $agenda = mysql_fetch_array($select_agenda);
    $name_agenda= $agenda['name'];


    $message .=$name_agenda." ";
}

$message .= "</td></tr>";
//$message .= "<td><p class='align'>'".$name_agenda."'</p></td></tr>";

$message .= "<tr><td>Twiki:";

$t=0;
for ($t=1; $t<=4; $t++) {

    $query_twiki = ("SELECT name from twiki as t left JOIN link_twiki as lt  on lt.fk_twiki_id=t.id  where  lt.fk_user_id='".$id."'  and t.id='".$t."'") or die(mysql_error());
    $select_twiki= mysql_query($query_twiki);
    $twiki = mysql_fetch_array($select_twiki);
    $name_twiki = $twiki['name'];

    $message .= $name_twiki;
    $message .=" ";
}

$message .="</td></tr>";
//$message .="<td><p class='align'>'".$name_twiki."'</p></td></tr>";

$message .= "<tr><td>Email list:";
$message .=" ";


$e=0;
for ($e=1; $e<=4; $e++) {

    $query_emaillist = ("SELECT name from list as l left JOIN link_list as ll  on ll.fk_list_id=l.id  where  ll.fk_user_id='".$id."'  and l.id='".$e."'") or die(mysql_error());
    $select_emaillist= mysql_query($query_emaillist);
    $emaillist = mysql_fetch_array($select_emaillist);
    $name_emaillist = $emaillist['name'];


    $message .=$name_emaillist." ";

}

$message .="</td></tr>";

//$message .="<td><p class='align'>'".$name_emaillist."'</p></td></tr>";






$message .="<tr><td>More details click <a href ='http://webdev.linea.gov.br/bootstrap/search/search.php'>Here</a>  </td></tr>
			</tbody>
			
			</table>

     		</body></html>";

//echo $message;
$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From:  LIneA<itteam@linea.gov.br>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender:  <ana.marcela@linea.gov.br\n"; //email do servidor //que enviou
$headers .= "X-Mailer: PHP v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <ana.marcela@linea.gov.br>\n"; //caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";

//mail($para, $assunto, $mensagem, $headers);//funÃ§Ã£o que faz o envio do email.
//echo 'mail('.$para.','. $subject.', '.$message.', '.$headers.')';

mail($para, $subject, $message, $headers);


//header ("location: http://webdev.linea.gov.br/bootstrap/register.php");

// enviando email para chefia  com as informações dos cadastrados
echo mysql_error();




?>
