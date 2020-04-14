
<?php require "include/header-admin.php"; ?>

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
                    <a href="admin-user.php">Usuario</a>
                </li>
            </ul>
        </aside>

        <section class="main-admin__wrapper__content-main">
            <div class="block-title">
                <h2 class="title">Bem-vindo(a) Rodrigo Viturino de Souza</h2>
                <p class="text">Você está no painel de controle e administração do site Microblog.</p>
                <p class="text">Escolha o que deseja gerenciar:</p>

                <ul>
                    <li>
                        <a href="admin-posts.php"><i class="fas fa-caret-right fa-2x"></i> Gerenciar Posts</a>
                    </li>

                    <li>
                        <a href="admin-user.php"><i class="fas fa-caret-right fa-2x"></i> Gerenciar Usuários</a>
                    </li>
                </ul>
            </div>
        </section>

    </div>

</main>
<!-- end Side Panel -->
    
<?php require "include/footer-admin.php"; ?>