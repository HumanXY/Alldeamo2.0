<?php
include '../clases/Conexion.php';
include '../clases/Reporte.php';
$objConexion = new Conexion();
$objReporte = new Reporte();
$conexion = $objConexion->conexion();

$fecha = $_POST['fecha'];

$datos = $objReporte->turnosPerdidos($fecha, $conexion);

while ($row = mysqli_fetch_array($datos)) {
    echo $row['TurnosPerdidos'] .' Turnos perdidos en el dia '.$fecha;
}