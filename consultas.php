<?php
$servidor="localhost";
$usuario="root";
$coneccion=mysqli_connect($servidor,$usuario,"")
          or die("No se pudo conectar el servidor");
$db=mysqli_select_db($coneccion,"ejemplo") 
          or die("No se pudo seleccionar la nase de datos");
$query="select * from datos2";
$result=mysqli_query($coneccion,$query)
          or die("La consulta fallo: ".mysqli_error($coneccion));
echo "<table border='1'>";
echo "<tr>";
echo "<th> ID </th><th>usuario</th><th>edad<th>";
echo "</tr>";
while($row=mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>",$row['ID'],"</td><td>",$row['usuario'],"</td><td>",$row['edad'],"</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($coneccion);
?>