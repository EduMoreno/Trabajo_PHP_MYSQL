<?php

    $mysql=new mysqli("localhost","root","","zoo");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
        
   $consulta=$mysql->query("SELECT COD_ANIMAL FROM ANIMALES WHERE COD_ANIMAL='$_REQUEST[codigo]'");
      
      if ($consulta->num_rows > 0) {
      ?>
      <script>
        alert("Codigo duplicado, introduzca un codigo diferente");
        window.location="principal.php";
      </script>
      
      <?php
      } else {
	
    $mysql->query("INSERT INTO ANIMALES(COD_ANIMAL,NOMBRE,TIPO_ANIMAL,GENERO,EDAD,TIPO_COMIDA,CUIDADOR) 
        values ('$_REQUEST[codigo]','$_REQUEST[nombre]','$_REQUEST[tanimal]','$_REQUEST[genero]','$_REQUEST[edad]','$_REQUEST[tcomida]','$_REQUEST[cuidador]')") or
      die($mysql->error);
	  
    $mysql->close();

    header('Location:principal.php');  
      }
        
?>  
