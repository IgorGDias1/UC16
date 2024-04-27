<?php

require_once('Banco.class.php');

class Profissional {

    public $id;
    public $nome;
    public $id_especialidade;
    public $id_localizacao;
    public $situacao;

    public function Listar(){
        $sql = "SELECT * FROM view_profissionais";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado->rowCount();

    }

    public function ListarPorID(){

        $sql = "SELECT * FROM view_profissionais WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado -> rowCount();

    }

    public function Cadastrar(){

        $sql = "INSERT INTO profissionais(nome, id_especialidade, id_localizacao, situacao) 
        VALUES (?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->nome, $this->id_especialidade,$this -> id_localizacao, $this -> situacao]);
            
        Banco::desconectar();

        return $comando->rowCount();
        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Editar(){
        $sql = "UPDATE profissionais SET nome = ?, id_especialidade = ?, id_localizacao = ?, situacao = ? WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this -> nome, $this -> id_especialidade, $this -> id_localizacao, $this -> situacao, $this -> id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

    public function Deletar(){

        $sql = "DELETE * FROM profissionais WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

}


?>