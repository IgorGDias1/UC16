<?php

require_once('Banco.class.php');

class Funcionario {

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $telefone;
    public $id_localizacao;
    public $id_cargo;
    public $id_especialidade;
    public $situacao;

    public function Listar(){
        $sql = "SELECT * FROM funcionarios";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado->rowCount();

    }

    public function ListarPorID(){

        $sql = "SELECT * FROM funcionarios WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado -> rowCount();

    }

    public function Cadastrar(){

        $sql = "INSERT INTO clientes(nome, email, senha, cpf, telefone, id_localizacao, id_cargo, id_especialidade, situacao) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash('sha256', $this->senha);

        try{
        $comando->execute([$this->nome, $this->email, $hash, $this->cpf, $this->telefone, $this->id_localizacao, $this->id_cargo, $this->id_especialidade, $this->situacao]);
            
        Banco::desconectar();

        return $comando->rowCount();
        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Logar(){
        $sql = "SELECT * FROM funcionarios WHERE email = ? AND senha = ?";

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

    public function Editar(){
        $sql = "UPDATE funcionarios SET nome = ?, email = ?, cpf = ?, telefone = ?, id_localizacao = ?, id_cargo = ?, id_especialidade = ?, situacao = ?
        WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this -> nome, $this -> email, $this -> cpf, $this -> telefone, $this -> id_localizacao, $this->id_cargo, $this->id_especialidade, $this->situacao, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

    public function Deletar(){

        $sql = "DELETE * FROM funcionarios WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

}


?>