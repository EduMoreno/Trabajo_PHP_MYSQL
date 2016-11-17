<?php
	require_once("sesion.php");

	$sesion = new sesion();
	
	if( isset($_POST["iniciar"]) )
	{
		
		$usuario = $_POST["usuario"];
		$password = $_POST["clave"];
	//validar usuario	
		if(validarUsuario($usuario,$password) == true)
		{			
			$sesion->set("usuario",$usuario);
	
			header("location: principal.php");
		}
		else 
		{
	?>
      <script>
        alert("Usuario o contraseña incorrecta");
       </script> 
       <?php
		}
	}
	//Creo funcion para validar usuario
	function validarUsuario($usuario, $password)
	{
		$conexion = new mysqli("localhost","root","","zoo");
		$consulta = "select clave from usuarios where nombre = '$usuario';";
		
		$result = $conexion->query($consulta);
		
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			if( strcmp($password,$fila["clave"]) == 0 )
				return true;						
			else					
				return false;
		}
		else
				return false;
	}

?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="acceso.css">
</head>

<body>

   <div id="form-main">
            <div id="form-div">
                <h2 style="color: white ; text-align: center; font-family: Comic sans ms;"> CONTROL DE ACCESO </h2>
                <form class="form" id="form1" action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <p class="name">
                        <input  type="text"  name="usuario" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Nombre" id="name" />
                    </p>

                    <p class="password">
                        <input type="password"   name="clave" class="validate[required,custom[password]] feedback-input" id="password" placeholder="Contraseña" />
                    </p>

                    <div class="submit">
                        <input type="submit" name ="iniciar" value="Iniciar Sesion" id="button-blue"/>
                        <div class="ease"></div>
                    </div>
                </form>
                      <br>
            </div>
</body>
</html>