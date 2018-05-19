<?php
class Conexion {
    public function conexion() {
        $link = mysqli_connect("localhost", "root", "", "reto_aldeamo2");
        if ($link == false) {
            die ("Error con la conexión: ". mysqli_connect_error());
        }
        return $link;
    }
}
