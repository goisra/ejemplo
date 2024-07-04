<?php
$usuario1 = $_POST["usuario"];
$clave = $_POST["clave"];
$edad = $_POST["edad"];
$tipo = $_POST["tipo"];

$servidor = "localhost";
$usuario_db = "root";
$clave_db = "";
$nombre_db = "ejemplo";

// Conexión a la base de datos
$conexion = mysqli_connect($servidor, $usuario_db, $clave_db, $nombre_db);

if (!$conexion) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}

// Verificar si el usuario ya existe
$query = "SELECT * FROM datos2 WHERE usuario='$usuario1'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) > 0) {
    echo "El usuario ya existe en la base de datos.";
} else {
    // Insertar nuevo registro
    $query_insertar = "INSERT INTO datos2 (usuario, clave, edad, tipo) VALUES ('$usuario1', '$clave', '$edad', '$tipo')";
    if (mysqli_query($conexion, $query_insertar)) {
        echo "Registro insertado correctamente.";
    } else {
        echo "Error al insertar registro: " . mysqli_error($conexion);
    }
}

// Mostrar todos los registros
$query_mostrar = "SELECT * FROM datos2";
$resultado_mostrar = mysqli_query($conexion, $query_mostrar);

if (mysqli_num_rows($resultado_mostrar) > 0) {
    echo "<h2>Registros en la base de datos:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Usuario</th><th>Edad</th><th>Tipo</th></tr>";
    while ($fila = mysqli_fetch_assoc($resultado_mostrar)) {
        echo "<tr>";
        echo "<td>{$fila['ID']}</td><td>{$fila['usuario']}</td><td>{$fila['edad']}</td><td>{$fila['tipo']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros en la base de datos.";
}

mysqli_close($conexion);
?>
