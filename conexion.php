<?php
function conectar(){
    $host="localhost";
    $user="root";
    $pass="";
    $bd="datos";

    $con = mysqli_connect($host, $user, $pass, $bd);

    return $con;
}
?>
