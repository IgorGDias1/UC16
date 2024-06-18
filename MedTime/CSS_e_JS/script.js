        // Alternar entre formulários login x cadastro:
        $("#btnCadastroToggle").click(function () {
            $("#formLogin").hide();
            $("#formCadastro").fadeIn();
            $("#titulo").text('Cadastro');
        });
        $("#btnLoginToggle").click(function () {
            $("#formCadastro").hide();
            $("#formLogin").fadeIn();
            $("#titulo").text('Login');
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
             