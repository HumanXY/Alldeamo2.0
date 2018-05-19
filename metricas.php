<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reto Aldeamo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
    <div class="container rounded">
        <h1 class="text-center">Metricas del dia: //día ingresado por el usuario//</h1>
        <div class="row">
            <div class="col-md-4 border border-dark rounded text-center metrica1">
                <h4 class="">Atenciones</h4>
                <div class="row">
                    <div class="col-4">
                        <i class="far fa-sun fa-3x"></i>
                    </div>
                    <div class="col-8">
                        <b>numero de consulta</b>
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
                        <b>numero consulta</b>
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
                        <b>numero consulta</b>
                    </div>
                </div>
                <hr>
                Espera antes de la atención del día
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 border border-dark rounded text-center">
                <h4 class="">Cantidad</h4>
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                <hr>
                Atenciones por hora del día
            </div>
            <div class="col-md-4 border border-danger rounded text-center">
                <h4 class="">Cantidad</h4>
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                <hr>
                Turnos perdidos por hora del día
            </div>
            <div class="col-md-4 border border-success rounded text-center">
                <h4 class="">Tiempo Promedio</h4>
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                <hr>
                Espera antes de la atención
            </div>
        </div>
        <div class="row">
            <div class="col-6 border border-info rounded text-center">
                <h4>Mayor Tiempo</h4>                
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                <hr>
                Dias con mayor tiempo de espera
            </div>
            <div class="col-6 border border-info rounded text-center">
                <h4>Mayor Tiempo</h4>
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                aquí va la gráfica <br>
                <hr>
                Horas del día con mayor tiempo de espera
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>