<?php

$user = $_POST["txtUser"];
$pass = $_POST["txtPass"];

include './Clases/Cl_Conexion.php';
include './Clases/DaoLogin.php';

$cone = new Cl_Conexion();
$dao = new DaoLogin($cone);

$resp = $dao->validar($user, $pass);

if ($resp > 0) {
    echo 1;
} else {
    echo 0;
}


    