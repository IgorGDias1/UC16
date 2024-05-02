<?php

require_once('Banco.class.php');

Class Exame {

    public $id;
    public $nome;
    public $id_funcionario;

    public function Listar(){
        $sql = "SELECT * FROM exames";
        $banco = Banco::conectar();

        $comando = $banco->prepare($sql);

        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado->rowCount();
    }

    public function Cadastrar(){

        $sql = "INSERT INTO exames(nome, id_funcionario) 
        VALUES (?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->nome, $this->id_funcionario]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Deletar(){

        $sql = "DELETE FROM exames WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $comando->execute([$this->id]);
            
        Banco::desconectar();

        return $comando->rowCount();
    }
}


?>