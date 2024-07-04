<?php
	
		$usuario= $_POST['usuario'];
		$clave = $_POST['clave'];
		$edad= $_POST['edad'];
		$tipo = $_POST['tipo'];
               	
        	$servidor="localhost";
			$user="root";
		
		$coneccion=mysqli_connect($servidor,$user,"")
			or die ("No se pudo conectar el servidor");
		$db=mysqli_select_db($coneccion,"ejemplo")
			or die ("No se pudo seleccionar la base de datos");
		$query="SELECT usuario FROM datos where usuario='$usuario'";
		$result=mysqli_query($coneccion,$query) or die ("la consulta fallo: ".mysqli_error());
		if(mysqli_fetch_array($result)){
			echo json_encode(array("error" => "ya existe este usuario"));
		}else{
			$query="INSERT INTO datos (usuario,clave,edad,tipo)
		                 values ('$usuario', '$clave','$edad','$tipo')";
			mysqli_query ($coneccion,$query) or die ("fallo la consulta".mysqli_error());
			echo json_encode(array("exito" => "se realizo el registro"));
		}
		
		mysqli_close($coneccion);
		?>