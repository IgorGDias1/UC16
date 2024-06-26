<?php

require_once('Banco.class.php');

class Suporte {

    public $id;
    public $id_cliente;
    public $assunto;
    public $mensagem;
    public $situacao;

    public function Listar(){
        $sql = "SELECT suportes.id AS 'id_suporte', suportes.id_cliente , usuarios.nome AS 'solicitante', suportes.assunto, suportes.mensagem,
        IF(suportes.situacao>0, 'Pendente', 'Atendido') AS 'situacao'

        FROM suportes

        INNER JOIN usuarios ON
        suportes.id_cliente = usuarios.id
        ORDER BY suportes.situacao ASC";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarPendentes(){
        $sql = "SELECT suportes.id AS 'id_suporte', suportes.id_cliente , usuarios.nome AS 'solicitante', suportes.assunto, suportes.mensagem,
        IF(suportes.situacao>0, 'Pendente', 'Atendido') AS 'situacao'

        FROM suportes

        INNER JOIN usuarios ON
        suportes.id_cliente = usuarios.id
        
        WHERE suportes.situacao > 0";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarPorID(){

        $sql = "SELECT * FROM suportes WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function Cadastrar(){

        $sql = "INSERT INTO suportes(id_cliente, assunto, mensagem, situacao) 
        VALUES (?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
        $comando->execute([$this->id_cliente, $this->assunto,$this->mensagem, $this->situacao]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Modificar_Situacao(){
        $sql = "UPDATE suportes SET situacao = ? WHERE id = ?";
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