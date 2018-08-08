<?php
$host="localhost";
$user="root";
$password="";
    // Creamos el objeto conexion.
$con = new mysqli($host,$user,$password);
if($con -> connect_error) { //Si no está conectado
    echo '<h1>MySQL Server is not connected</h1>';
} else { //Si está
    echo '<h1>Connected to MySQL</h1>';
}
?>
