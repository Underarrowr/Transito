<?php

$user = $_POST["txtUser"];
$pass = $_POST["txtPass"];

include './Clases/Cl_Conexion.php';
include './Clases/DaoLogin.php';

$cone = new Cl_Conexion();
$dao = new DaoLogin($cone);

$resp = $dao->perfil($user, $pass);

if ($resp==1) {
    $_SESSION["usuario"] = $user;
    echo 0;
} else {
    $_SESSION["usuario"] = $user;
    echo 1;
}