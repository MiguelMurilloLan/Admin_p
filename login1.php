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

<body class="text-center">

  <main class="form-signin">
    <form action="manejador-login.php" method="POST">
      <img class="mb-4" src="../Recursos/logo.png" alt="" width="auto" height="57">
      <h1 class="h3 mb-3 fw-normal">Inicie sesion</h1>
      <label for="inputUsuario" class="visually-hidden">Usuario</label>
      <input type="text" id="inputUsuario" class="form-control" placeholder="Usuario" name="Usuario" required autofocus>
      <label for="inputContrasena" class="visually-hidden">Contraseña</label>
      <input type="password" id="inputContrasena" class="form-control" placeholder="Contraseña" name="Contrasena" required>
      <input class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="Entrar"></input>
      <?php
      if (isset($_SESSION['error'])) {
      ?>
        <p style="color:red"><?php echo $_SESSION['error']; ?></p>
      <?php
      }
      unset($_SESSION['error']);
      ?>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </main>



</body>

</html>