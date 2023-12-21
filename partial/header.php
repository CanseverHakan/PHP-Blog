<?php
require_once './function.php';
require_once './db.php';

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  unset($_SESSION['user']);
  header('Location: login.php');
  exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Article
            </a>
            <ul class="dropdown-menu">
              <?php if (!userConnected()) : ?>
                <li><a class="dropdown-item" href="register.php">Register</a></li>
                <li><a class="dropdown-item" href="login.php">Login</a></li>
              <?php endif; ?>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="add_artcile.php">Add article</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <?php if (userConnected()) : ?>
        <div class="m-auto">
          <div class="text-white">
            <?= $_SESSION['user']['email'] ?>
          </div>
          <div>
            <a class="nav-link text-white" href="login.php?action=logout">
              Logout
            </a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </nav>