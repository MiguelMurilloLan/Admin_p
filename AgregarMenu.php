<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
  <title>Agregar Menu</title>

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

 
    <script language="javascript">
		/*	$(document).ready(function(){
				$("#lista1").change(function () {
 
					//$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#lista1 option:selected").each(function () {
						id_menu = $(this).val();
						$.post("common/categoria.php", { id_menu: id_menu }, function(data){
							$("#lista2").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#lista2").change(function () {
					$("#lista2 option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});*/
		</script>

</head>

<body>
  
<?php
include_once('../php/connection.php');
include_once('../php/datos.php');

$datos = new Datos;

$listado = $datos->obtenerCategoria();

?>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

    <?php include_once('comun.php') ?>

    <!--infor superior-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
 
            <ol class="breadcrumb">
              <li><i class="fa fa fa-bars"></i> Menu</li>
              <li><i class="fa fa-bars"></i>Agregar a Menu</li>
            
            </ol>
          </div>
        </div>
        <!-- contenido de la pagina-->
        <section class="panel">
              <header class="panel-heading tab-bg-primary ">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="#Categoria">Categoria</a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#sub">Sub-Menu</a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#Submenu">Sub Sub-Menu</a>
                  </li>
                  
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <!-- categoria-->
                  <div id="Categoria" class="tab-pane active">
                    <div class="col-md-9 portlets">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <div class="pull-left">Agregar Categoría</div>
                             
                              <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                              <div class="padd">

                                <div class="form quick-post">
                                  <!-- Edit profile form (not working)-->
                                  <form class="form-horizontal" action="agregarmenuBD.php" method="POST"  >
                                    <!-- Cateogry -->
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">Menu Principal</label>
                                      <div class="col-lg-10">
                                        <select class="form-control" name="idc[]">
                                          <?php foreach ($listado as $categoria){?>
                                              <option  value="<?php echo $categoria['idGrupo']; ?>"><?php echo $categoria['Descripcion'] ; ?></option>
                                          <?php } ?>             
                                          </select>
                                      </div>
                                    </div>
                                   
                                    <!-- Title -->
                                    <div class="form-group">
                                      <label class="control-label col-lg-2" for="title" require>Nombre de la Categoria</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control" id="title" name="titulo">
                                      </div>
                                    </div>
                                    <!-- Content -->
                                    <div class="form-group">
                                      <label class="control-label col-lg-2" for="content">Tipo</label>
                                      <div class="col-lg-10">
                                        <div class="col-lg-4">
                                            <input type="radio" name="contenido" value="contenido.php">
                                            <label for="">Grid</label>
                                            <img width="170px" src="img/contenido.png">
                                            
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="radio" name="contenido" value="nuevo.php">
                                            <label for="">Libre</label>
                                            <img width="170px" src="img/solo.png">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="radio" name="contenido" value="Submenu 1">
                                            <label for="">Submenu</label>
                                         </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="control-label col-lg-2" for="title">Activado</label>
                                      <div class="col-lg-10">
                                      <div class="btn-row">
                                            <div class="btn-group" data-toggle="buttons">
                                              <label class="btn btn-default  " >
                                                   <input type="radio" name="act"  value="1"> Si
                                              </label>
                                              <label class="btn btn-default">
                                                    <input type="radio" name="act" value="0"> No
                                               </label>
                                              
                                            </div>
                                          </div>
                                      </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="form-group">
                                      <!-- Buttons -->
                                      <div class="col-lg-offset-2 col-lg-9">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                      
                                      </div>
                                    </div>
                                  </form>

                                </div>


                              </div>
                              
                            </div>
                          </div>

                        </div>
                        <div class="col-md-3 ">
                            <p>h</p>
                          <img width="250px" src="img/menu.jpg">
                        </div>
                                  
                  </div>
                  <!-- contenido sub-->
                  <div id="sub" class="tab-pane">
                     <div class="col-md-9 portlets">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <div class="pull-left">Agregar un Submenu</div>
                             
                              <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                              <div class="padd">

                                <div class="form quick-post">
                                  <!-- Edit profile form (not working)-->
                                  <form class="form-horizontal">
                                    <!-- Cateogry -->
                                    <div class="form-group">
                                      <label class="control-label col-lg-2">Menu Principal</label>
                                      <div class="col-lg-10">
                                        <select class="form-control" id="lista1">
                                          <?php foreach ($listado as $categoria){?>
                                              <option value="<?php echo $categoria['idGrupo'] ; ?>"><?php echo $categoria['Descripcion'] ; ?></option>
                                          <?php } ?>             
                                          </select>
                                      </div>
                                    </div>
                                     <!-- subCateogry -->
                                     <div class="form-group">
                                      <label class="control-label col-lg-2">Categoría</label>
                                      <div class="col-lg-10" >
                                         <select id="lista2" name="idc[]"></select>
                                      </div>
                                    </div>

                                   
                                    <!-- Title -->
                                    <div class="form-group">
                                      <label class="control-label col-lg-2" for="title" require>Nombre de la Categoria</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control" id="title">
                                      </div>
                                    </div>
                                    <!-- Content -->
                                    <div class="form-group">
                                      <label class="control-label col-lg-2" for="content">Tipo</label>
                                      <div class="col-lg-10">
                                        <div class="col-lg-4">
                                            <input type="radio" id="male" name="gender" value="male">
                                            <label for="male">Grip</label>
                                            <img width="170px" src="img/contenido.png">
                                            
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="radio" id="female" name="gender" value="female">
                                            <label for="female">Libre</label>
                                            <img width="170px" src="img/solo.png">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="radio" id="other" name="gender" value="other">
                                            <label for="other">Submenu</label>
                                         </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-lg-2" for="title">Activado</label>
                                      <div class="col-lg-10">
                                      <div class="btn-row">
                                            <div class="btn-group" data-toggle="buttons">
                                              <label class="btn btn-default active " >
                                                   <input type="radio" name="options" values="1"> Si
                                              </label>
                                              <label class="btn btn-default">
                                                    <input type="radio" name="options" id="option2"> No
                                               </label>
                                              
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    

                                    <!-- Buttons -->
                                    <div class="form-group">
                                      <!-- Buttons -->
                                      <div class="col-lg-offset-2 col-lg-9">
                                        <button type="submit" class="btn btn-primary">Publish</button>
                                      
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-3 ">
                            <p>h</p>
                          <img width="250px" src="img/sub.png">
                        </div>
                                  
                  </div>
                  <!-- contenido de la pagina-->
                  <div id="Submenu" class="tab-pane">Profile</div>
           
                </div>
              </div>
            </section>

            
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
</body>

</html>

<script typr="text/javascript">
      $(document).ready(function () {
        
        recargarLista();
        $('#lista1').change(function () {
          recargarLista();
        });
      })
</script>
<script typr="text/javascript">
      function recargarLista(){
        $.ajax({
          type:"POST",
          url:"../php/datos.php",
          data:"submenu="+$('#lista1').val()
          success:function (r) {
             $('#lista2').html(r);
          }
        }); 
      }
</script>