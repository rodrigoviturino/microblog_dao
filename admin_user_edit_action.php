<?php 
    require "config.php";
    require "DAO/UsuarioDaoMysql.php";

    $userDao = new UsuarioDaoMysql( $pdo );

    $id = filter_input(INPUT_POST, "id");
    $name = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_EMAIL);

    
    if( $id && $name && $email ){

        $user = new Usuario();
        $user->setId( $id );
        $user->setName( $name );
        $user->setEmail( $email );
        $user->setPassword( $password );


        $userDao->update( $user );

        header("Location: admin-user.php");
        exit;
    } else {
        header("Location: admin_edit_user.php");
        exit;
    }