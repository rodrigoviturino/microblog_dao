<?php

class Usuario {

    private $id;
    private $name;
    private $email;
    private $password;

    // Getters
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }


    // Setters 
    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = ucwords(trim($name));
    }

    public function setEmail($email){
        $this->email = strtolower(trim($email) );
    }

    public function setPassword($password){
        $this->password = $password;
    }
 
    
}

// Interface Usuario
interface UsuarioDAO {

    public function login($email, $password );
    
    public function add( Usuario $user );

    public function findAll();

    public function findById( $id );

    public function findByEmail( $email );

    public function update( Usuario $user );

    public function delete( $id );

}
