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

    $img = array();
    $docs = array();
    $vids = array();
    $audios = array();

    list($contenido, $recursos) = $datos->obtenerContenidoparaEditar($id);

    foreach ($recursos as $r) {
        if ($r['Tipo'] == "Imagen") {
            array_push($img, $r);
        } else if ($r['Tipo'] == "Documento") {
            array_push($docs, $r);
        } else if ($r['Tipo'] == "Video") {
            array_push($vids, $r);
        }else if ($r['Tipo'] == "Audio") {
            array_push($audios, $r);
        }
    }

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
        <div class="toast" id="toast" style="position: fixed;top:5em;right:1em;z-index:999;">

        </div>
        <div class="row">
            <!-- NAV -->
            <?php include_once('./common/nav.php'); ?>
            <!-- /NAV -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


                <h2 class="mt-3">Editar</h2>
                <form action="editar.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <h4 class="mt-4">Contenido</h4>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="ID" value="<?php echo $contenido['IdContenido']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="Tipo" value="<?php echo $contenido['IdGrupo']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="etiquetaTitulo">Titulo</label>
                            <input type="text" class="form-control" id="etiquetaTitulo" name="Titulo" placeholder="Titulo" value="<?php echo $contenido['Titulo']; ?>">
                        </div>
                    </div>
                    <div class="form-row" style="display:flex; margin-top:1em;">
                        <div class="col-md-4" >
                            <label for="Fecha">Fecha</label>
                            <input type="date" class="form-control" name="Fecha" id="Fecha" value="<?php echo $contenido['Fecha']; ?>">
                        </div>
                    </div>

                    <h4 class="mt-4">Imagenes</h4>
                    <div class="row">
                        <?php foreach ($img as $item) { ?>
                            <div class="col sm-6 col-md-4 col-lg-3">
                                <figure class="figure">
                                    <img src="..<?php echo $item['URL']; ?><?php echo $item['Titulo']; ?>" alt="" class="figure-img img-fluid rounded" style="width:200px;"></li>
                                    <figcaption class="figure-caption text-right" style="width: 210px;"><span style="word-break:break-word;"><?php echo $item['Titulo']; ?></span><span class="close" style="cursor:pointer;" id="<?php echo $item['IdImagen']; ?>" idc="<?php echo $item['IdContenido']; ?>" onclick="eliminarImagen(this)">&times;</span></figcaption>
                                    <figcaption class="figure-caption text-right" style="width: 210px;"><span class="close" style="cursor:pointer;" id="<?php echo $item['IdImagen']; ?>" idc="<?php echo $item['IdContenido']; ?>" onclick="">Selecionar como principal</span></figcaption>
                                </figure>
                            </div>
                        <?php } ?>
                    </div>

                    <?php if(count($vids)>0){ ?>
                    <h4 class="mt-4">Videos</h4>
                    <div class="row">
                        <ul>
                            <?php foreach ($vids as $item) { ?>
                                <li><?php echo $item['URL']; ?><?php echo $item['Titulo']; ?><span class="close" style="cursor:pointer;" id="<?php echo $item['IdImagen']; ?>" idc="<?php echo $item['IdContenido']; ?>" onclick="eliminarImagen(this)">&times;</span></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php if(count($audios)>0){ ?>
                    <h4 class="mt-4">Audios</h4>
                    <div class="row">
                        <ul>
                            <?php foreach ($audios as $item) { ?>
                                <li><?php echo $item['URL']; ?><?php echo $item['Titulo']; ?><span class="close" style="cursor:pointer;" id="<?php echo $item['IdImagen']; ?>" idc="<?php echo $item['IdContenido']; ?>" onclick="eliminarImagen(this)">&times;</span></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>

                    <h4 class="mt-4">Imagenes</h4>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Seleccionar Imagenes</label>
                        <input type="file" name="files[]" accept=".jpg,.png,.jpeg" class="form-control-file" multiple>
                    </div>

                    <h4 class="mt-4">Audios</h4>
                    <div class="form-group my-2">
                        <label for="exampleFormControlFile1">Seleccionar Audio</label>
                        <input type="file" name="files[]" accept=".mp3" class="form-control-file" multiple>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mb-5">Aceptar</button>
                </form>
            </main>
        </div>

    </div>

    <script>
        function eliminarImagen(item) {
            var id = item.id
            var idc = item.getAttribute('idc')
            $.ajax({
                url: "ajax/eliminar-imagen.php",
                type: "post",
                dataType: 'json',
                data: {
                    id: id,
                    idc: idc
                },
                success: function(result) {
                    item.parentNode.parentNode.parentNode.parentNode.removeChild(item.parentNode.parentNode.parentNode)
                    var toast = document.getElementById("toast")
                    toast.innerHTML = '<div class="toast-header">Exito</div><div class="toast-body">' + result.mensaje + '</div>'
                    $('.toast').toast('show');
                },
                error: function(err) {
                    var toast = document.getElementById("toast")
                    toast.innerHTML = '<div class="toast-header">Error</div><div class="toast-body">' + err.responseJSON.mensaje + '</div>'
                    $('.toast').toast('show');
                }
            });

        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

</body>

</html>