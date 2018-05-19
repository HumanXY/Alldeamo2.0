<?php
include '../clases/Conexion.php';
include '../clases/Reporte.php';
$objConexion = new Conexion();
$objReporte = new Reporte();
$conexion = $objConexion->conexion();

$fecha = $_POST['fecha'];

$datos = $objReporte->promedioEspera($fecha, $conexion);
//$numero;
while ($row = mysqli_fetch_array($datos)) {
    //$numero[] = $row['diferencia'];
    echo $row['diferencia'].'<br>';
}
/*$suma;
$resultado = 0;
for ($i = 0; $i < sizeof($numero); $i++) {
    $suma = explode(":", $numero[$i]);
    $resultado = $resultado + $suma[1] + ($suma[0] * 60);
}
echo $resultado / sizeof($numero); 
$numero2 = '2' + '5';
echo $numero2;*/