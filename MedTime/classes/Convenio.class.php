
<?php

require_once('Banco.class.php');

class Convenio {

    public $id;
    public $nome;
    public $email;
    public $telefone;

    public function Listar(){

        $sql = "SELECT * FROM convenios";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarPorID(){

        $sql = "SELECT * FROM convenios WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

                return $resultado -> rowCount();

    }

    public function Cadastrar(){

        $sql = "INSERT INTO convenios(nome, email, telefone) 
        VALUES (?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->nome, $this->email, $this->telefone]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Editar(){
        $sql = "UPDATE convenios SET nome = ?, email = ?, telefone = ?  WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->nome, $this->email, $this->telefone, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

    public function Deletar(){
        $sql = "DELETE FROM convenios WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco -> prepare($sql);

        $comando -> execute ([$this -> id]);

        Banco::desconectar();
        return $comando -> rowCount();
        
    }

}


?>