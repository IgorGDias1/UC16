<?php
    $alertas_sucesso = [
        //Usuario
        "cadastrarusuario" => "Cadastro realizado com sucesso!",
        "removerusuario" => "Usuário removido!",
        "editarusuario" => "Usuário editado!",

        //Agendamento
        "cadastraragendamento" => "Agendamento realizado!",
        "removeragendamento" => "Agendamento deletado",
        "editaragendamento" => "Informações editadas",

        //Categoria
        "cadastrarcategoria" => "Categoria cadastrada",
        "removercategoria" => "Categoria removida!",

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
        "cadastrarsuporte" => "Seu pedido foi realizado!",

        //Login
        "logar" => "Login realizado, você será redirecionado!"
    ];

    $alertas_falha = [
        //Usuario
        "cadastrarusuario" => "Falha ao cadastrar!",
        "editarusuario" => "Falha ao ao editar!",

        //Agendamento
        "cadastraragendamento" => "Ocorreu um erro!",
        "editaragendamento" => "Falha ao editar",

        //Categoria
        "cadastrarcategoria" => "Erro ao cadastrar categoria",

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
        "logar" => "Erro! Vefifique as informações e tente novamente!",

        //Post
        "post" => "A página deve ser carregada por post"
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
        
</script>