<?php

include "conexion.php";
include "validar_sesion.php";
session_destroy();
header('location: index.php');

?>




