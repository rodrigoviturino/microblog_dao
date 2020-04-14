<h1>Editar Post</h1>

<form method="POST" action="post_edit_action.php">

    <input type="hidden" name="id" value="<?= $post->getId(); ?>">    

    <label> Titulo: </label>
    <input type="text" name="titulo" value="<?= $post->getTitulo(); ?>">

    <label> Texto: </label>
    <input type="text" name="texto" value="<?= $post->getTexto(); ?>">

    <label> Autor: </label>
    <input type="text" name="autor" value="<?= $post->getAutor(); ?>">

    <label> Resumo: </label>
    <input type="text" name="resumo" value="<?= $post->getResumo(); ?>">


    <button type="submit">Salvar</button>

</form>