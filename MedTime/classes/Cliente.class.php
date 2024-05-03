<?php

require_once('Banco.class.php');

class Cliente {

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $data_nascimento;
    public $telefone_celular;
    public $telefone_residencial;
    public $id_localizacao;
    public $id_convenio;
    public $tipo;


    public function Listar(){

        $sql = "SELECT * FROM clientes";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;
    }

    public function ListarPorID(){

        $sql = "SELECT * FROM clientes WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarFuncionarios(){

        $sql = "SELECT * FROM clientes WHERE tipo = Funcionario";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function Cadastrar(){

        $sql = "INSERT INTO clientes(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio, tipo) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash('sha256', $this->senha);
        $formato_data = date_format(date_create($this->data_nascimento),"Y/m/d");    

        try{
        $comando->execute([$this->nome, $this->email, $hash, $this->cpf, $formato_data, $this->telefone_celular, $this->telefone_residencial, $this->id_localizacao, $this->id_convenio, $this->tipo]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }


    public function Logar(){
        $sql = "SELECT * FROM clientes WHERE email = ? AND senha = ?";

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

        $sql = "DELETE FROM clientes WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

    public function Editar(){
        $sql = "UPDATE clientes SET nome = ?, email = ?, cpf = ?, data_nascimento = ?, telefone_celular = ?, telefone_residencial = ?, id_localizacao = ?, id_convenio = ?, tipo = ?  WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this -> nome, $this -> email, $this -> cpf, $this -> data_nascimento, $this -> telefone_celular, $this->telefone_residencial, $this->id_localizacao, $this->id_convenio, $this->tipo, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

}


?>