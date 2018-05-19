<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Ingrese la fecha</h3>
        <form action="controlador/atencionDiarias.php" method="POST" required>
            <input type="date" name="fecha" required>
            <input type="submit" value="calcular">
        </form>
        <h3>Ingrese la fecha y hora</h3>
        <form action="controlador/atencionHoras.php" method="POST">
            <label for="fecha"> Fecha: </label> <input type="date" name="fecha" id="fecha" required>
            <label for="hora"> Hora: </label> <input type="number" placeholder="Horario militar" name="hora" id="hora" required>
            <input type="submit" value="calcular">
        </form>
        <h3>Ingrese la fecha para ver los turnos perdidos en el dia</h3>
        <form action="controlador/turnosPerdidos.php" method="POST" required>
            <label for="fecha"> Fecha: </label> <input type="date" name="fecha" id="fecha" required>
            <input type="submit" value="calcular">
        </form>
        <h3>Ingrese la fecha y la hora para ver los turnos perdidos entre ese rango</h3>
        <form action="controlador/turnosPerdidosHora.php" method="POST">
            <label for="fecha"> Fecha: </label> <input type="date" name="fecha" id="fecha" required>
            <label for="hora"> Hora: </label> <input type="number" placeholder="Horario militar" name="hora" id="hora" required>
            <input type="submit" value="calcular">
        </form>
        <h3>Ingrese la fecha para ver el promedio de espera</h3>
        <form action="controlador/promedioEspera.php" method="POST" required>
            <label for="fecha"> Fecha: </label> <input type="date" name="fecha" id="fecha" required>
            <input type="submit" value="calcular">
        </form>
        <h3>Ingrese la fecha y la hora para ver el promedio de espera por hora</h3>
        <form action="controlador/promedioEsperaHora.php" method="POST">
            <label for="fecha"> Fecha: </label> <input type="date" name="fecha" id="fecha" required>
            <label for="hora"> Hora: </label> <input type="number" placeholder="Horario militar" name="hora" id="hora" required>
            <input type="submit" value="calcular">
        </form>
    </body>
</html>
