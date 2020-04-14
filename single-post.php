<?php
require "include/header.php";
require "config.php"; 
require "DAO/PostDaoMysql.php";

$userDao = new PostDaoMysql( $pdo );
$id = filter_input(INPUT_GET, "id");
$post = false;

if($id){
  
    $posts = $userDao->findById( $id );
    
        
}

?>


<!-- Banner Interna -->
<section class="banner-interno">
    <div class="container banner-interno__block-title">
        <h2><?= $posts->getTitulo(); ?></h2>
        <p><?= $posts->getResumo(); ?></p>
    </div>
</section>
<!-- end Banner Interna -->

<!-- Conteudo -->
<section class="page-internal">
    <div class="container">
        <div class="page-internal__block-title">
            <h2>Titulo Grande</h2>
            <h3>Titulo Médio</h3>
        </div>

        <p><?= $posts->getTexto(); ?></p>        
        <p>Autor: <?= $posts->getAutor(); ?></p>
    </div>
</section>
<!-- end Conteudo -->


<?php require "include/footer.php"; ?>