<?php
    require "config.php";
    require "DAO/UsuarioDaoMysql.php";

    $userDao = new UsuarioDaoMysql( $pdo );

    $id = filter_input(INPUT_GET, 'id');
    $user = false;

    if($id) {

        $user = $userDao->findById( $id );
        
    } elseif($user === false ) {
        // header("Location: admin-user.php");
        // exit;
        echo "ERRO!";
    }

?>
    <h1>Editar Usuário</h1>

    <form method="POST" action="admin_user_edit_action.php">
    
    <input type="hidden" name="id" value="<?= $user->getId(); ?>">    

        <label>
            Nome: <br>
            <input type="text" name="name" value="<?= $user->getName(); ?>">
        </label>
        <br><br>
        
        
        <label>
            E-mail: <br>
            <input type="email" name="email" value="<?= $user->getEmail(); ?>">
        </label>
        <br> <br>

        <button type="submit">Salvar</button>

    </form>

