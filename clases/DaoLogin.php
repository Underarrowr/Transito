<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoLogin
 *
 * @author Elrohir
 */
class DaoLogin {

    private $cone;

    function DaoLogin($conexion) {
        try {
            $this->cone = $conexion;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function validar($user, $pass) {
        try {
            $sql = "select * from usuario where user = '@u' and pass = '@p'";
            substr_replace($sql, "@u", $user);
            $sql = str_replace("@u", $user, $sql);
            $sql = str_replace("@p", $pass, $sql);
            $resp = $this->cone->sqlSelection($sql);
            return mysqli_num_rows($resp);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function perfil($user, $pass){
        try {
            $sql="select idperfil from usuario where user='@u' and pass='@p'";
            $sql = str_replace("@u", $user, $sql);
            $sql = str_replace("@p", $pass, $sql);
            $resp= $this->cone->sqlSelection($sql);
            $fila = mysqli_fetch_row($resp);
            return $fila[0];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }

}
