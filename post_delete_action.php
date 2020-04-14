<?php
    require "config.php";
    require "DAO/PostDaoMysql.php";

$postDao = new PostDaoMysql( $pdo );
$id = filter_input(INPUT_GET, "id");

    if($id){
        if( $postDao->findById( $id ) ) {
            $postDao->deletePost( $id );
            header("Location: admin.php");
            exit;
        }
    } else {
        header("Location: admin-user.php");
        exit;
    }
    
