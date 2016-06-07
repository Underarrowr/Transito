<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/estilo.css"/>
        <title></title>
    </head>
    <body>
        <script src="bootstrap/js/bootstrap.min.js"></script> 
        <script>
            $(document).ready(function () {
                $("#btnIniciar").click(function () {
                    $.ajax({
                        url: "Validar.php",
                        type: 'POST',
                        data: $("#frmDatos").serialize(),
                        success: function (data) {
                            if (data == 1) {
                                $.ajax({
                                    url: "Perfil.php",
                                    type: 'POST',
                                    data: $("#frmDatos").serialize(),
                                    success: function (data) {
                                        if (data == 1) {
                                            $(location).attr("href", "ListaMultas.php");
                                        } else {
                                            $(location).attr("href", "prueba.php");
                                        }
                                    }
                                });

                            } else {
                                //$("#resp").html("Credenciales incorrectas");

                                header('Location: Home.php?respuesta=Credenciales incorrectas');
                            }
                        }
                    });
                });
            });



        </script>
        <form id="frmDatos">
            <div class="container" style="background-color: #E6E6E6">
                <div>
                    <img src="img/Banner.jpg" alt=""/>
                    <spam style="position: absolute; top: 50px; left: 800px;">
                        <div>
                            <span style="position: relative; left: 10px;">
                                <input class="form-control" type="text" name="txtUser" id="txtUser" placeholder="User" size="10"> <!-- Usuario-->
                                <span style="position: relative; left: 130px; bottom: 34px" >
                                    <input class="form-control" type="text" name="txtPass" id="txtPass" placeholder="Password" size="10"><!-- Clave-->
                                    <span style="position: absolute; left: 130px; bottom: 0px" >
                                        <input class="form-control" id="btnIniciar" type="button" value="Log in">
                                    </span>
                                </span>
                            </span>
                        </div>
                        <div>
                            <span>
                                <div>
                                    <?php
                                    if (isset($_GET["respuesta"])) {
                                        echo $_GET["respuesta"];
                                    }
                                    ?>
                                </div>
                            </span>
                        </div>
                    </spam>
                </div>
            </div>
            <div id="resp">
            </div>
        </form>
        <form action="ListaMultas.php" method="post">
            <div class="container" style="background-color: #BCBBBB">
                <div class="row">
                    <div class="col-lg-9"></div>
                    <div class="col-lg-3">
                        <br>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar Rut..." >
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Buscar</button>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </form>


    </body>
</html>
