<?php 
require "config.php";
require "models/Post.php";

class PostDaoMysql implements PostDAO {
    private $pdo;

    public function __construct( PDO $engine) {
        $this->pdo = $engine;
    }

    public function addPost( Post $post ){
        $sql = $this->pdo->prepare(" INSERT INTO posts (titulo, resumo, texto) VALUES (:titulo, :resumo, :texto) ");
        $sql->bindValue(":titulo", $post->getTitulo());
        $sql->bindValue(":resumo", $post->getResumo());
        $sql->bindValue(":texto", $post->getTexto());
        $sql->execute();

        $post->setId( $this->pdo->lastInsertId());

        return $post;

    }

    public function findById( $id ){

        $sql = $this->pdo->prepare(" SELECT * FROM posts WHERE id = :id ");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0 ){

            $data = $sql->fetch();
            
            $post = new Post();
            $post->setId( $data['id']);
            $post->setTitulo( $data['titulo']);
            $post->setTexto( $data['texto']);
            $post->setAutor( $data['autor']);
            $post->setResumo( $data['resumo']);
            
            return $post;
        } else {
            return false;
        }
    }

    public function findAllPost(){
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM posts ");
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $data = $sql->fetchAll();

            foreach ($data as $item) {
            
                $post = new Post();
                $post->setId( $item['id'] );
                $post->setTitulo( $item['titulo'] );
                $post->setTexto( $item['texto'] );
                $post->setAutor( $item['autor'] );
                $post->setResumo( $item['resumo'] );

                $array[] = $post;
            }
        }
        return $array;
    }

    public function updatePost( Post $post ){
        $sql = $this->pdo->prepare(" UPDATE posts SET titulo = :titulo, texto = :texto, autor = :autor,  resumo = :resumo WHERE id = :id ");

        $sql->bindValue(":id", $post->getId());
        $sql->bindValue(":titulo", $post->getTitulo());
        $sql->bindValue(":texto", $post->getTexto());
        $sql->bindValue(":autor", $post->getAutor());
        $sql->bindValue(":resumo", $post->getResumo());
        $sql->execute();

        return true;

    }

    public function deletePost( $id ){
       $sql = $this->pdo->prepare(" DELETE FROM posts WHERE id = :id ");
       $sql->bindValue(":id", $id);
       $sql->execute();

       return true;
    }

}