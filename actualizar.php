<?php
	
		$usuario= $_POST['usuarioa'];
		$clave = $_POST['clavea'];
        $clavenueva=$_POST['clavenueva'];                                                                                                                                                                                                                                                                                                                                                                                                      	
        	$servidor="localhost";
			$user="root";
		$coneccion=mysqli_connect($servidor,$user,"")
			or die ("No se pudo conectar el servidor");
		$db=mysqli_select_db($coneccion,"ejemplo")
			or die ("No se pudo seleccionar la base de datos");
		$query="SELECT usuario FROM datos where usuario='$usuario' and '$clave'";
		$result=mysqli_query($coneccion,$query) or die ("la eliminacion fallo: ".mysqli_error());
		if(mysqli_fetch_array($result)){
            $query="UPDATE datos SET clave='$clavenueva' where usuario='$usuario' and clave='$clave'";    
            mysqli_query ($coneccion,$query) or die ("fallo el borrado de registro".mysqli_error());
            echo json_encode(array("exito" => "se actualizo el registro"));
		}else{
			
            echo json_encode(array("error" => "no existe el usuario"));
		}
		mysqli_close($coneccion);
		?>