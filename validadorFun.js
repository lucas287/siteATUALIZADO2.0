    function validarFormulario() {
        const nome = document.forms[0].nome.value;
        const cpf = document.forms[0].cpf.value;
        const telefone = document.forms[0].telefone.value;
        const email = document.forms[0].email.value;
        const senha = document.forms[0].senha.value;
        const repetirSenha = document.forms[0].repetirSenha.value;

        if (!nome || !cpf || !telefone || !email || !senha || !repetirSenha) {
            alert("Por favor, preencha todos os campos obrigatórios.");
            return false;
        }

        if (senha !== repetirSenha) {
            alert("As senhas não coincidem.");
            return false;
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Por favor, insira um e-mail válido.");
            return false;
        }


        return true; 
    }
