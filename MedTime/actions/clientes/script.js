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