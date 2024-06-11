<?php

require_once('Banco.class.php');

class Especialidade {

    public $id;
    public $id_cargo;
    public $especificacao;

    public function Listar(){
        $sql = "SELECT especialidades.id, especialidades.id_cargo, cargos.nome, especialidades.especificacao
        FROM especialidades
        
        INNER JOIN cargos ON
        especialidades.id_cargo = cargos.id";
        
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function Cadastrar(){

        $sql = "INSERT INTO especialidades(id_cargo, especificacao) 
        VALUES (?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);


        try{
        $comando->execute([$this->id_cargo, $this->especificacao]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Deletar(){

        $sql = "DELETE FROM especialidades WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

    public function Editar(){
        $sql = "UPDATE especialidades SET id_cargo = ?, especificacao = ?  WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->id_cargo, $this->especificacao, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

}


?>