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

  <title>Quejas y Denuncias</title>

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
</head>

<body>
        <?php
        include_once('../php/connection.php');
        include_once('../php/datos.php');

        $datos = new Datos;
        $q='DDHH';

        $listado = $datos->obtenerDenuncias($q);

        ?>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

    <?php include_once('comun.php') ?>
    

    <!--infor superior-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12"><h1>Quejas y Denuncias</h1>
            <ol class="breadcrumb">
              <li><i class="icon_desktop"></i>Enviadas</li>
        
            </ol>
          </div>
        </div>
        <!-- contenido de la pagina-->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                
                <table class="table table-hover table-sm caption-top display" id="Contenidos">
                    <thead>
                        <tr>
                            <th scope="col">Folio</th>
                        
                            <th scope="col">Nombre del demandante</th>
                            <th scope="col">Pruebas</th>
                            <th scope="col">Descargar tipo de denuncia</th>
                        </tr>
                    </thead>
                    <tbody id="contenidoTabla">
                        <?php
                        foreach ($listado as $item) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $item['folio']; ?></th>
                                <td style="width:40%;"><?php echo $item['nombre']." ". $item['aprellidoP']." ". $item['apellidoM']; ?></td>
                                <td><?php if($item['archivo']==""){}else{ ?><a href="<?php if(substr($item['archivo'], 0, 1) === '/'){echo ".";} echo $item['archivo']; ?>"> <i class="fas fa-folder-open"></i></a><?php }?><br></td>
                                <td ><?php echo $item['tipodequeja']; ?><a href="formatoDenuncia.php?q=<?php echo $item['id'];?>" ><i class="fas fa-download"></i></a></td> 
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
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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

    </script>


</body>

</html>
