<?php
	require_once("sesion.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{
      ?>
       
       <?php
		header("Location: login.php");		
	}
	else 
            
	{
	?>
	<HTML><head>
	<title></title>
                <meta http-equiv="Content-Type" content="text/html" charset="utf-8">

                <link rel="stylesheet" href="style.css">

	</head>
	<body>
            <div style="background-color:red; width: 300px; border-radius: 10px; border: 1px solid black; ">
            <h1> Hola  <?php echo $sesion->get("usuario"); ?> </h1>
            <br>
        <a href="cerrarsesion.php"><input type="button" Value="Cerrar"> </a>
            </div>
	
	
	<?php 
	}
                   if (($usuario=="Administrador")||($usuario=="administrador")){

   $mysql=new mysqli("localhost","root","","zoo");
    $registros=$mysql->query("SELECT * FROM ANIMALES") or
      die($mysql->error);
	 
    echo ' <table>
            <tr id="trcabecera">
                <th id="cabecera" colspan="10">
                    Base de datos del ZOO
                </th>
            </tr>';
    echo '<tr id="primeraFila"> 
        <td class="td1">Código</td>
                    <td>Nombre</td>
                    <td>Tipo de animal</td>
                    <td>Genero</td>
                    <td>Edad</td>
                    <td>Comida</td>
                    <td>Cuidador</td>
                    <td colspan="2">Botones</td>
            </tr>';
    while ($reg=$registros->fetch_array())
    {
      echo '<tr>';
      echo '<td>';
      echo $reg['COD_ANIMAL'];
      echo '</td>';	  
      echo '<td>';
      echo $reg['NOMBRE'];	  
      echo '</td>';	  
      echo '<td>';
      echo $reg['TIPO_ANIMAL'];	  
      echo '</td>';	  
      echo '<td>';
      echo $reg['GENERO'];	  
      echo '</td>';
       echo '<td>';
      echo $reg['EDAD'];	  
      echo '</td>';
       echo '<td>';
      echo $reg['TIPO_COMIDA'];	  
      echo '</td>';
       echo '<td>';
      echo $reg['CUIDADOR'];	  
      echo '</td>';
      echo '<td colspan="2">';
      echo '<a href="Baja.php?codigo='.$reg['COD_ANIMAL'].'"><input type="button" Value=Borrar></a>';
      echo '<a href="Modificacion.php?codigo='.$reg['COD_ANIMAL'].'"><input type="button" Value="Modificar"></a>';
      echo '</td>';
        
      echo '</tr>';	  
    }	
  ?>     
    
   <form method="post" action="Alta.php">

   <tr>
<td class="td1"><input type="number" name="codigo" min="1"  maxlength="5" required></td>
                <td class="td1"><input type="text" name="nombre"></td>
                <td class="td1"><input type="text" name="tanimal"></td>
                <td class="td1"><select name='genero'>
                 <option>Macho</option>
                 <option>Hembra</option>
                 <option>Hermafrodita</option>
                 <option>Sin Sexo</option>
                </select>
                </td>
                <td class="td1"><input type="number" name="edad" min="0"  maxlength="4"></td> 
                <td class="td1"><input type="text" name="tcomida" size="7" maxlength="16"></td> 
                <td class="td1">
   <select name="cuidador">
  <?php
	  
    $registros3=$mysql->query("SELECT DNI,NOMBRE FROM CUIDADORES") or
      die($mysql->error);
	while ($reg=$registros3->fetch_array())
    {
       echo "<option>".$reg['DNI']."</option>";
    }		
  ?>  
 
  </select>
      </td>
 <td colspan="2"> <input type="submit" value="Añadir"></td>
  </form>
 </tr>
     </table>
     <br>
    <?php
      $registros2=$mysql->query("SELECT *  FROM  CUIDADORES") or
      die($mysql->error);
	?> 
    <table class="chica">
            <tr id="trcabecera">
                <th id="cabecera" colspan="4">
                    Base de datos de los cuidadores
                </th>
            </tr>
        
            <tr id="primeraFila">
                    <td class="td1">DNI</td>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                   
            </tr>
   <?php         
    while ($reg=$registros2->fetch_array())
    {
      echo '<tr>';
      echo '<td>';
      echo $reg['DNI'];
      echo '</td>';	  
      echo '<td>';
      echo $reg['NOMBRE'];	  
      echo '</td>';	  
      echo '<td>';
      echo $reg['APELLIDOS'];	  
      echo '</td>';	  
      }
 
    $mysql->close();
        }
        else{
          $mysql=new mysqli("localhost","root","","zoo");
    $registros=$mysql->query("SELECT ANIMALES.*  FROM  CUIDADORES, ANIMALES
                              where CUIDADORES.DNI=ANIMALES.CUIDADOR AND CUIDADORES.NOMBRE='$usuario'") or
      die($mysql->error);
	 
    echo ' <table>
            <tr id="trcabecera">
                <th id="cabecera" colspan="10">
                    Base de datos del ZOO
                </th>
            </tr>';
    echo '<tr id="primeraFila"> 
        <td class="td1">Código</td>
                    <td>Nombre</td>
                    <td>Tipo de animal</td>
                    <td>Genero</td>
                    <td>Edad</td>
                    <td>Comida</td>
                    <td>Cuidador</td>
                </tr>';
    while ($reg=$registros->fetch_array())
    {
      echo '<tr>';
      echo '<td>';
      echo $reg['COD_ANIMAL'];
      echo '</td>';	  
      echo '<td>';
      echo $reg['NOMBRE'];	  
      echo '</td>';	  
      echo '<td>';
      echo $reg['TIPO_ANIMAL'];	  
      echo '</td>';	  
      echo '<td>';
      echo $reg['GENERO'];	  
      echo '</td>';
       echo '<td>';
      echo $reg['EDAD'];	  
      echo '</td>';
       echo '<td>';
      echo $reg['TIPO_COMIDA'];	  
      echo '</td>';
       echo '<td>';
      echo $reg['CUIDADOR'];	  
      echo '</td>';
        }
        $mysql->close();
        }
        
?>
</body>
    
</HTML>