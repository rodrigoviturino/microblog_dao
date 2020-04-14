<?php

require "config.php";
require "DAO/UsuarioDaoMysql.php";

$userDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "senha");

if( isset( $name ) && isset( $email ) && isset( $password ) ){

    if( !empty($name) && !empty($email) && !empty($password)) {

   
        if( $userDao->findByEmail( $email ) === false ) {

            $user = new Usuario();
            $user->setName( $name );
            $user->setEmail( $email );
            $user->setPassword( $password );

            $userDao->add( $user );

            echo "Usuario Adicionado!";

            header("Location: admin-user.php");
            exit;

        } else {
            header("Location: admin-user.php");
            exit;
        }
    } else {
        header("location: admin-user.php");
        exit;
    }
}