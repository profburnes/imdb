<h1 class="text-center">Últimos Filmes Adicionados</h1>
<?php
    $page = $p[1] ?? 1;
    $arquivo = "https://api.themoviedb.org/3/movie/now_playing?api_key=".KEY."&language=pt-BR&page={$page}";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    $pages = $dados->total_pages;
?>
<div class="row">
<?php
    foreach ( $dados->results as $dado ) {
        ?>
        <div class="col-12 col-md-3">
            <div class="card">
                <img src="<?=IMG?>/<?=$dado->poster_path?>" alt="<?=$dado->title?>" class="w-100">
                <div class="card-body">
                    <p class="title"><strong><?=$dado->title?></strong></p>
                    <p class="text-center">
                        <a href="filme/<?=$dado->id?>" title="<?=$dado->title?>" class="btn btn-warning btn-sm">
                            Detalhes do Filme
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <?php

        $anterior = $page-1;
        if ( $anterior <= 0 ) $anterior = 1;

        $proxima = $page+1;
    }
?>
</div>

<nav aria-label="Page navigation example" class="text-center">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="filmes/<?=$anterior?>">Anterior</a></li>
    <li class="page-item"><input type="text" class="form-control" placeholder="Página de 1 a <?=$pages?>" onblur="mostrar(this.value)" inputmode="numeric"></li>
    <li class="page-item"><a class="page-link" href="filmes/<?=$proxima?>">Próxima</a></li>
  </ul>
</nav>

<script>
    function mostrar(pagina) {
        location.href='filmes/'+pagina;
    }
</script>
