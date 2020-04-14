<?php 
    require "include/header-admin.php"; 
    require "config.php";
    require "DAO/UsuarioDaoMysql.php";

    $userDao = new UsuarioDaoMysql($pdo);
    $lista = $userDao->findAll();
?>

<!-- Side Panel -->
<main class="main-admin">

    <div class="main-admin__wrapper">

        <aside class="main-admin__wrapper__panel">
            <ul>
                <li>
                    <i class="far fa-copy fa-2x">
                    </i>
                    <a href="admin-posts.php">Posts</a>
                </li>
                <li>
                    <i class="far fa-user fa-2x">
                    </i>
                    <a href="admin-user.php" class="activeMenuPanel">Usuario</a>
                </li>
            </ul>
        </aside>

        <section class="main-admin__wrapper__content-posts">
            
            <!-- <div class="breadcrumb">
                <p>Home / Posts</p>
                <hr>
            </div> -->

            <!-- Title Main -->
            <div class="block-title">
                <h2>Gerenciamento de Usuários</h2>
            </div>
            <!-- end Title Main -->

            <!-- Button Insert Posts -->
            <div class="insert-posts">
                <a href="#" class="btn-insert-posts">Inserir Novo Usuários</a>
            </div>

            <!-- Insert New User -->
            <section class="form-add-post form-add-js">
                <div class="form-add-post__header btn-close-js">
                    <i class="btn-close  fas fa-times-circle fa-2x"></i>
                </div>
                <h2 class="title">Inserir Usuário</h2>

                <form action="user_add_action.php" method="POST" class="form-add-post__form">
                    <div class="mb-1">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome">
                    </div>
                    <div class="mb-1">
                        <label for="email">E-mail:</label>
                        <input type="text" name="email">
                    </div>
                    <div class="mb-1">
                        <label for="senha">Senha:</label>
                        <input type="text" name="senha">
                    </div>
                    <button name="inserir" class="btn-insert">Inserir Usuário</button>
                </form>

            </section>
            <!-- end Insert New User -->

            <!-- end Button Insert Posts -->
            
            <!-- Table Posts -->
            <table class="table-posts">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>E-MAIL</th>
                        <th>SENHA</th>
                        <th colspan="2">AÇÕES</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Row Info Table -->
                <?php foreach( $lista as $usuario ) : ?>
                    <tr>
                        <td><?= $usuario->getId(); ?></td>
                        <td><?= $usuario->getName(); ?></td>
                        <td><?= $usuario->getEmail(); ?></td>
                        <td><?= $usuario->getPassword(); ?></td>
                        <td>
                            <a href="edit_user.php?id=<?= $usuario->getId(); ?>" class="btn-update">Atualizar</a>
                        </td>
                        <td>
                            <a href="delete_user.php?id=<?= $usuario->getId(); ?>"  class="btn-delete">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>

            </table>
            <!-- end Table Posts -->

        </section>

    </div>

</main>
<!-- end Side Panel -->

<?php require "include/footer-admin.php"; ?>