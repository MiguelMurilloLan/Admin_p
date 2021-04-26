<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />


  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
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
  <link href="../css/signin.css" rel="stylesheet">
</head>

<body class="login-img3-body">

  <main class="form-signin">
    <form action="manejador-login.php" method="POST">
       <div class="login-wrap" style="background: #7f8b7e;
    opacity: .9;">
        <img class="mb-4" src="..../Recursos/icono_pag.png" alt="" width="auto" height="57">
        <h1 class="h3 mb-3 fw-normal">Iniciar sesion</h1>
        <div class="input-group">
        <label for="inputUsuario" class="visually-hidden">Usuario</label>
        <input type="text" id="inputUsuario" class="form-control" placeholder="Usuario" name="Usuario" required autofocus></div>
        <div class="input-group">
        <label for="inputContrasena" class="visually-hidden">Contraseña</label>
        <input type="password" id="inputContrasena" class="form-control" placeholder="Contraseña" name="Contrasena" required></div>
        <input class="w-100 btn btn-lg btn-primary" style="background-color: #9069a0; border-color: #9069a0;" type="submit" name="submit" value="Entrar"></input>
      </div>
      <?php
      if (isset($_SESSION['error'])) {
      ?>
        <p style="color:red"><?php echo $_SESSION['error']; ?></p>
      <?php
      }
      unset($_SESSION['error']);
      ?>
      <p class="mt-5 mb-3 text-muted" style="color: white !important; text-align: center;" >&copy; 2021</p>
    </form>
  </main>



</body>

</html>