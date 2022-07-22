<?php
    $page = $p[1] ?? 1;
    
    $arquivo = "https://api.themoviedb.org/3/person/popular?api_key=".KEY."&language=pt-BR&page={$page}";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    $pages = $dados->total_pages;
?>
<h2>Últimos Populares</h2>
<div class="row">
    <?php
    foreach ($dados->results as $dadosAtor) {

        $foto = IMG.$dadosAtor->profile_path;
        ?>
        <div class="col-12 col-md-2">
            <div class="card">
                <a href="ator/<?=$dadosAtor->id?>" title="<?=$dadosAtor->name?>">
                    <img src="<?=$foto?>" alt="<?=$dadosAtor->name?>" class="w-100">
                </a>
                <div class="card-body text-center">
                    <p><?=$dadosAtor->name?></p>
                </div>
            </div>
        </div>
        <?php
    }
       
    $anterior = $page-1;
    if ( $anterior <= 0 ) $anterior = 1;

    $proxima = $page+1;

    ?>
</div>
<nav aria-label="Page navigation example" class="text-center">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="atores/<?=$anterior?>">Anterior</a></li>
    <li class="page-item"><input type="text" class="form-control" placeholder="Página de 1 a <?=$pages?>" onblur="mostrar(this.value)" inputmode="numeric"></li>
    <li class="page-item"><a class="page-link" href="atores/<?=$proxima?>">Próxima</a></li>
  </ul>
</nav>

<script>
    function mostrar(pagina) {
        location.href='atores/'+pagina;
    }
</script>