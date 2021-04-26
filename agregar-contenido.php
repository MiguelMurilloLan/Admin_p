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

                <h2 class="mt-3">Nuevo Contenido</h2>
                <form action="agregar.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <h4 class="mt-4">Contenido</h4>
                        <div class="form-group">
                            <label for="etiquetaTitulo">Titulo</label>
                            <input type="text" class="form-control" id="etiquetaTitulo" name="Titulo" placeholder="Titulo">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="etiquetaDescripcionCorta">Descripcion Corta</label>
                            <textarea class="form-control" id="etiquetaDescripcionCorta" name="DescripcionCorta" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="etiquetaDescripcion">Descripcion</label>
                            <textarea class="form-control" id="etiquetaDescripcion" name="Descripcion" rows="9"></textarea>
                        </div>
                    </div>
                    <div class="form-row" style="display:flex; margin-top:1em;">
                        <div class="col-md-4 mb-3">
                            <label for="etiquetaLugar">Lugar</label>
                            <input type="text" class="form-control" id="etiquetaLugar" name="Lugar" placeholder="Lugar">
                        </div>
                        <div class="col-md-4" style="margin-left: 2em;">
                            <label for="Fecha">Fecha</label>
                            <input type="date" class="form-control" name="Fecha" id="Fecha">
                        </div>
                    </div>

                    <h4 class="mt-4">Imagenes</h4>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Seleccionar Archivo</label>
                        <input type="file" name="files[]" class="form-control-file" multiple>
                    </div>
                    <h4 class="mt-4">Tipo</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="RadioTipo" id="radioEventos" value="8" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Evento
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="RadioTipo" id="radioEfemerides" value="9">
                        <label class="form-check-label" for="exampleRadios2">
                            Efemeride
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="RadioTipo" id="radioOtros" value="10">
                        <label class="form-check-label" for="exampleRadios3">
                            Otro
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="RadioTipo" id="radioOtros" value="32">
                        <label class="form-check-label" for="exampleRadios3">
                            Protocolo ALBA
                        </label>
                    </div>
                    <h4 class="mt-4">Banner</h4>
                    <div class="form-check mb-5">
                        <input class="form-check-input" name="Banner" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                            Usar como banner
                        </label>
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