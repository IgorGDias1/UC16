<?php

require_once('Banco.class.php');

class Localizacao {

    public $id;
    public $cep;
    public $logradouro;
    public $complemento;
    public $bairro;
    public $localidade;
    public $uf;
    public $ddd;
    public $tipo;

    public function Listar(){
        $sql = "SELECT * FROM localizacoes";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarPorID(){

        $sql = "SELECT * FROM localizacoes WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado -> rowCount();

    }

    public function ListarClinicas(){

        $sql = "SELECT * FROM localizacoes WHERE tipo = 'Clinica'";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }


    public function VerificarSeExiste(){

        $sql = "SELECT * FROM localizacoes WHERE cep = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> cep]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function Cadastrar(){

        $sql = "INSERT INTO localizacoes(cep, logradouro, complemento, bairro, localidade, uf, ddd, tipo) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->cep, $this->logradouro,$this -> complemento, $this -> bairro, $this -> localidade, $this -> uf, $this -> ddd, $this->tipo]);
            
        Banco::desconectar();

        return $comando->rowCount();
        
        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Deletar(){

        $sql = "DELETE FROM localizacoes WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

    public function Editar(){
        $sql = "UPDATE localizacoes SET cep = ?, logradouro = ?, complemento = ?, bairro = ?, localidade = ?, uf = ?, ddd = ?, tipo = ?  WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->cep, $this->logradouro, $this->complemento, $this->bairro, $this->localidade, $this->uf, $this->ddd, $this->tipo, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

}


?>