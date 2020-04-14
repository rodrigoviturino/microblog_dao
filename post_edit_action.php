<?php

    require "config.php";
    require "DAO/PostDaoMysql.php";

$postDao = new PostDaoMysql( $pdo );

$id = filter_input(INPUT_POST, "id");
$titulo = filter_input(INPUT_POST, "titulo");
$texto = filter_input(INPUT_POST, "texto");
$autor = filter_input(INPUT_POST, "autor");
$resumo = filter_input(INPUT_POST, "resumo");


if($id && $titulo && $texto && $autor && $resumo ){

    $post = new Post();
    $post->setId( $id );
    $post->setTitulo( $titulo );
    $post->setTexto( $texto );
    $post->setAutor( $autor );
    $post->setResumo( $resumo );
    
    $postDao->updatePost( $post );

    header("Location: admin-posts.php");
    exit;

} else {
    header("Location: admin.php");
    exit;
}