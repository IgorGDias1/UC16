$('#modalEdicao').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) 

    var id = button.data('id')
    var cep = button.data('cep')
    var logradouro = button.data('logradouro')
    var complemento = button.data('complemento')
    var bairro = button.data('bairro')
    var localidade = button.data('localidade')
    var uf = button.data('uf')
    var ddd = button.data('ddd')
    var tipo = button.data('tipo')

    var modal = $(this)

    modal.find('.id').val(id)
    modal.find('.cep').val(cep)
    modal.find('.logradouro').val(logradouro)
    modal.find('.complemento').val(complemento)
    modal.find('.bairro').val(bairro)
    modal.find('.localidade').val(localidade)
    modal.find('.uf').val(uf)
    modal.find('.ddd').val(ddd)
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
        window.location.href='deletar_endereco.php?id=' + id;
        }
        });
        }