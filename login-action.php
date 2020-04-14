<?php
// Lembrar de iniciar sessao para setar o nome do usuario logado no admin
require "config.php";
require "DAO/UsuarioDaoMysql.php";

$userDao = new UsuarioDaoMysql($pdo);

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password");

if ( !empty($email) && !empty($password) ) {
    
    if($userDao->login( $email, $password )){
        $user = new Usuario();
        $user->setEmail($email);
        $user->setPassword($password);
        
        header("Location: admin.php");
        exit;    
    } else {
        header("Location: login.php");
        exit;    
    }
    
} else {
    header("Location: login.php");
    exit;
}

