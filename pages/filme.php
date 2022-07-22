<?php   
    $arquivo = "https://api.themoviedb.org/3/movie/{$id}?api_key=".KEY."&language=pt-BR";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    $bg = IMG.$dados->backdrop_path;
    $capa = IMG.$dados->poster_path;
?>
<div class="tarja">
    <div class="row">
        <div class="col-12 col-md-3">
            <img src="<?=$capa?>" alt="<?=$dados->title?>" class="w-100">
        </div>
        <div class="col-12 col-md-9">
            <h2><?=$dados->title?></h2>
            <p><i>"<?=$dados->tagline?>"</i></p>
            <p><strong>Sinopse:</strong></p>
            <p><?=$dados->overview?></p>
        </div>
    </div>
</div>
<h3>Elenco:</h3>
<?php
    $arquivo = "https://api.themoviedb.org/3/movie/{$id}/credits?api_key=".KEY."&language=pt-BR";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);
?>
<div class="row">
    <?php
        $i = 0;
        foreach ( $dados->cast as $dado ) {

            $foto = IMG.$dado->profile_path;
            ?>
            <div class="col-12 col-md-2">
                <div class="card">
                    <a href="ator/<?=$dado->id?>" title="<?=$dado->name?>">
                        <img src="<?=$foto?>" alt="<?=$dado->name?>" class="w-100">
                    </a>
                    <div class="card-body text-center">
                        <p><strong><?=$dado->name?></strong><br>
                        <i><?=$dado->character?></i></p>
                    </div>
                </div>
            </div>
            <?php

            $i++;
            if ( $i > 11 ) goto fim;

        }
        fim:
    ?>
</div>
<h3>Vídeos:</h3>
<div class="row">
    <?php
        $arquivo = "https://api.themoviedb.org/3/movie/{$id}/videos?api_key=".KEY."&language=pt-BR";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        if (!$dados->results) {
            echo "<p class='text-center alert alert-warning'>Nenhum vídeo para este filme!</p>";
        }

        foreach ( $dados->results as $dado ) {
            ?>
            <div class="col-12 col-md-6">
                <div class="card">
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/<?=$dado->key?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <?php
        }
    ?>
</div>