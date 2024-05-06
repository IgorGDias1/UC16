$('#modalEdicao').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) 

    var id = button.data('id')
    var nome = button.data('nomeEdit')
    var email = button.data('emailEdit')
    var cpf = button.data('cpfEdit')
    var data_nascimento = button.data('data_nascimentoEdit')
    var telefone_celular = button.data('telefone_celularEdit')
    var telefone_residencial = button.data('telefone_residencialEdit')
    var id_localizacao = button.data('id_localizacaoEdit')
    var id_convenio = button.data('id_convenioEdit')
    var tipo = button.data('tipoEdit')

    var modal = $(this)

    modal.find('.id').val(id)
    modal.find('.nome').val(nome)
    modal.find('.email').val(email)
    modal.find('.cpf').val(cpf)
    modal.find('.data_nascimento').val(data_nascimento)
    modal.find('.telefone_celular').val(telefone_celular)
    modal.find('.telefone_residencial').val(telefone_residencial)
    modal.find('.id_localizacao').val(id_localizacao)
    modal.find('.id_convenio').val(id_convenio)
    modal.find('.tipo').val(tipo)

    })

    function excluir(id){
        Swal.fire({
        title: "Tem certeza?",
        text: "Não será possível desfazer essa ação!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Sim, apagar!"
        }).then((result) => {
        if (result.isConfirmed) {
        window.location.href='deletar_cliente.php?id=' + id;
        }
        });
        }

        function mostrarSenha() {
            var x = document.getElementById("senha");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }


    function limpar_formulario_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('rua').value=("");
        document.getElementById('complemento').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");
        document.getElementById('ddd').value=("");
    }

    function limpar_formulario_inteiro() {
        document.getElementById('cep').value=("");
        document.getElementById('complemento').value=("");
        document.getElementById('rua').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");
        document.getElementById('ddd').value=("");

        document.getElementById('cep').disabled=false;
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
            limpa_formulário_cep();
            alert("CEP não encontrado.");
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

                document.getElementById('cep').disabled=true;

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

            }
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    };
