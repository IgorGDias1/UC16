        // Alternar entre formulários login x cadastro:
        $("#btnCadastroToggle").click(function () {
            $("#formLogin").hide();
            $("#formCadastro").fadeIn();
            $("#titulo").text('Cadastro - "Nome do Projeto"');
        });
        $("#btnLoginToggle").click(function () {
            $("#formCadastro").hide();
            $("#formLogin").fadeIn();
            $("#titulo").text('Login - "Nome do Projeto"');
        });

        //Função para mostrar e ocultar a senha no campo de cadastro
        function mostrarSenha() {
            var x = document.getElementById("senhaCadastro");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
             
    $('#nomePaciente').select2({
      dropdownParent: $('#modalCadastro')
    });

    $('#nomeMedico').select2({
      dropdownParent: $('#modalCadastro')
    });
  
    $('#exame').select2({
      dropdownParent: $('#modalCadastro')
    });
  
    $('#convenio').select2({
      dropdownParent: $('#modalCadastro')
    });
  
    $('#clinica').select2({
      dropdownParent: $('#modalCadastro')
    });
  
    $('#medico').select2({
      dropdownParent: $('#modalEdicao')
    });

    $('#convenios').select2({
      dropdownParent: $('#modalEdicao')
    });
  
    $('#endereco').select2({
      dropdownParent: $('#modalEdicao')
    });
 
    $('#exames').select2({
      dropdownParent: $('#modalEdicao')
    });
  
    $('#nomemed').select2();
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
