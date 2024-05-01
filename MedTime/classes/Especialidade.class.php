<?php

require_once('Banco.class.php');

class Especialidade {

    public $id;
    public $id_cargo;
    public $especificacao;

    public function Listar(){
        $sql = "SELECT * FROM especialidades";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado -> rowCount();

    }

    public function Cadastrar(){

        $sql = "INSERT INTO especialidades(id_cargo, especificacao) 
        VALUES (?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);


        try{
        $comando->execute([$this->id_cargo, $this->nome]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Deletar(){

        $sql = "DELETE * FROM especialidades WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

}


?>