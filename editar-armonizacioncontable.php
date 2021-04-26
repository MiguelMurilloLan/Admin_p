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
    <?php

    $id = $_GET['id'];
    include_once('../php/connection.php');
    include_once('../php/datos.php');

    $datos = new Datos;

    $ac = $datos->obtenerACparaEditar($id);


    ?>

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
                <form action="manejador-editararmonizacioncontable.php" method="POST" enctype="multipart/form-data">
                    <h4 class="mt-4">Contenido</h4>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="ID" value="<?php echo $ac['IdArmonizacionContable']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="oldURL" value="<?php echo $ac['URL']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="etiquetaTitulo">Nombre</label>
                            <input type="text" class="form-control" id="etiquetaTitulo" name="Nombre" placeholder="Nombre" value="<?php echo $ac['Nombre']; ?>">
                        </div>
                    </div>
                    <div class="col-md-2 my-3">
                        <div class="form-group">
                            <label for="etiquetaTitulo">Año</label>
                            <input type="number" class="form-control" id="etiquetaTitulo" name="Anio" placeholder="Año" value="<?php echo $ac['Año']; ?>">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label for="etiquetaPeriodo">Periodo</label>
                            <select class="form-control" id="etiquetaPeriodo" name="Periodo">
                                <option value="Anual" <?php if($ac['Periodo']=="Anual") { echo "selected";} ?>>Anual</option>
                                <option value="Trimestre 1" <?php if($ac['Periodo']=="Trimestre 1") { echo "selected";} ?>>Trimestre 1</option>
                                <option value="Trimestre 2" <?php if($ac['Periodo']=="Trimestre 2") { echo "selected";} ?>>Trimestre 2</option>
                                <option value="Trimestre 3" <?php if($ac['Periodo']=="Trimestre 3") { echo "selected";} ?>>Trimestre 3</option>
                                <option value="Trimestre 4" <?php if($ac['Periodo']=="Trimestre 4") { echo "selected";} ?>>Trimestre 4</option>
                                <option value="Cuenta Publica" <?php if($ac['Periodo']=="Cuenta Publica") { echo "selected";} ?>>Cuenta Publica</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label for="etiquetaCategoria">Categoria</label>
                            <select class="form-control" id="etiquetaCategoria" name="Categoria">
                                <option value="Ejercicio Presupuestario" <?php if($ac['Categoria']=="") { echo "selected";} ?>>Ejercicio Presupuestario</option>
                                <option value="Inventarios" <?php if($ac['Categoria']=="Inventarios") { echo "selected";} ?>>Inventarios</option>
                                <option value="Informacion Programatica" <?php if($ac['Categoria']=="Informacion Programatica") { echo "selected";} ?>>Informacion Programatica</option>
                                <option value="Informacion Presupuestal" <?php if($ac['Categoria']=="Informacion Presupuestal") { echo "selected";} ?>>Informacion Presupuestal</option>
                                <option value="Informacion Contable" <?php if($ac['Categoria']=="Informacion Contable") { echo "selected";} ?>>Informacion Contable</option>
                                <option value="Informacion Disciplina Financiera" <?php if($ac['Categoria']=="Informacion Disciplina Financiera") { echo "selected";} ?>>Informacion Disciplina Financiera</option>
                                <option value="Iniciativa y Proyecto" <?php if($ac['Categoria']=="Iniciativa y Proyecto") { echo "selected";} ?>>Iniciativa y Proyecto</option>
                                <option value="LI y PE" <?php if($ac['Categoria']=="LI y PE") { echo "selected";} ?>>LI y PE</option>
                                <option value="Presupuesto Basado en Resultados" <?php if($ac['Categoria']=="Presupuesto Basado en Resultados") { echo "selected";} ?>>Presupuesto Basado en Resultados</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label for="tipoRecurso">Recurso</label>
                            <select class="form-control" id="tipoRecurso">
                                <option value="Interno">Interno</option>
                                <option value="Externo">Externo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label for="recurso">Recurso</label>
                            <input id="recurso" type="file" name="files" accept=".pdf,.xlsx" class="form-control-file">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mb-5">Aceptar</button>
                </form>
            </main>
        </div>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $("#tipoRecurso").change(function() {
            var value = $(this).find("option:selected").val();
            var input = document.getElementById("recurso")
            if (value == "Externo") {
                input.name = "Externo"
                input.type = "text"
                input.removeAttribute("accept")
            } else {
                input.name = "files"
                input.type = "file"
                input.setAttribute("accept", ".pdf,.xlsx");
            }

        })
    </script>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

</body>

</html>