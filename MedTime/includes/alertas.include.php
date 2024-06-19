<?php
    $alertas_sucesso = [
        //Cliente
        "cadastrarcliente" => "Cadastro realizado com sucesso!",
        "removercliente" => "Usuário removido!",
        "editarcliente" => "Usuário editado!",
        "editarusuario" => "Informações editadas!",

        //Funcionarios
        "cadastrarfuncionario" => "Cadastro realizado com sucesso!",
        "removerfuncionario" => "Funcionário removido!",
        "editarfuncionario" => "Funcionário editado!",

        //Localização
        "cadastrarlocalizacao" => "Localização Cadastrada!",
        "removerlocalizacao" => "Localização removido!",
        "editarlocalizacao" => "Localização editada!",

        //Agendamento
        "cadastraragendamento" => "Agendamento realizado!",
        "removeragendamento" => "Agendamento cancelado",
        "editaragendamento" => "Informações editadas",

        //Atendimento
        "finalizaratendimento" => "Atendimento finalizado",

        //Cargos
        "cadastrarcargo" => "Cargo cadastrado",
        "removercargo" => "Cargo removido!",

        //Convenio
        "cadastrarconvenio" => "Cadastro realizado",
        "removerconvenio" => "Convenio removido",

        //Especialidade
        "cadastrarespecialidade" => "Cadastro realizado",
        "removerespecialidade" => "Especialidade removida",

        //Resultado
        "cadastrarresultado" => "Resultado adicionado",
        "removerresultado" => "Resultado removido",
        "editarresultado" => "Informações editadas",

        //Suporte
        "cadastrarsuporte" => "Seu feedback foi enviado!",

        //Login
        "logar" => "Bem-vindo(a)!",
    ];

    $alertas_falha = [
        //Cliente
        "cadastrarcliente" => "Ocorreu um erro!",
        "removercliente" => "Erro ao remover!",
        "editarcliente" => "Erro ao editar usuario",
        "editarusuario" => "Ocorreu um erro!",

        //Funcionarios
        "cadastrarfuncionario" => "Erro! Tente novamente",
        "removerfuncionario" => "Ocorreu um erro!",
        "editarfuncionario" => "Erro! Verifique as informações!",

        //Localização
        "cadastrarlocalizacao" => "Erro!",
        "removerlocalizacao" => "Erro ao remover localização",
        "editarlocalizacao" => "Erro!",

        //Agendamento
        "cadastraragendamento" => "Erro ao cadastrar agendamento",
        "removeragendamento" => "Erro!",
        "editaragendamento" => "Erro ao editar agendamento",

        //Atendimento
        "finalizaratendimento" => "Erro",

        //Cargos
        "cadastrarcargo" => "Erro!",
        "removercargo" => "Erro ao remover cargo",

        //Convenio
        "cadastrarconvenio" => "Erro ao cadastrar convenio",

        //Especialidade
        "cadastrarespecialidade" => "Ocorreu um erro",

        //Resultado
        "cadastrarresultado" => "Ocorreu um erro ao cadastrar o resultado",
        "editarresultado" => "Ocorreu um erro ao editar as informações",

        //Suporte
        "cadastrarsuporte" => "Erro ao cadastrar suporte!",

        //Login
        "logar" => "Email ou senha incorretos!",

        //Post
        "post" => "A página deve ser carregada por post"
    ];

    $alertas_neutro = [
      //Logout
      "logout" => "Você foi desconectado(a)!",
      "logar" => "Você precisar estar logado para solicitar um agendamento",
      "suporte" => "Você precisa estar logado para solicitar um suporte ou enviar um feedback!",
      "perfil" => "Faça login para entrar no seu perfil!"
    ];
?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        <?php if(isset($_GET['sucesso'])){ ?> //Verificando se o valor do array está setado
            Swal.fire({
            title: "Sucesso!",
            text: "<?=$alertas_sucesso[$_GET['sucesso']];?>",
            icon: "success"
          });
          //Redefinindo a URL
          window.history.replaceState(null, '', window.location.pathname);
        <?php }?>

        <?php if(isset($_GET['falha'])){ ?>
            Swal.fire({
            title: "Erro!",
            text: "<?=$alertas_falha[$_GET['falha']];?>",
            icon: "error"
          });
          window.history.replaceState(null, '', window.location.pathname);
        <?php }?>

        <?php if(isset($_GET['neutro'])) { ?>
          Swal.fire({
            text: "<?=$alertas_neutro[$_GET['neutro']];?>",
            icon: "warning"
          });
          //Redefinindo a URL
          window.history.replaceState(null, '', window.location.pathname);
        <?php } ?>
        
</script>