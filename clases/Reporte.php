<?php

class Reporte {
    //metodo para la consulta de las atenciones diarias
    public function atencionesDiarias($fecha, $conexion) {
        $sql = "select COUNT(*) as NumAtencion from turno where creation_date between '$fecha 00:00:00' and '$fecha 23:59:00';";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    //metodo para la consulta de las atenciones diarias por hora (GRAFICA)
    public function atencionesDiariasHora($fecha, $hora, $conexion) {
        $sql = "select COUNT(*) as NumAtencion from turno where creation_date between '$fecha $hora:00:00' and '$fecha $hora:59:00';";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    //metodo para la consulta de turnos perdidos en el dia
    public function turnosPerdidos($fecha, $conexion) {
        $sql = "select COUNT(*) as TurnosPerdidos from turno where creation_date between '$fecha 00:00:00' and '$fecha 23:59:00' and status = 0;";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    //metodo para la consulta de turnos perdidos por hora (GRAFICA)
    public function turnosPerdidosHora($fecha, $hora, $conexion) {
        $sql = "select COUNT(*) as TurnosPerdidos from turno where creation_date between '$fecha $hora:00:00' and '$fecha $hora:59:00' and status = 0;";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    /*  PRUEBAS
        public function promedioEspera($fecha, $conexion) {
        $sql = "select diferencia from tiempo_espera WHERE DATE_FORMAT(creation_date, '%y-%m-%d') = DATE_FORMAT('$fecha', '%y-%m-%d');";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }*/

    public function promedioEspera($fecha, $conexion) {
        $sql = "select sec_to_time(avg(time_to_sec(diferencia))) as diferencia from tiempo_espera WHERE DATE_FORMAT(creation_date, '%y-%m-%d') = DATE_FORMAT('$fecha', '%y-%m-%d');";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    public function promedioEsperaHora($fecha, $hora, $conexion) {
        $sql = "select ((time_format(sec_to_time(avg(time_to_sec(diferencia))), '%H')*60)+time_format(sec_to_time(avg(time_to_sec(diferencia))), '%i')) as diferenciaHora from tiempo_espera where creation_date between '$fecha $hora:00:00' and '$fecha $hora:59:00';";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    /*  PRUEBAS
        public function promedioEsperaHora($fecha, $hora, $conexion) {
        $sql = "select sec_to_time(avg(time_to_sec(diferencia))) as diferenciaHora from tiempo_espera where creation_date between '$fecha $hora:00:00' and '$fecha $hora:59:00';";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }*/
    public function mayorEspera($conexion) {
        $sql = "select ((time_format(sec_to_time(avg(time_to_sec(diferencia))), '%H')*60)+time_format(sec_to_time(avg(time_to_sec(diferencia))), '%i')) as promedio, Dias from promedioDias group by Dias order by promedio desc;";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    /*  PRUEBAS
        public function mayorEspera($conexion) {
        $sql = "select SEC_TO_TIME(AVG(TIME_TO_SEC(diferencia))) as promedio, Dias from promedioDias group by Dias order by diferencia desc;";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }*/
    public function mayorEsperaHora($conexion) {
        $sql = "select time_format(time(creation_date), '%H') as hora, (time_format(time(sum(diferencia)), '%H')*60)+ time_format(time(sum(diferencia)), '%i') as espera from tiempo_espera group by hora order by espera desc;";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    /*  PRUEBAS
        public function mayorEsperaHora($conexion) {
        $sql = "select time_format(time(creation_date), '%H') as hora, time(sum(diferencia)) as espera from tiempo_espera group by hora order by espera desc;";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }*/
}
?>