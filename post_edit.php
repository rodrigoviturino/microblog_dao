<?php 
    require "include/header-admin.php";
    require "config.php";
    require "DAO/PostDaoMysql.php";

$postDao = new PostDaoMysql( $pdo );
$id = filter_input(INPUT_GET, "id");
$post = false;

if($id) {

    $post = $postDao->findById( $id );

} elseif ($post === false ) {
    return false;
}

?>
    <section class="post-edit">
        <div class="container">
            <div class="post-edit-form">
                <?php require_once "template-parts/post_edit_form.php"; ?>
            </div>

        </div>
    </section>

<?php 
    require "include/footer-admin.php";
?>