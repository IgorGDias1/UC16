<?php
        $endereco = (object)[
            'cep' => '',
            'logradouro' => '',
            'complemento' => '',
            'bairro' => '',
            'localidade' => '',
            'uf' => '',
            'ddd' => ''
        ];

        if(isset($_POST['cepValidar'])){
            $cep = $_POST['cepValidar'];
            $url = "https://viacep.com.br/ws/{$cep}/json/";
        
            $endereco = json_decode(file_get_contents($url));

            require_once('../../classes/Localizacao.class.php');

            $localizacao = new localizacao();
            $localizacao -> cep = $endereco->cep;
            $localizacao -> logradouro = $endereco->logradouro;
            $localizacao -> complemento = $endereco->complemento;
            $localizacao -> bairro = $endereco->bairro;
            $localizacao -> localidade = $endereco->localidade;
            $localizacao -> uf = $endereco->uf;
            $localizacao -> ddd = $endereco->ddd;
            $localizacao -> tipo = 'Residencial';

            if($localizacao -> Cadastrar() == 1){
                header('Location: gerenciamento_enderecos.php?sucesso=cadastrarlocalizacao');
            }else{
                header('Location: gerenciamento_enderecos.php?falha=cadastrarlocalizacao');
            }
        }
?>