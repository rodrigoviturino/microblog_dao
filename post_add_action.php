<?php

require "config.php";
require "DAO/PostDaoMysql.php";

$postDao = new PostDaoMysql( $pdo );

$titulo = filter_input(INPUT_POST, "titulo");
$resumo = filter_input(INPUT_POST, "resumo");
$texto = filter_input(INPUT_POST, "texto");

if (isset($titulo) && !empty($titulo) && isset($resumo) && !empty($resumo) && isset($texto) && !empty($texto) ){

    $post = new Post();
    $post->setTitulo( $titulo );
    $post->setResumo( $resumo );
    $post->setTexto( $texto );

    $postDao->addPost( $post );

    header("Location: admin-posts.php");
    exit;

} else {
    header("Location: admin.php");
    exit;
}
