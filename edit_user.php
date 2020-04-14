<?php
require "config.php";
require "DAO/UsuarioDaoMysql.php";

$userDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');
$usuario = false;

    if($id) {

        $usuario = $userDao->findById( $id );
        
    } elseif($usuario === false ) {
        header("Location: index.php");
        exit;
    }
?>

    <h1>Editar Usuario</h1>

    <form method="POST" action="editar_user_action.php">

    <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">

    <label>
        Nome: <br>
        <input type="text" name="name" value=" <?= $usuario->getName(); ?>">
    </label>
    <br><br>

    <label>
        E-mail: <br>
        <input type="text" name="email" value="<?= $usuario->getEmail(); ?>">
    </label>
    <br> <br> 

    <label>
        Senha: <br>
        <input type="text" name="password" value="<?= $usuario->getPassword(); ?> ">
    </label>
    <br> <br> 

    <button type="submit">Salvar</button>
</form>
