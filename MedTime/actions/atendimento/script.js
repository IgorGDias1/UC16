// Função do SweetAlert
function concluirAtendimento(id) {
    Swal.fire({
        title: "Deseja finalizar o atendimento?",
        text: "Não será possível desfazer essa ação!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Sim!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'finalizar_atendimento.php?id=' + id;
        }
    });
}