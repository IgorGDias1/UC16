<?php

require_once('Banco.class.php');

class Usuario {

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $id_telefone;
    public $data_nascimento;
    public $id_categoria;

    public function Listar(){
        // View_usuarios = id, nome, email, cpf, data_nascimento, telefone, categoria
        $sql = "SELECT * FROM view_usuarios";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

    }

    public function ListarPorID(){

        $sql = "SELECT * FROM view_usuarios WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

    }

    public function Cadastrar(){

        $sql = "INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, id_categoria) 
        VALUES (?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash('sha256', $this->senha);

        try{
        $comando->execute([$this->nome, $this->email, $hash, $this -> cpf, $this -> id_telefone, $this -> data_nascimento, $this -> id_categoria]);
            
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
        $comando->execute([$this->email, $hash]);

        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $arr_resultado;

    }

}


?>