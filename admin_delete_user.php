<?php
    require "config.php";
    require "DAO/UsuarioDaoMysql.php";

$userDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, "id");

    if($id ) {
        $userDao->delete($id);
    }

    header("Location: admin-user.php");
    exit;