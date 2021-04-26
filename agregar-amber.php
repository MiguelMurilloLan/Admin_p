<?php
    include_once('../php/connection.php');
    include_once('../php/datos.php');
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location:login.php");
    }
    /*
    $datos=new Datos;

    $permiso=$datos->tienePermiso($_SESSION['id'],'Agregar Evento');

    if(!$permiso['Tiene']){
        header("Location:index.php");
    }
    */
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-size: 1.10em !important;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">PDHEG</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Cerrar Sesion</a>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- NAV -->
            <?php include_once('./common/nav.php'); ?>
            <!-- /NAV -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <h2 class="mt-3">Nueva Alerta Amber</h2>
                <form action="manejador-alertas.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <h4 class="mt-4">Datos</h4>
                        <div class="col-md-4 my-3">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="Tipo" value="Amber">
                            </div>
                            <div class="form-group">
                                <label for="etiquetaTitulo">Nombre</label>
                                <input type="text" class="form-control" id="etiquetaTitulo" name="Nombre" placeholder="Nombre">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label for="etiquetaLugar">Lugar</label>
                            <input type="text" class="form-control" id="etiquetaLugar" name="Lugar" placeholder="Lugar">
                        </div>
                    </div>
                    <div class="form-row" style="display:flex; margin-top:1em;">
                        <div class="col-md-4">
                            <label for="Fecha">Fecha</label>
                            <input type="date" class="form-control" name="Fecha" id="Fecha">
                        </div>
                    </div>
                    <div class="col-md-1 my-3">
                        <div class="form-group">
                            <label for="etiquetaTitulo">Estado</label>
                            <input type="number" class="form-control" id="etiquetaTitulo" name="Estado" placeholder="Estado">
                        </div>
                    </div>

                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input id="imagen" type="file" name="files" accept=".jpg,.png,.jpeg" class="form-control-file">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mb-5">Aceptar</button>
                </form>
            </main>
        </div>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

</body>

</html>