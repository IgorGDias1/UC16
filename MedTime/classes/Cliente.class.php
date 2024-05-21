<?php

require_once('Banco.class.php');

class Cliente {

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $data_nascimento;
    public $telefone_celular;
    public $telefone_residencial;
    public $id_localizacao;
    public $id_convenio;
    public $id_cargo;
    public $id_especialidade;
    public $situacao;

    public $cep;
    public $logradouro;
    public $complemento;
    public $bairro;
    public $localidade;
    public $uf;
    public $ddd;
    public $tipoLocal;

    public function Listar(){

        $sql = "SELECT * FROM usuarios";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;
    }

    public function View(){

        $sql = "SELECT * FROM view_usuarios";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;
    }

    public function ListarPorID(){

        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $comando->execute([$this -> id]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    public function ListarFuncionarios(){

        $sql = "SELECT * FROM usuarios WHERE id_cargo = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $comando->execute([$this -> id_cargo]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }

    //Método para cadastrar um cliente - Obs: Sem parâmetros como id_cargo, id_especialidade, situacao
    public function CadastrarCliente(){

        $sql = "INSERT INTO clientes(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash('sha256', $this->senha);
        $formato_data = date_format(date_create($this->data_nascimento),"Y/m/d");

        try{
        $comando->execute([$this->nome, $this->email, $hash, $this->cpf, $formato_data, $this->telefone_celular, $this->telefone_residencial, $this->id_localizacao, $this->id_convenio]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    //Método para cadastrar um funcionário com pârametros adicionais
    public function CadastrarFuncionario(){

        $sql = "INSERT INTO clientes(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio, id_cargo, id_especialidade, situacao) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash('sha256', $this->senha);
        $formato_data = date_format(date_create($this->data_nascimento),"Y/m/d");

        try{
        $comando->execute([$this->nome, $this->email, $hash, $this->cpf, $formato_data, $this->telefone_celular, $this->telefone_residencial, $this->id_localizacao, $this->id_convenio, $this->id_cargo, $this->id_especialidade, $this->situacao]);
            
        Banco::desconectar();

        return $comando->rowCount();

        } catch(PDOEXCEPTION $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function CadastrarUsuarioLocalizacao(){
        $sql = "CALL cadastrar_usuario_localizacao(?, ?, ?, ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?)"; //Stored Procedure para um cadastro duplo

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash('sha256', $this->senha);
        $formato_data = date_format(date_create($this->data_nascimento),"Y/m/d");

        try{
            $comando->execute([
                // Parametros para a localizacao
                $this->cep, $this->logradouro, $this->complemento, $this->bairro, $this->localidade, $this->uf, $this->ddd, $this->tipoLocal, 
                
                // Parametros para o usuario
                $this->nome, $this->email, $hash, $this->cpf, $formato_data, $this->telefone_celular, $this->telefone_residencial, $this->id_convenio]);

                Banco::desconectar();

                return 1;

            } catch(PDOEXCEPTION $e){
                Banco::desconectar();
                return 0;
            }
    }

    public function Logar(){
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $hash = hash('sha256', $this->senha);

        try{
        $comando->execute([$this->email, $hash]);

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;
        } catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Deletar(){

        $sql = "DELETE FROM usuarios WHERE id = ?";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        
        $comando->execute([$this->id]);

        Banco::desconectar();
        return $comando -> rowCount();
    }

    public function EditarUsuario(){
        $sql = "UPDATE usuarios SET nome = ?, email = ?, cpf = ?, data_nascimento = ?, telefone_celular = ?, telefone_residencial = ?, id_convenio = ? WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->nome, $this->email, $this->cpf, $this->data_nascimento, $this->telefone_celular, $this->telefone_residencial, $this->id_convenio, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

    public function EditarFuncionario(){
        $sql = "UPDATE usuarios SET nome = ?, email = ?, cpf = ?, data_nascimento = ?, telefone_celular = ?, telefone_residencial = ?, id_convenio = ?, id_cargo = ?, id_especialidade = ?, situacao = ? WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        try{
            $comando->execute([$this->nome, $this->email, $this->cpf, $this->data_nascimento, $this->telefone_celular, $this->telefone_residencial, $this->id_convenio, $this->id_cargo, $this->id_especialidade, $this->situacao, $this->id]);

            Banco::desconectar();

            return $comando->rowCount();

        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }   
    }

}


?>