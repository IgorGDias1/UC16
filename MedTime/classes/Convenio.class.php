
<?php

require_once('Banco.class.php');

class Convenio {

    public $id;
    public $nome;
    public $email;

    public function Listar(){

        $sql = "SELECT * FROM convenio";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado -> rowCount();

    }

    public function ListarPorID(){

        $sql = "SELECT * FROM convenio WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

                return $resultado -> rowCount();

    }

    public function Cadastrar(){

        $sql = "INSERT INTO convenio(nome, email) 
        VALUES (?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->nome, $this->email]);
            
        Banco::desconectar();

        return $comando->rowCount();
        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Deletar(){
        $sql = "DELETE * FROM convenio WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco -> prepare($sql);

        $comando -> execute ([$this -> id]);

        Banco::desconectar();
        return $comando -> rowCount();
        
    }

}


?>