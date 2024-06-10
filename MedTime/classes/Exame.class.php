<?php

require_once('Banco.class.php');

Class Exame {

    public $id;
    public $nome;
    public $id_responsavel;

    public function Listar(){
        $sql = "SELECT exames.id, exames.nome, exames.id_responsavel, 
        usuarios.nome AS 'funcionario_resp' FROM exames
        
        INNER JOIN usuarios ON
        exames.id_responsavel = usuarios.id";
        $banco = Banco::conectar();

        $comando = $banco->prepare($sql);

        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;
    }

    public function ListarExamePorMedico(){
        $sql = "SELECT * FROM exames WHERE id_responsavel = ?";
        $banco = Banco::conectar();

        $comando = $banco->prepare($sql);

        $comando->execute([$this->id_responsavel]);
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;
    }

    public function Cadastrar(){

        $sql = "INSERT INTO exames(nome, id_responsavel) 
        VALUES (?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->nome, $this->id_responsavel]);
            
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

    public function Editar(){
        $sql = "UPDATE exames SET nome = ?, id_responsavel = ?  WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->nome, $this->id_responsavel, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

}


?>