<?php
include '../clases/Conexion.php';
include '../clases/Reporte.php';
$objConexion = new Conexion();
$objReporte = new Reporte();
$conexion = $objConexion->conexion();

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$datos = $objReporte->promedioEsperaHora($fecha, $hora, $conexion);
while ($row = mysqli_fetch_array($datos)) {
    echo $row['diferencia'].'<br>';
}