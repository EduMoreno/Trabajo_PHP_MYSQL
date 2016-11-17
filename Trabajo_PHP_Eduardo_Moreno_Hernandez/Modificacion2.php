<?php
	$mysql=new mysqli("localhost","root","","zoo");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $mysql->query("UPDATE ANIMALES SET 
                           NOMBRE='$_REQUEST[nombre]',
                           TIPO_ANIMAL='$_REQUEST[tanimal]',
                           GENERO='$_REQUEST[genero]',
                           EDAD='$_REQUEST[edad]',
                           TIPO_COMIDA='$_REQUEST[tcomida]',
                           CUIDADOR='$_REQUEST[cuidador]'
              WHERE COD_ANIMAL='$_REQUEST[codigo]'") or
      die($mysql->error());
	 
    $mysql->close();

    header('Location:principal.php');
    ?>  
