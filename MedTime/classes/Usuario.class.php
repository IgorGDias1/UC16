<?php

require_once('Banco.class.php');

class Usuario {

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $data_nascimento;
    public $id_categoria;

    public $telefone;
    public $id_usuario;

    public function Listar(){
        // View_usuarios = id, nome, email, cpf, data_nascimento, telefone, categoria
        $sql = "SELECT * FROM view_usuarios";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado->rowCount();
    }

    public function ListarPorID(){

        $sql = "SELECT * FROM view_usuarios WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado->rowCount();

    }

    public function Cadastrar(){

        $sql = "INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, id_categoria) 
        VALUES (?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash('sha256', $this->senha);

        try{
        $comando->execute([$this->nome, $this->email, $hash, $this -> cpf, $this -> data_nascimento, $this -> id_categoria]);
            
        Banco::desconectar();

        return $comando->rowCount();
        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function CadastrarTelefone(){

        $sql = "INSERT INTO telefone(telefones, id_usuario) 
        VALUES (?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->telefone, $this->id_usuario]);
            
        Banco::desconectar();

        return $comando->rowCount();
        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Logar(){

        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $hash = hash('sha256', $this->senha);

        try{
        $comando->execute([$this->email, $hash]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;
        } catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Deletar(){

        $sql = "DELETE * FROM usuarios WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

    public function Editar(){
        $sql = "UPDATE usuario SET nome = ?, email = ?, cpf = ?, data_nascimento = ?, id_categoria = ?  WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this -> nome, $this -> email, $this -> cpf, $this -> data_nascimento, $this -> id_categoria]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

    public function Editar_Telefone(){
        $sql = "UPDATE telfone SET telefone = ?, id_usuario = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this -> telefone, $this -> id_usuario]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }


}


?>