<?php

$quebra_linha = "\n"; // quebra de linha para linux no windows apenas a se usa \r\n
$emailsender = "ana.marcela@linea.gov.br";  //email que enviara a mensagem ,este email precisa pertender ao mesmo dominio 
$nomeremetente = "testes"; // nome remetente de sua mensagem
$emaildestinatario = "amarcelaxs@gmail.com"; //email para qual sera enviado a mensagem
$assunto="TESTE EMAIL"; //assunto do email
$mensagem="conteudotesteemail - webback4"; //conteudo da mensagem
$mensagemHTML='<p></h1>TESTANDO ESSE EMAIL:'.$mensagem.'</h1></p>';// é uma mensagem formatada em html


$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From: ".$emailsender.$quebra_linha;////Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender:  <ana.marcela@linea.gov.br\n"; //email do servidor //que enviou
$headers .= "X-Mailer: PHP v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <ana.marcela@linea.gov.br>\n"; //caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";
                                       

/*
$headers = "MIME-Version: 1.1".$quebra_linha; //
$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;//
$headers .="From: ".$emailsender.$quebra_linha;//
$headers .= "Return-Path: ".$emailsender.$quebra_linha;
$headers .= "Reply-To ".$emailssender.$quebra_linha;

*/


mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
print "Mensagem enviada com sucesso!"
	


?>
