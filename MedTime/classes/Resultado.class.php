<?php

require_once('Banco.class.php');

class Resultado {

    public $id;
    public $id_cliente;
    public $id_funcionario;
    public $data_realizacao;
    public $id_localizacao;
    public $resultado;
    public $reagendamento;

    public function Listar(){
        $sql = "SELECT * FROM resultados" ;
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarPorID(){

        $sql = "SELECT resultados.id AS 'id_resultado',
        
        usuarios.nome AS 'paciente', usuarios.id AS 'id_paciente',
 
        (SELECT usuarios.nome 
        FROM usuarios WHERE usuarios.id = resultados.id_funcionario) AS 'médico',
        
        (SELECT usuarios.id
        FROM usuarios WHERE usuarios.id = resultados.id_funcionario) AS 'id_medico',
        
        resultados.data_realizacao,
        
        localizacoes.id AS 'id_clinica', localizacoes.complemento AS 'clinica',

        resultados.resultado,
        
        
        IF(resultados.reagendamento>0, 'Necessário Reagendar', 'Não Reagendar') AS 'situacao'
        
        FROM resultados
        
        INNER JOIN usuarios ON
        resultados.id_cliente = usuarios.id
        
        
        INNER JOIN localizacoes ON
        resultados.id_localizacao = localizacoes.id
        
        WHERE resultados.id = ?;";
        
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        
        return $resultado;
    }

    public function ListarPorIDCliente(){

        $sql = "SELECT resultados.id AS 'id_resultado',

        usuarios.nome AS 'paciente', usuarios.id AS 'id_paciente',
 
        (SELECT usuarios.nome 
        FROM usuarios WHERE usuarios.id = resultados.id_funcionario) AS 'médico',
        
        (SELECT usuarios.id
        FROM usuarios WHERE usuarios.id = resultados.id_funcionario) AS 'id_medico',
        
        resultados.data_realizacao,
        
        localizacoes.id AS 'id_clinica', localizacoes.complemento AS 'clinica',

        resultados.resultado,
        
        
        IF(resultados.reagendamento>0, 'Necessário Reagendar', 'Não Reagendar') AS 'situacao'
        
        FROM resultados
        
        INNER JOIN usuarios ON
        resultados.id_cliente = usuarios.id
        
        
        INNER JOIN localizacoes ON
        resultados.id_localizacao = localizacoes.id
        
        WHERE resultados.id_cliente = ?;";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this -> id_cliente]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        
        return $resultado;
    }

    public function Cadastrar(){

        $sql = "INSERT INTO resultados(id_cliente, id_funcionario, data_realizacao, id_localizacao, resultado, reagendamento) 
        VALUES (?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->id_cliente, $this->id_funcionario, $this->data_realizacao, $this->id_localizacao, $this->resultado, $this->reagendamento]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Editar(){
        $sql = "UPDATE resultados SET id_cliente = ?, id_funcionario = ?, data_realizacao = ?, id_localizacao = ?, resultado = ?, reagendamento = ? WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->id_cliente, $this->id_funcionario, $this->data_realizacao, $this->id_localizacao, $this->resultado, $this->reagendamento, $this->id]);

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