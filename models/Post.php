<?php

class Post {
    private $id;
    private $titulo;
    private $texto;
    private $autor;
    private $resumo;
    
    // Getters
    public function getId(){
        return $this->id;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getResumo(){
        return $this->resumo;
    }

    // Setters
    public function setId( $id ){
        $this->id = $id;
    }
    
    public function setTitulo( $titulo ){
        $this->titulo = $titulo;
    }
    
    public function setTexto( $texto ){
        $this->texto = $texto;
    }

    public function setAutor( $autor ){
        $this->autor = $autor;
    }

    public function setResumo( $resumo ){
        $this->resumo = $resumo;
    }

}

interface PostDAO {

    public function addPost(Post $post);

    public function findById( $id );

    public function findAllPost();

    public function updatePost( Post $id );

    public function deletePost( $id );

}