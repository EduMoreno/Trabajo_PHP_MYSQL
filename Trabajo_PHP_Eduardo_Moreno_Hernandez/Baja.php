<?php
	$mysql=new mysqli("localhost","root","","zoo");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $mysql->query("DELETE FROM ANIMALES WHERE COD_ANIMAL=$_REQUEST[codigo]") or
        die($mysql->error);    
	
    $mysql->close();
    
    header('Location:principal.php');
  ?>  
