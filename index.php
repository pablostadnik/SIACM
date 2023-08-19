<?php
  session_start();

  require 'logueo/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a S.I.A.C.M</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="logueo/assets/css/style.css">
  </head>
  <body >
    <?php require 'logueo/partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Has ingresado correctamente
      <?php   //header('Location: /Municipalidadfinal/index.php'); ?>
      <a href="logueo/logout.php">
        Cerrar Secion
      </a>
    <?php else: ?>
      <h1>Por favor, Inicia sesion</h1>

      <a href="logueo/login.php">Login</a> 
    <?php endif; ?>
  </body>
</html>