<?php
    // 1. Configuración de conexión a la base de datos
    $usuario= $_POST['usuario_uno'];
    $clave = $_POST['clave_uno'];
    $servidor = "localhost";
    $user = "root";


    // 2. Establecer conexión con la base de datos
    $coneccion = mysqli_connect($servidor, $user, "")
        or die("No se pudo conectar el servidor");

    // 3. Selección de la base de datos
    $db = mysqli_select_db($coneccion, "ejemplo")
        or die("No se pudo seleccionar la base de datos");

    // 4. Consulta para seleccionar todos los datos
    $query = "SELECT * FROM datod WHERE usuario = '$usuario' AND clave = '$clave'";
    $result = mysqli_query($coneccion, $query)
        or die("la consulta fallo: " . mysqli_error($coneccion));

  
    class Usuario {
        public $usuario = "";
        public $edad = "";
        public $id = "";
    }
    
 
    if($row = mysqli_fetch_array($result)) {
        $usuario1 = new Usuario;
        $usuario1->usuario=$row['usuario'];
        $usuario1->edad= $row['edad'];
        $usuario1->id = $row['ID'];
      
        $objJSON=json_encode($usuario1);
        echo $objJSON;
    }
     else{
          echo "no se encontro";
     }
     
   
   
    // 8. Cierre de la conexión a la base de datos
    mysqli_close($coneccion);
   
?>
