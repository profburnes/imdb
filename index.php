<?php
    include "configs/config.php";
    date_default_timezone_set('America/Sao_Paulo');
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMDb - Integrado Movie Database</title>
    <base href="http://<?=$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"]?>">
    <link rel="shortcut icon" href="imagens/icone.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">   
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home">
        <img src="imagens/logo.png" alt="IMDB">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="filmes">Filmes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="atores">Atores</a>
        </li>
      </ul>
      <form class="d-flex" role="search" method="post" action="busca">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-outline-success" type="submit">Busca</button>
      </form>
    </div>
  </div>
</nav>  
<main class="container">
    <?php
        $page = "home";

        if ( isset ( $_GET["param"] ) ) {

            $p = $_GET["param"] ?? NULL;
            $p = explode("/", $p);
            $page = $p[0];
            $id = $p[1] ?? NULL;

        }

        $page = "pages/{$page}.php";

        if ( file_exists( $page ) )  include $page;
        else include "pages/erro.php";

    ?>
</main>
<footer class="bg-dark">
    <p class="text-center">IMDB - Integrado Movie Database</p>
</footer>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>