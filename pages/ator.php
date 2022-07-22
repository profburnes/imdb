<?php   
    $arquivo = "https://api.themoviedb.org/3/person/{$id}?api_key=".KEY."&language=pt-BR";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    $foto = IMG.$dados->profile_path;
?>
<div class="tarja">
    <div class="row">
        <div class="col-12 col-md-3">
            <img src="<?=$foto?>" alt="<?=$dados->name?>" class="w-100">
        </div>
        <div class="col-12 col-md-9">
            <h2><?=$dados->name?></h2>
            <p><strong>Data de nascimento:</strong> <?=formatarData($dados->birthday);?></p>
            <p><strong>Biografia:</strong></p>
            <p><?=$dados->biography?></p>
        </div>
    </div>
</div>
<h3>Outros filmes do mesmo Ator</h3>
<div class="row">
<?php
    $arquivo = "https://api.themoviedb.org/3/person/{$id}/movie_credits?api_key=".KEY."&language=pt-BR";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    foreach ( $dados->cast as $dado ) {

        $foto = IMG.$dado->poster_path;

        ?>
        <div class="col-12 col-md-2">
            <div class="card">
                <a href="filme/<?=$dado->id?>" title="<?=$dado->title?>">
                    <img src="<?=$foto?>" alt="<?=$dado->title?>" class="w-100">
                </a>
                <div class="card-body text-center">
                    <p><strong><?=$dado->title?></strong><br>
                    <i><?=$dado->character?></i></p>
                    <p><small>Data de lançamento:<br><?=formatarData($dado->release_date)?></small></p>
                </div>
            </div>
        </div>
        <?php


    }
?>
</div>