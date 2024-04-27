<?php

require_once('Banco.class.php');

class Resultado {

    public $id;
    public $id_usuario;
    public $id_profissional;
    public $resultado;

    public function Listar(){
        $sql = "SELECT * FROM view_resultado" ;
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado -> rowCount();

    }

    public function ListarPorID(){

        $sql = "SELECT * FROM view_resultado WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        
        return $resultado -> rowCount();
    }

    public function Obter(){

        $sql = "INSERT INTO resultados(id_usuario, id_profissional, resultado) 
        VALUES (?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->id_usuario, $this -> id_profissional, $this -> resultado]);
            
        Banco::desconectar();

        return $comando->rowCount();
        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Editar(){
        $sql = "UPDATE resultados SET id_usuario = ?, id_profissional = ?, resultado = ? WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this -> id_usuario, $this -> id_profissional, $this -> resultado]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

    public function Deletar(){

        $sql = "DELETE * FROM resultados WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

}


?>