<?php

/**
 * Configuracion de la conexion
 *
 */

//$con = mysqli_connect("localhost", "ingetronik", "electronica", "contador2");
$con = mysqli_connect("localhost", "root", "", "contador2");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
