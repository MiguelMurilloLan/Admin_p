<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="../Recursos/icono_pag.png">
  <script src="https://kit.fontawesome.com/4659b9e23c.js" crossorigin="anonymous"></script>

  <title>Inicio Administrador </title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
        <?php
        include_once('../php/connection.php');
        include_once('../php/datos.php');

        $datos = new Datos;

        $listado = $datos->obtenerListadoContenidos();

        ?>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

    <?php include_once('comun.php') ?>

    <!--infor superior-->
    <section id="main-content">
      <section class="wrapper">
        
        <!-- contenido de la pagina-->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1>Contenidos</h1>
                <table class="table table-hover table-sm caption-top display" id="Contenidos">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="contenidoTabla">
                        <?php
                        foreach ($listado as $item) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $item['IdContenido']; ?></th>
                                <td style="width:60%;"><?php echo $item['Titulo']; ?></td>
                                <td><?php
                                    if ($item['IdGrupo'] == 8){echo "Eventos";$tipoeditar='evento';}
                                    elseif ($item['IdGrupo'] == 9) {echo "Efemerides";$tipoeditar='efemeride';}
                                    elseif ($item['IdGrupo'] == 10) {echo "Otros";$tipoeditar='otro';}
                                    elseif ($item['IdGrupo'] == 23) {echo "Derechos Humanos";$tipoeditar='derechoshumanos';}
                                    elseif ($item['IdGrupo'] == 25) {echo "Niños y niñas";$tipoeditar='ninosyninas';}
                                    elseif ($item['IdGrupo'] == 36) {echo "Webinar";$tipoeditar='webinar';}
                                    elseif ($item['IdGrupo'] == 37) {echo "Comunicado Prensa";$tipoeditar='comunicadoprensa';}
                                    elseif ($item['IdGrupo'] == 38) {echo "Pronunciamiento";$tipoeditar='pronunciamiento';}
                                    elseif ($item['IdGrupo'] == 39) {echo "Campaña TV";$tipoeditar='campanatv';}
                                    elseif ($item['IdGrupo'] == 40) {echo "Spot TV";$tipoeditar='spottv';}
                                    elseif ($item['IdGrupo'] == 41) {echo "Campaña de Radio";$tipoeditar='campanaradio';}
                                    elseif ($item['IdGrupo'] == 42) {echo "Material Grafico";$tipoeditar='materialgrafico';}
                                    elseif ($item['IdGrupo'] == 43) {echo "Informe Especial";}
                                    elseif ($item['IdGrupo'] == 44) {echo "Revista DH";$tipoeditar='revistadh';}
                                    elseif ($item['IdGrupo'] == 45) {echo "Informe Anual";$tipoeditar='informeanual';}
                                    elseif ($item['IdGrupo'] == 46) {echo "Resultado de Gestion";$tipoeditar='resultadogestion';}
                                    elseif ($item['IdGrupo'] == 47) {echo "Mecanismo de Discapacidad";$tipoeditar='mecanismodiscapacidad';}
                                    ?></td>
                                <td><?php if($item['IdGrupo']!=43 && $item['IdGrupo']!=47){ ?><a href="editar-<?php echo $tipoeditar; ?>.php?id=<?php echo $item['IdContenido']; ?>"><i class="fas fa-edit"></i></a><?php } ?> <a href="#" onclick="return false;"><i class="fas fa-trash-alt" id="<?php echo $item['IdContenido']; ?>" onclick="borrarContenido(this)"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    
  </section>

    <!-- javascripts -->
        <!-- javascripts -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="js/scripts.js"></script>

        
            <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
            <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#Contenidos').DataTable({
                        language: {
                            sLengthMenu: "Mostrar _MENU_ registros",
                            processing: "Procesando...",
                            search: "Buscar",
                            //lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                            info: "Mostrando _START_ a _END_ de _TOTAL_ elementos",
                            infoEmpty: "No hay elementos para mostrar",
                            infoFiltered: "(filtrando _MAX_ elementos del total.)",
                            infoPostFix: "",
                            loadingRecords: "Cargando registros...",
                            zeroRecords: "No hay registros",
                            emptyTable: "No hay elementos",
                            paginate: {
                                first: "Primero",
                                previous: "Previo",
                                next: "Siguiente",
                                last: "Ultimo"
                            },
                            aria: {
                                sortAscending: "Ordenar de manera ascendente",
                                sortDescending: "Ordenar de manera descendente"
                            }
                        },
                        'columns': [{
                                'searchable': true

                            },
                            {
                                'searchable': true
                            },
                            {
                                'searchable': true
                            },
                            {
                                'orderable': false,
                                'searchable': false
                            }
                        ]
                    });
                });

                function borrarContenido(item) {
                    var item = item
                    var id = item.id
                    $.ajax({
                        url: "ajax/eliminar-contenido.php",
                        type: "post",
                        dataType: 'json',
                        data: {
                            id: id
                        },
                        success: function(result) {
                            item.parentNode.parentNode.parentNode.parentNode.removeChild(item.parentNode.parentNode.parentNode)
                            var toast = document.getElementById("toast")
                            toast.innerHTML = '<div class="toast-header">Exito</div><div class="toast-body">' + result.mensaje + '</div>'
                            $('.toast').toast('show');
                            location.reload();
                        },
                        error: function(err) {
                            console.log(err)
                            var toast = document.getElementById("toast")
                            toast.innerHTML = '<div class="toast-header">Error</div><div class="toast-body">' + err.responseJSON.mensaje + '</div>'
                            $('.toast').toast('show');
                        }
                    });

                }
            </script>

           
    <!-- javascripts -->
</body>

</html>
