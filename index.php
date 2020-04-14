<?php 
require "include/header.php"; 
require "config.php";
require "DAO/PostDaoMysql.php";

$postDao = new PostDaoMysql( $pdo );
$lista = $postDao->findAllPost();

?>

<!-- Banner Home -->
<section class="banner-home">
    <div class="container banner-home__wrapper">
        <div class="grid-12 offset-5 banner-home__wrapper__block-title">
            <h1 class="title">That's so cute</h1>
            <p class="text">That's not soon enough! I usually try to keep my sadness pent up inside where it can fester quietly as a mental illness.</p>
            <a href="#" class="btn">read more</a>
        </div>
    </div>
</section>
<!-- end Banner Home -->

<!-- Card Posts -->
<section class="cards-posts">
    <div class="container">
        <div class="block-title">
            <h2>Posts Recentes</h2>
            <p>Insira o seu também!</p>
        </div>

        <!-- Posts -->
        <div class="container">
    <?php foreach ($lista as $post) : ?>
        <div class="grid-3 cards-posts__item">

            <article>
                <figure>
                    <a href="#">
                        <img src="assets/img/post-01.jpg" alt="">
                    </a>
                </figure>
         
                <div class="wrapper">
                    <div class="info">
                        <span class="title-post"><?= $post->getTitulo(); ?></span> <span class="separator"></span> <span class="date">Dezembro 07 - 2019</span></p>
                    </div>
                    <p class="text"><?= $post->getResumo(); ?></p>
                    <a href="single-post.php?id=<?= $post->getId(); ?>">Continue Lendo</a>
                </div>  
            </article>
        </div>
    <?php endforeach; ?>
        </div>
        <!-- end Posts -->
    </div>
</section>
<!-- end Card Posts -->

<?php require "include/footer.php"; ?>