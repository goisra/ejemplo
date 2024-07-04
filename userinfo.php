<?php
    // 1. Configuración de conexión a la base de datos
    $servidor = "localhost";
    $user = "root";

    // 2. Establecer conexión con la base de datos
    $coneccion = mysqli_connect($servidor, $user, "")
        or die("No se pudo conectar el servidor");

    // 3. Selección de la base de datos
    $db = mysqli_select_db($coneccion, "ejemplo")
        or die("No se pudo seleccionar la base de datos");

    // 4. Consulta para seleccionar todos los datos
    $query = "SELECT * FROM datos";
    $result = mysqli_query($coneccion, $query)
        or die("la consulta fallo: " . mysqli_error($coneccion));

    // 5. Generación de la tabla HTML para mostrar los resultados
    //echo "<table border='1'>";
    //echo "<tr>";
    //echo "<th> ID </th><th> Usuario </th><th> Edad </th>";
    //echo "</tr>";

    // 6. Iteración y muestra de los resultados de la consulta
    class Usuario {
        public $usuario = "";
        public $edad = "";
        public $id = "";
    }
    
    $pila = array();

    while ($row = mysqli_fetch_array($result)) {
        $usuario1 = new Usuario;
        $usuario1->usuario=$row['usuario'];
        $usuario1->edad= $row['edad'];
        $usuario1->id = $row['ID'];
        array_push($pila,$usuario1);
      //  echo "<tr>";
       // echo "<td>", $row['ID'], "</td><td>", $row['usuario'], "</td><td>", $row['edad'], "</td>";
        //echo "</tr>";
    }

    // 7. Finalización de la tabla HTML
    //echo "</table>";

   
   
    // 8. Cierre de la conexión a la base de datos
    mysqli_close($coneccion);
    $objJSON=json_encode($pila);
    echo $objJSON;
?>
