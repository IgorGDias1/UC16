<?php

require_once('Banco.class.php');

class Agendamento {

    public $id;
    public $id_cliente;
    public $id_funcionario;
    public $id_exame;
    public $id_convenio;
    public $id_localizacao;
    public $data_agendado;
    public $situacao;

    public function Listar(){
        $sql = "SELECT * FROM view_agendamentos " ;
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarPorID(){

        $sql = "SELECT * FROM agendamentos WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        
        return $resultado -> rowCount();
    }

    public function Agendar(){

        $sql = "INSERT INTO agendamentos(id_cliente, id_funcionario, id_exame, id_convenio, id_localizacao, data_agendado, situacao) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $formato_data = date_format(date_create($this->data_agendado),"Y/m/d");

        try{
        $comando->execute([$this->id_cliente, $this->id_funcionario, $this->id_exame, $this->id_convenio, $this->id_localizacao, $formato_data, $this->situacao]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Editar(){
        $sql = "UPDATE agendamentos SET id_cliente = ?, id_funcionario = ?, id_exame = ?, id_convenio = ?, id_localizacao = ?, data_agendado = ?, situacao = ?  WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->id_cliente, $this->id_funcionario, $this->id_exame, $this->id_convenio, $this->id_localizacao, $this->data_agendado, $this->situacao, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

    public function Deletar(){

        $sql = "DELETE * FROM agendamentos WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

}


?>