<h1>Resultado da Busca</h1>

<?php
    $query = $_POST["query"] ?? NULL;

    if ( !empty ( $query ) ) {
        $arquivo = "https://api.themoviedb.org/3/search/movie?query={$query}&api_key=".KEY."&language=pt-BR&page=1&include_adult=false";
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
<?php
    } else {

        echo "<p class='alert alert-warning text-center'></p>";
    }


?>
