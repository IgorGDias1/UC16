<?php

require_once('Banco.class.php');

class Usuario {

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

    public function ListarClientes(){

        $sql = "SELECT * FROM usuarios WHERE id_cargo IS NULL";
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

    public function ListarClientesSemLocalizacao(){

        $sql = "SELECT usuarios.id AS 'id_usuario', usuarios.nome, usuarios.email, usuarios.cpf, usuarios.data_nascimento, 
        usuarios.telefone_celular, usuarios.telefone_residencial, usuarios.id_convenio, 
        convenios.nome AS 'convenio'
 
        FROM usuarios
         
        INNER JOIN convenios ON
        usuarios.id_convenio = convenios.id
         
        WHERE usuarios.id_localizacao IS NULL AND usuarios.id_cargo IS NULL";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;
    }

    public function ListarClientesComLocalizacao(){

        $sql = "SELECT usuarios.id AS 'id_usuario', usuarios.nome, usuarios.email, usuarios.cpf, usuarios.data_nascimento, 
        usuarios.telefone_celular, usuarios.telefone_residencial, usuarios.id_convenio, usuarios.id_localizacao AS 'id_local', localizacoes.cep,
        convenios.nome AS 'convenio'
 
        FROM usuarios

        INNER JOIN localizacoes ON
        usuarios.id_localizacao = localizacoes.id
         
        INNER JOIN convenios ON
        usuarios.id_convenio = convenios.id
         
        WHERE usuarios.id_localizacao IS NOT NULL AND usuarios.id_cargo IS NULL";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;
    }


    public function ListarFuncionarios(){

        $sql = "SELECT usuarios.id AS 'id_funcionario', usuarios.nome, usuarios.email, usuarios.cpf, usuarios.data_nascimento, usuarios.telefone_celular, usuarios.telefone_residencial, usuarios.id_localizacao, localizacoes.cep , usuarios.id_convenio ,convenios.nome AS 'convenio', usuarios.id_cargo, cargos.nome AS 'cargo', usuarios.id_especialidade, especialidades.especificacao, IF(usuarios.situacao>0, 'Ativo', 'Inativo') AS 'situacao'
 
        FROM usuarios
         
        INNER JOIN localizacoes ON
        usuarios.id_localizacao = localizacoes.id
         
        INNER JOIN convenios ON
        usuarios.id_convenio = convenios.id
         
        INNER JOIN cargos ON
        usuarios.id_cargo = cargos.id
         
        INNER JOIN especialidades ON
        usuarios.id_especialidade = especialidades.id
         
        WHERE usuarios.id_cargo IS NOT NULL
        ORDER BY situacao";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }
    
    public function ListarMedicos(){

        $sql = "SELECT * FROM usuarios WHERE id_cargo = 4";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $comando->execute();

        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $resultado;

    }


    //Método para cadastrar um cliente - Obs: Sem parâmetros como id_cargo, id_especialidade, situacao
    public function CadastrarCliente(){

        $sql = "INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio) 
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

        $sql = "INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio, id_cargo, id_especialidade, situacao) 
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

    public function CadastrarFuncionarioLocalizacao(){
        $sql = "CALL cadastrar_funcionario_localizacao(?, ?, ?, ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; //Stored Procedure para um cadastro duplo

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash('sha256', $this->senha);
        $formato_data = date_format(date_create($this->data_nascimento),"Y/m/d");

        try{
            $comando->execute([
                // Parametros para a localizacao
                $this->cep, $this->logradouro, $this->complemento, $this->bairro, $this->localidade, $this->uf, $this->ddd, $this->tipoLocal, 
                
                // Parametros para o usuario
                $this->nome, $this->email, $hash, $this->cpf, $formato_data, $this->telefone_celular, $this->telefone_residencial, $this->id_convenio, $this->id_cargo, $this->id_especialidade, $this->situacao]);

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