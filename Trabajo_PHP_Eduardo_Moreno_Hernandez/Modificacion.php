<!doctype html>
<html>
<head>
  <title>Modificación de animales.</title>
</head>  
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
            <link rel="stylesheet" href="style.css">

<body>
  <div class="table-responsive"> 
  <?php
	$mysql=new mysqli("localhost","root","","zoo");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $registro=$mysql->query("SELECT * FROM ANIMALES WHERE COD_ANIMAL=$_REQUEST[codigo]") or
      die($mysql->error);
	 
    $reg=$registro->fetch_array()
    
  ?>
        <form method="post" action="Modificacion2.php">
    

     <table>
            
      
            <tr id="primeraFila">
                    <td class="td1">Código</td>
                    <td>Nombre</td>
                    <td>Tipo de animal</td>
                    <td>Genero</td>
                    <td>Edad</td>
                    <td>Comida</td>
                    <td>Cuidador</td>
                     <td>Boton</td>
            </tr>
            <tr>
     <td class="td1"> <input type="text" name="codigo"  value="<?php echo $reg['COD_ANIMAL']; ?> " maxlength="5"  disabled required>
      </td>
                <td class="td1"><input type="text" name="nombre"  value="<?php echo $reg['NOMBRE']; ?> " maxlength="10" >
      </td> 
              <td class="td1"><input type="text" name="tanimal"  value="<?php echo $reg['TIPO_ANIMAL']; ?> " maxlength="10" ></td>
                <td class="td1"><select name='genero'>
                        <option selected  value="<?php echo $reg['GENERO']; ?>" ><?php echo $reg['GENERO']; ?></option>
                 <option>Macho</option>
                 <option>Hembra</option>
                 <option>Hermafrodita</option>
                 <option>Sin Sexo</option>
                </select>
                </td>
                <td class="td1"><input type="number" name="edad"  value=" <?php echo $reg['EDAD']; ?> " min="0"  maxlength="4"></td> 
                <td class="td1"><input type="text" name="tcomida"  value="<?php echo $reg['TIPO_COMIDA']; ?> "size="7" maxlength="16"></td> 
                <td class="td1">
   <select name="cuidador">
   <option selected value="<?php echo $reg['CUIDADOR']; ?>"> <?php echo $reg['CUIDADOR']; ?></option>
   
  <?php
	$mysql=new mysqli("localhost","root","","zoo");
	if ($mysql->connect_error)
	  die("Problemas con la conexión a la base de datos");
  
    $registros2=$mysql->query("SELECT DNI FROM CUIDADORES") or
      die($mysql->error);
	while ($reg2=$registros2->fetch_array())
    {
       echo "<option >".$reg2['DNI']."</option>";
    }	

  ?>  
 
  </select>
    </td>
    <td class="td1"><input type="hidden" name="codigo" value="<?php echo $_REQUEST['codigo']; ?>">     

          <input type="submit" class="btn btn-success" value="Confirmar">
    </td>
                      </tr>
     </table>
            
    </form>
  <?php
        
   
    $mysql->close();

  ?>  
    </div>
</body>
</html>