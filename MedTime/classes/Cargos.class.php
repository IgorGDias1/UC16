<?php

require_once('Banco.class.php');

class Cargos {

    public $id;
    public $nome;

    public function Listar(){
        $sql = "SELECT * FROM cargos";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function Cadastrar(){

        $sql = "INSERT INTO cargos(nome) 
        VALUES (?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->nome]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Deletar(){
        $sql = "DELETE FROM cargos WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco -> prepare($sql);

        $comando -> execute([$this -> id]);

        Banco::desconectar();

        return $comando -> rowCount();
    }

    public function Editar(){
        $sql = "UPDATE cargos SET nome = ?  WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->nome, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }


}


?>