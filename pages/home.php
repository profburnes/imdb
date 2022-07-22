<h1 class="text-center">Últimos Filmes Adicionados</h1>
<?php

    $arquivo = "https://api.themoviedb.org/3/movie/now_playing?api_key=".KEY."&language=pt-BR&page=1";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

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
    }
?>
</div>