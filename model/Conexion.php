<?php

    $mysqli = new mysqli("localhost","root","","tiendaesis2020");

    if(mysqli_connect_errno()){
        echo 'Conexion Fallida : ', mysqli_connect_error();
        exit();
    }

?>
