<?php 

require_once "models/Usuario.php";

class UsuarioDaoMysql implements UsuarioDAO {
    // Atributos
    private $pdo;

    // Construct
    public function __construct( PDO $engine ) {
        $this->pdo = $engine;
    }

    // Métodos
    public function login( $email, $password ){
       
        $sql = $this->pdo->prepare(" SELECT * FROM usuarios WHERE email = :email and password = :password ");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":password", $password);
        $sql->execute();

        if($sql->rowCount() > 0){

            $data = $sql->fetch();

            $user = new Usuario();
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);

            return $user;
        }

    }

    public function add( Usuario $user ){
        
        $sql = $this->pdo->prepare(" INSERT INTO usuarios (name, email, password ) VALUES (:name, :email, :password ) ");
        $sql->bindValue(":name", $user->getName() );
        $sql->bindValue(":email", $user->getEmail() );
        $sql->bindValue(":password", $user->getPassword() );
        $sql->execute();

        $user->setId( $this->pdo->lastInsertId() );

        return $user;
    }

    public function findAll(){
        $array = [];

        $sql = $this->pdo->query(" SELECT * FROM usuarios ");
        
        if($sql->rowCount() > 0 ) {
            $data = $sql->fetchAll();

            foreach( $data as $item ) {

                $user = new Usuario();
                $user->setId( $item['id'] );
                $user->setName( $item['name'] );
                $user->setEmail( $item['email'] );
                $user->setPassword( $item['password'] );
                
                $array[] = $user;
            }
        }
        return $array;
    }

    public function findById( $id ){
        $sql = $this->pdo->prepare(" SELECT * FROM usuarios WHERE id = :id ");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $user = new Usuario();
            $user->setId( $data['id'] );
            $user->setName( $data['name'] );
            $user->setEmail( $data['email'] );

            return $user;
        } else {
            return false;
        }
    
    }

    public function findByEmail( $email ){
        $sql = $this->pdo->prepare(" SELECT * FROM usuarios WHERE email = :email ");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $user = new Usuario();
            $user->setId($data['id']);
            $user->setName($data['name']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);

            return $user;
        } else {
            return false;
        }
    }

    public function update( Usuario $user ){
        $sql = $this->pdo->prepare(" UPDATE usuarios SET name = :name, email = :email, password = :password WHERE id = :id ");
        $sql->bindValue(":id", $user->getId());
        $sql->bindValue(":name", $user->getName());
        $sql->bindValue(":email", $user->getEmail());
        $sql->bindValue(":password", $user->getPassword());
        $sql->execute();

        return true;

        // if($sql->rowCount() > 0) {
        //     $data = $sql->fetch();

        //     $user = new Usuario();
        //     $user->setId($data['id']);
        //     $user->setName($data['name']);
        //     $user->setEmail($data['email']);
        //     $user->setPassword($data['password']);

        //     return $user;
        // }
    }

    public function delete( $id ){
        $sql = $this->pdo->prepare(" DELETE FROM usuarios WHERE id = :id ");
        $sql->bindValue(":id", $id);
        $sql->execute();

       return true;
    }


}