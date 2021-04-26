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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">



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

<?php
include_once('../php/connection.php');
include_once('../php/datos.php');

$datos = new Datos;

$listado = $datos->obtenerListadoAC();

?>

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
        <div class="toast" id="toast" style="position: fixed;top:5em;right:1em;z-index:999;">

        </div>
        <div class="row">
            <!-- NAV -->
                <?php include_once('./common/nav.php'); ?>
            <!-- /NAV -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1>Contenidos</h1>
                <table class="table table-hover table-sm caption-top display" id="Contenidos">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Año</th>
                            <th scope="col">Periodo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="contenidoTabla">
                        <?php
                        foreach ($listado as $item) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $item['IdArmonizacionContable']; ?></th>
                                <td><?php echo $item['Año']; ?></td>
                                <td><?php echo $item['Periodo']; ?></td>
                                <td><?php echo $item['Categoria']; ?></td>
                                <td><?php echo $item['Nombre']; ?></td>
                                <td><a style="margin-right: 10px;" href="editar-armonizacioncontable.php?id=<?php echo $item['IdArmonizacionContable']; ?>"><i class="fas fa-edit"></i></a><a href="#" onclick="return false;"><i class="fas fa-trash-alt" id="<?php echo $item['IdArmonizacionContable']; ?>" onclick="borrarAC(this)"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
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

        function borrarAC(item) {
            var item = item
            var id = item.id
            $.ajax({
                url: "ajax/eliminar-armonizacioncontable.php",
                type: "post",
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(result) {
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

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

</body>

</html>