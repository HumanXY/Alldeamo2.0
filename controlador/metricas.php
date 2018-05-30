<?php
include '../clases/Conexion.php';
include '../clases/Reporte.php';

//Creacion de objetos de las clases
$objConexion = new Conexion();
$objReporte = new Reporte();
$conexion = $objConexion->conexion();

$fecha = $_GET['fecha'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reto Aldeamo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
    <div class="container rounded">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Metricas del dia: <?php echo $fecha ?></h1>
            </div>
            <div class="col-12 text-center">
                <a href="../index.html" class="btn btn-info">Inicio</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 border border-dark rounded text-center metrica1">
                <h4 class="">Atenciones</h4>
                <div class="row">
                    <div class="col-4">
                        <i class="far fa-sun fa-3x"></i>
                    </div>
                    <div class="col-8">    
                        <?php 
                            //Llamada del objeto atenciones diarias por medio del objeto de la clase
                            $datos = $objReporte->atencionesDiarias($fecha, $conexion);
                            while ($row = mysqli_fetch_array($datos)) {
                        ?>
                        <h2> <?php echo $row['NumAtencion']; ?> </h2>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <hr>
                Cantidad de atenciones del día
            </div>
            <div class="col-md-4 border border-danger rounded text-center metrica2">
                <h4 class="">Turnos perdidos</h4>
                <div class="row">
                    <div class="col-4">
                        <i class="far fa-times-circle fa-3x"></i>
                    </div>
                    <div class="col-8">
                        <?php
                            //llamada del objeto turnos perdidos por medio del objeto de la clase 
                            $datos = $objReporte->turnosPerdidos($fecha, $conexion);
                            while ($row = mysqli_fetch_array($datos)) {
                        ?>
                        <h2> <?php echo $row['TurnosPerdidos']; ?> </h2>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <hr>
                Cantidad de turnos del día
            </div>
            <div class="col-md-4 border border-success rounded text-center metrica3">
                <h4 class="">Tiempo Promedio</h4>
                <div class="row">
                    <div class="col-4">
                        <i class="far fa-clock fa-3x"></i>
                    </div>
                    <div class="col-8">
                        <?php 
                            //Llamada del objeto promedio espera por medio del objeto de la clase
                            $datos = $objReporte->promedioEspera($fecha, $conexion);
                            while ($row = mysqli_fetch_array($datos)) {
                        ?>
                        <h2> <?php echo $row['diferencia']; ?> </h2>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <hr>
                Espera antes de la atención del día
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 border border-dark rounded text-center">
                <h4 class="">Cantidad</h4>
                <div>
                    <!-- Muestra de grafica1 -->
                    <canvas id="grafica1"></canvas>
                </div>
                <hr>
                Atenciones por hora del día
            </div>
            <div class="col-md-4 border border-danger rounded text-center">
                <h4 class="">Cantidad</h4>
                <div>
                    <!-- Muestra de grafica2 -->
                    <canvas id="grafica2"></canvas>
                </div>
                <hr>
                Turnos perdidos por hora del día
            </div>
            <div class="col-md-4 border border-success rounded text-center">
                <h4 class="">Tiempo Promedio</h4>
                <div>
                    <!-- Muestra de grafica3 -->
                    <canvas id="grafica3"></canvas>
                </div>
                <hr>
                Espera antes de la atención por hora del día
            </div>
        </div>
        <div class="row">
            <div class="col-6 border border-info rounded text-center">
                <h4>Mayor Tiempo</h4>    
                <div>
                    <!-- Muestra de grafica4 -->
                    <canvas id="grafica4"></canvas>
                </div>
                <hr>
                Dias con mayor tiempo de espera
            </div>
            <div class="col-6 border border-info rounded text-center">
                <h4>Mayor Tiempo</h4>
                <div>
                    <!-- Muestra de grafica5 -->
                    <canvas id="grafica5"></canvas>
                </div>
                <hr>
                Horas del día con mayor tiempo de espera
            </div>
        </div>
    </div>
    <script src="../dist/Chart.bundle.js"></script>
	<script src="../js/utils.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
    <script>
    // Datos grafica 1
        var color = Chart.helpers.color;
		var datos1 = {
			labels: [
                <?php 
                    for($hora = 6; $hora <= 18; $hora++) {
                        //Llamado de objeto requerido
                        $datos = $objReporte->atencionesDiariasHora($fecha, $hora, $conexion);
                        while ($row = mysqli_fetch_array($datos)) {
                            if ($row['NumAtencion'] != 0) {
                ?>
                    '<?php echo $hora.':00-'.$hora.':59'; ?>',
                <?php
                            }
                        }
                    }
                ?>
            ],
			datasets: [{
				label: 'Atenciones',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
                    <?php 
                        //limites de consultas a graficar
                        for($hora = 6; $hora <= 18; $hora++) {
                            $datos = $objReporte->atencionesDiariasHora($fecha, $hora, $conexion);
                            while ($row = mysqli_fetch_array($datos)) {
                                if ($row['NumAtencion'] != 0) {
                    ?>
                        <?php echo $row['NumAtencion'] ?>,
                    <?php
                                }
                            }
                        }
                    ?>
                    0
				]
			}]

		};
    // Datos grafica 2
		var datos2 = {
			labels: [
                <?php 
                    for($hora = 0; $hora <= 23; $hora++) {
                        // Llamado de objeto de la clase reporte
                        $datos = $objReporte->turnosPerdidosHora($fecha, $hora, $conexion);
                        while ($row = mysqli_fetch_array($datos)) {
                            if ($row['TurnosPerdidos'] != 0) {
                ?>
                    '<?php echo $hora.':00-'.$hora.':59'; ?>',
                <?php
                            }
                        }
                    }
                ?>
            ],
            //Graficacion de datos
			datasets: [{
				label: 'Perdidos',
				backgroundColor: 'rgba(46, 204, 113, 0.5)',
				borderColor: 'rgb(46, 204, 113)',
				borderWidth: 1,
				data: [
					<?php 
                        for($hora = 0; $hora <= 23; $hora++) {
                            $datos = $objReporte->turnosPerdidosHora($fecha, $hora, $conexion);
                            while ($row = mysqli_fetch_array($datos)) {
                                if ($row['TurnosPerdidos'] != 0) {
                    ?>
                        <?php echo $row['TurnosPerdidos'] ?>,
                    <?php
                                }
                            }
                        }
                    ?>
                    0
				]
			}]

		};
    // Datos grafica 3
        var datos3 = {
            type: 'line',
            data: {
                labels: [
                    <?php 
                    for($hora = 6; $hora <= 16; $hora++) {
                        //Llamado objeto de clase reporte
                        $datos = $objReporte->promedioEsperaHora($fecha, $hora, $conexion);
                        while ($row = mysqli_fetch_array($datos)) {
                            if ($row['diferenciaHora'] != '') {
                ?>
                '<?php echo $hora.':00-'.$hora.':59'; ?>',
                <?php
                            }
                        }
                    }
                ?>
                ],
                datasets: [{
                    label: 'Minutos',
                    backgroundColor: 'rgba(44, 62, 80, 0.5)',
                    borderColor: 'black',
                    borderWidth: 1,
                    data: [
                        <?php 
                            for($hora = 6; $hora <= 16; $hora++) {
                                $datos = $objReporte->promedioEsperaHora($fecha, $hora, $conexion);
                                while ($row = mysqli_fetch_array($datos)) {
                                    if ($row['diferenciaHora'] != '') {
                        ?>
                            <?php echo $row['diferenciaHora']; ?>,
                        <?php
                                    }
                                }
                            }
                        ?>
                        ,0
                    ],
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true
                        }
                    }]
                }
            }
        };
    // Datos grafica 4
        var datos4 = {
            labels: [
                <?php
                    //llamado objeto de clase reporte 
                    $datos = $objReporte->mayorEspera($conexion);
                    while ($row = mysqli_fetch_array($datos)) {
                ?>
                    '<?php echo $row['Dias']; ?>',
                <?php
                    }
                ?> 
            ],
            //graficacion de consulta de datos
            datasets: [{
                label: 'Minutos ',
                backgroundColor: 'rgba(93, 173, 226, 0.5)',
                borderColor: 'rgb(93, 173, 226)',
                borderWidth: 1,
                data: [
                    <?php 
                        $datos = $objReporte->mayorEspera($conexion);
                        while ($row = mysqli_fetch_array($datos)) {
                    ?>
                        <?php echo $row['promedio']; ?>,
                    <?php
                        }
                    ?>
                    0
                ]
            }]

        };
    // Datos grafica 5
        var datos5 = {
            labels: [
                <?php 
                    //llamado de objeto de la clase reporte
                    $datos = $objReporte->mayorEsperaHora($conexion);
                    while ($row = mysqli_fetch_array($datos)) {
                ?>
                '<?php echo $row['hora'] .":00-". $row['hora'] .":59"?>',
                <?php
                    }
                ?>
            ],
            datasets: [{
                label: 'Minutos ',
                backgroundColor: 'rgba(93, 173, 226, 0.5)',
                borderColor: 'rgb(93, 173, 226)',
                borderWidth: 1,
                data: [
                    <?php 
                        $datos = $objReporte->mayorEsperaHora($conexion);
                        while ($row = mysqli_fetch_array($datos)) {
                    ?>
                    <?php echo $row['espera']; ?>,
                    <?php
                        }
                    ?>
                    0
                ]
            }]

        };
    //Caracteristicas Grafica 2
		window.onload = function() {
			var graficaDos = document.getElementById('grafica2').getContext('2d');
			window.myBar = new Chart(graficaDos, {
				type: 'bar',
				data: datos2,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true
					}
				}
			});
        //Caracteristicas Grafica 1
            var graficaUno = document.getElementById('grafica1').getContext('2d');
			window.myBar = new Chart(graficaUno, {
				type: 'bar',
				data: datos1,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true
					}
				}
			});
        //Caracteristicas Grafica 3
            var graficaTres = document.getElementById('grafica3').getContext('2d');
            window.myLine = new Chart(graficaTres, datos3);
        //Caracteristicas Grafica 4
            var graficaCuatro = document.getElementById('grafica4').getContext('2d');
            window.myHorizontalBar = new Chart(graficaCuatro, {
                type: 'horizontalBar',
                data: datos4,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                        }
                    },
                    responsive: true,
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                    }
                }
            });
        //Caracteristicas Grafica 5    
            var graficaCinco = document.getElementById('grafica5').getContext('2d');
            window.myHorizontalBar = new Chart(graficaCinco, {
                type: 'horizontalBar',
                data: datos5,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                        }
                    },
                    responsive: true,
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                    }
                }
            });
		};
	</script>
</body>
</html>