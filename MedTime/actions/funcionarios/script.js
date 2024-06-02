function mostrarCamposFuncionario(){
    document.getElementById('ruaFuncionario').hidden=false;
    document.getElementById('complementoFuncionario').hidden=false;
    document.getElementById('bairroFuncionario').hidden=false;
    document.getElementById('cidadeFuncionario').hidden=false;
    document.getElementById('ufFuncionario').hidden=false;
    document.getElementById('dddFuncionario').hidden=false;
    document.getElementById('tipoFuncionario').hidden=false;
    
    document.getElementById('ruaLabelFuncionario').hidden=false;
    document.getElementById('complementoLabelFuncionario').hidden=false;
    document.getElementById('bairroLabelFuncionario').hidden=false;
    document.getElementById('cidadeLabelFuncionario').hidden=false;
    document.getElementById('ufLabelFuncionario').hidden=false;
    document.getElementById('dddLabelFuncionario').hidden=false;
    document.getElementById('tipoLabelFuncionario').hidden=false;

    document.getElementById('btn_limparFuncionario').hidden=false;
}

function esconderCamposFuncionario(){
   document.getElementById('ruaFuncionario').hidden=true;
   document.getElementById('complementoFuncionario').hidden=true;
   document.getElementById('bairroFuncionario').hidden=true;
   document.getElementById('cidadeFuncionario').hidden=true;
   document.getElementById('ufFuncionario').hidden=true;
   document.getElementById('dddFuncionario').hidden=true;
   document.getElementById('tipoFuncionario').hidden=true;
   
   document.getElementById('ruaLabelFuncionario').hidden=true;
   document.getElementById('complementoLabelFuncionario').hidden=true;
   document.getElementById('bairroLabelFuncionario').hidden=true;
   document.getElementById('cidadeLabelFuncionario').hidden=true;
   document.getElementById('ufLabelFuncionario').hidden=true;
   document.getElementById('dddLabelFuncionario').hidden=true;
   document.getElementById('tipoLabelFuncionario').hidden=true;

   document.getElementById('btn_limparFuncionario').hidden=true;
}

function limpar_formulario_cepFuncionario() {
    //Limpa valores do formulário mas mantem o cep
    document.getElementById('ruaFuncionario').value=("");
    document.getElementById('complementoFuncionario').value=("");
    document.getElementById('bairroFuncionario').value=("");
    document.getElementById('cidadeFuncionario').value=("");
    document.getElementById('ufFuncionario').value=("");
    document.getElementById('dddFuncionario').value=("");

    esconderCamposFuncionario();
}

function limpar_formulario_inteiroFuncionario() {
    document.getElementById('cepFuncionario').value=("");
    document.getElementById('complementoFuncionario').value=("");
    document.getElementById('ruaFuncionario').value=("");
    document.getElementById('bairroFuncionario').value=("");
    document.getElementById('cidadeFuncionario').value=("");
    document.getElementById('ufFuncionario').value=("");
    document.getElementById('dddFuncionario').value=("");
    
    esconderCamposFuncionario();
}

function meu_callbackFuncionario(conteudo2) {
    if (!("erro" in conteudo2)) {
        //Atualiza os campos com os valores.
        document.getElementById('ruaFuncionario').value=(conteudo2.logradouro);
        document.getElementById('complementoFuncionario').value=(conteudo2.complemento);
        document.getElementById('bairroFuncionario').value=(conteudo2.bairro);
        document.getElementById('cidadeFuncionario').value=(conteudo2.localidade);
        document.getElementById('ufFuncionario').value=(conteudo2.uf);
        document.getElementById('dddFuncionario').value=(conteudo2.ddd);
    } //end if.
    else {
        //CEP não Encontrado.
        limpar_formulario_cepFuncionario();
        esconderCamposFuncionario();
    }
}

function pesquisacepFuncionario(valor2) {

    //Nova variável "cep" somente com dígitos.
    var cepFuncionario = valor2.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cepFuncionario != "") {

        //Expressão regular para validar o CEP.
        var validacep2 = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep2.test(cepFuncionario)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('ruaFuncionario').value=("...");
            document.getElementById('complementoFuncionario').value=("...");
            document.getElementById('bairroFuncionario').value=("...");
            document.getElementById('cidadeFuncionario').value=("...");
            document.getElementById('ufFuncionario').value=("...");
            document.getElementById('dddFuncionario').value=("...");

            //Cria um elemento javascript.
            var script2 = document.createElement('script');

            //Sincroniza com o callback.
            script2.src = 'https://viacep.com.br/ws/'+ cepFuncionario + '/json/?callback=meu_callbackFuncionario';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script2);

            mostrarCamposFuncionario();

        }
        else {
            //cep é inválido.
            limpar_formulario_cepFuncionario();
            esconderCamposFuncionario();
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpar_formulario_cepFuncionario();
        esconderCamposFuncionario();
    }
};