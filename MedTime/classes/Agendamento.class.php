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
        $sql = "SELECT usuarios.nome AS 'paciente',
        (SELECT usuarios.id FROM usuarios WHERE usuarios.id = agendamentos.id_cliente) AS 'id_paciente',
 
        (SELECT usuarios.nome 
        FROM usuarios WHERE usuarios.id = agendamentos.id_funcionario) AS 'médico',
         
        (SELECT usuarios.id
        FROM usuarios WHERE usuarios.id = agendamentos.id_funcionario) AS 'id_medico',

        agendamentos.id, 
        exames.id AS 'id_exame', exames.nome AS 'exame',
         
        convenios.id AS 'id_convenio', convenios.nome AS 'convenio',
         
        localizacoes.id AS 'id_clinica', localizacoes.complemento AS 'clinica',
         
        agendamentos.data_agendado AS 'data consulta',
         
        IF(agendamentos.situacao>0, 'Pendente', 'Concluído') AS 'situacao'
         
        FROM agendamentos
         
        INNER JOIN usuarios ON
        agendamentos.id_cliente = usuarios.id
         
        INNER JOIN exames ON
        agendamentos.id_exame = exames.id
         
        INNER JOIN convenios ON
        agendamentos.id_convenio = convenios.id
         
        INNER JOIN localizacoes ON
        agendamentos.id_localizacao = localizacoes.id";
        
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarPorIDPaciente(){
        $sql = "SELECT usuarios.nome AS 'paciente',
 
        (SELECT usuarios.nome 
        FROM usuarios WHERE usuarios.id = agendamentos.id_funcionario) AS 'médico',
         
        (SELECT usuarios.id
        FROM usuarios WHERE usuarios.id = agendamentos.id_funcionario) AS 'id_medico',

        agendamentos.id, 
        exames.id AS 'id_exame', exames.nome AS 'exame',
         
        convenios.id AS 'id_convenio', convenios.nome AS 'convenio',
         
        localizacoes.id AS 'id_clinica', localizacoes.complemento AS 'clinica',
         
        agendamentos.data_agendado AS 'data consulta',
         
        IF(agendamentos.situacao>0, 'Pendente', 'Concluído') AS 'situacao'
         
        FROM agendamentos
         
        INNER JOIN usuarios ON
        agendamentos.id_cliente = usuarios.id
         
        INNER JOIN exames ON
        agendamentos.id_exame = exames.id
         
        INNER JOIN convenios ON
        agendamentos.id_convenio = convenios.id
         
        INNER JOIN localizacoes ON
        agendamentos.id_localizacao = localizacoes.id
        
        WHERE agendamentos.id_cliente = ?";
        
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id_cliente]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarPendente(){
        $sql = "SELECT usuarios.nome AS 'paciente',
 
        (SELECT usuarios.nome 
        FROM usuarios WHERE usuarios.id = agendamentos.id_funcionario) AS 'médico',
         
        (SELECT usuarios.id
        FROM usuarios WHERE usuarios.id = agendamentos.id_funcionario) AS 'id_medico',

        agendamentos.id, 
        exames.id AS 'id_exame', exames.nome AS 'exame',
         
        convenios.id AS 'id_convenio', convenios.nome AS 'convenio',
         
        localizacoes.id AS 'id_clinica', localizacoes.complemento AS 'clinica',
         
        agendamentos.data_agendado AS 'data consulta',
         
        IF(agendamentos.situacao>0, 'Pendente', 'Concluído') AS 'situacao'
         
        FROM agendamentos
         
        INNER JOIN usuarios ON
        agendamentos.id_cliente = usuarios.id
         
        INNER JOIN exames ON
        agendamentos.id_exame = exames.id
         
        INNER JOIN convenios ON
        agendamentos.id_convenio = convenios.id
         
        INNER JOIN localizacoes ON
        agendamentos.id_localizacao = localizacoes.id
        
        WHERE agendamentos.situacao = 1 AND agendamentos.data_agendado = '2024-06-19 20:00:00';";
        
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarPorID(){

        $sql = "SELECT usuarios.nome AS 'paciente',
 
        (SELECT usuarios.nome 
        FROM usuarios WHERE usuarios.id = agendamentos.id_funcionario) AS 'médico',
         
        (SELECT usuarios.id
        FROM usuarios WHERE usuarios.id = agendamentos.id_funcionario) AS 'id_medico',

        agendamentos.id, 
        exames.id AS 'id_exame', exames.nome AS 'exame',
         
        convenios.id AS 'id_convenio', convenios.nome AS 'convenio',
         
        localizacoes.id AS 'id_clinica', localizacoes.complemento AS 'clinica',
         
        agendamentos.data_agendado AS 'data consulta',
         
        IF(agendamentos.situacao>0, 'Pendente', 'Concluído') AS 'situacao'
         
        FROM agendamentos
         
        INNER JOIN usuarios ON
        agendamentos.id_cliente = usuarios.id
         
        INNER JOIN exames ON
        agendamentos.id_exame = exames.id
         
        INNER JOIN convenios ON
        agendamentos.id_convenio = convenios.id
         
        INNER JOIN localizacoes ON
        agendamentos.id_localizacao = localizacoes.id
        
        WHERE agendamentos.id = ?";
        
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        
        return $resultado;
    }

    public function Agendar(){

        $sql = "INSERT INTO agendamentos(id_cliente, id_funcionario, id_exame, id_convenio, id_localizacao, data_agendado, situacao) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        // $formato_data = date_format(date_create($this->data_agendado),"Y/m/d");

        try{
        $comando->execute([$this->id_cliente, $this->id_funcionario, $this->id_exame, $this->id_convenio, $this->id_localizacao, $this->data_agendado, $this->situacao]);
            
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

        $sql = "DELETE FROM agendamentos WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }


    public function FinalizarAgendamento(){
        $sql = "UPDATE agendamentos SET situacao = ?  WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->situacao, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }
}



?>