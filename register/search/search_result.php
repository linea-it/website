<?php


//$name = $_POST['name'];

 
//$name = $_GET['name']; 
 
/* if( $_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name= $_POST["name"];
        //echo $name;

        $query = "SELECT * from users where name =".$name;
        $query_result = mysql_query($query);
        $array = mysql_fetch_array($query_result);
        echo $array['name'];


        }*/

//$url = "http://webdev.linea.gov.br/bootstrap/confirmation_register.php?id=".$id;
//$url_id = "<a href=\"". $url . "\" ><font color='#cccccc'>".Permissions."</font></a>";

require_once("../conexao.php");
session_start();

$name=$_POST['name'];
$_SESSION['name']=$name;
//echo $name;

if($name ==""){

//echo "<script>alert('No result found ')</script>";


}else{

   $sql = "SELECT name,id FROM users WHERE name LIKE '%{$name}%' ";
   $result = mysql_query($sql) or die (mysql_error());
    while ($linha = mysql_fetch_array($result)) { 
        $name = $linha['name'].'<br>';
	
	$url = "http://webdev.linea.gov.br/bootstrap/confirmation_register.php?id=".$linha['id'];
	$user_link = "<a href=\"". $url . "\" ><font color='000000'>".$name."</font></a>";
	echo $user_link.'<br>';
	//echo $linha['id'];
	
    }  

}


?> 



