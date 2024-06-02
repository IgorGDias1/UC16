    // Consumindo API - ViaCEP
    function mostrarCampos(){
        document.getElementById('rua').hidden=false;
        document.getElementById('complemento').hidden=false;
        document.getElementById('bairro').hidden=false;
        document.getElementById('cidade').hidden=false;
        document.getElementById('uf').hidden=false;
        document.getElementById('ddd').hidden=false;
        document.getElementById('tipo').hidden=false;
        
        document.getElementById('ruaLabel').hidden=false;
        document.getElementById('complementoLabel').hidden=false;
        document.getElementById('bairroLabel').hidden=false;
        document.getElementById('cidadeLabel').hidden=false;
        document.getElementById('ufLabel').hidden=false;
        document.getElementById('dddLabel').hidden=false;
        document.getElementById('tipoLabel').hidden=false;

        document.getElementById('btn_limpar').hidden=false;
    }

    function esconderCampos(){
       document.getElementById('rua').hidden=true;
       document.getElementById('complemento').hidden=true;
       document.getElementById('bairro').hidden=true;
       document.getElementById('cidade').hidden=true;
       document.getElementById('uf').hidden=true;
       document.getElementById('ddd').hidden=true;
       document.getElementById('tipo').hidden=true;
       
       document.getElementById('ruaLabel').hidden=true;
       document.getElementById('complementoLabel').hidden=true;
       document.getElementById('bairroLabel').hidden=true;
       document.getElementById('cidadeLabel').hidden=true;
       document.getElementById('ufLabel').hidden=true;
       document.getElementById('dddLabel').hidden=true;
       document.getElementById('tipoLabel').hidden=true;

       document.getElementById('btn_limpar').hidden=true;
   }

    function limpar_formulario_cep() {
        //Limpa valores do formulário mas mantem o cep
        document.getElementById('rua').value=("");
        document.getElementById('complemento').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");
        document.getElementById('ddd').value=("");

        esconderCampos();
    }

    function limpar_formulario_inteiro() {
        document.getElementById('cep').value=("");
        document.getElementById('complemento').value=("");
        document.getElementById('rua').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");
        document.getElementById('ddd').value=("");
        
        esconderCampos();
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('complemento').value=(conteudo.complemento);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ddd').value=(conteudo.ddd);
        } //end if.
        else {
            //CEP não Encontrado.
            limpar_formulario_cep();
            esconderCampos();
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value=("...");
                document.getElementById('complemento').value=("...");
                document.getElementById('bairro').value=("...");
                document.getElementById('cidade').value=("...");
                document.getElementById('uf').value=("...");
                document.getElementById('ddd').value=("...");

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

                mostrarCampos();

            }
            else {
                //cep é inválido.
                limpar_formulario_cep();
                esconderCampos();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpar_formulario_cep();
            esconderCampos();
        }
    };

    // ================================================================================== 


    