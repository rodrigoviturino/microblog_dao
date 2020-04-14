<?php
    require "include/header-login.php"; 
?>


<!-- Content -->
<main class="login">
    
    <div class="login__column-left">
        <a href="index.php" class="logo">Microblog</a>
        <a href="index.php" class="page-initial">Acessar Página inicial <i class="fas fa-angle-double-right"></i></a>
    </div>

    <div class="login__column-right">
        <h2 class="title">Login Here</h2>

        <form action="login-action.php" class="form" method="POST">
            <input type="text" name="email" placeholder="E-mail Address">
            <input type="text" name="password" placeholder="Password">
            <a href="#" class="password">Recuperar senha</a>
            <button>Login</button>
        </form>

    </div>

</main>
<!-- end Content -->

<?php require "include/footer-login.php"; ?>