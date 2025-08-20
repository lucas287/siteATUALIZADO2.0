    function validarFormulario() {
        const nome = document.forms[0].nome.value;
        const cpf = document.forms[0].cpf.value;
        const cnh = document.forms[0].cnh.value;
        const rg = document.forms[0].rg.value;
        const telefone = document.forms[0].telefone.value;
        const endereco = document.forms[0].endereco.value;
        const estado = document.forms[0].estado.value;
        const email = document.forms[0].email.value;
        const senha = document.forms[0].senha.value;
        const repetirSenha = document.forms[0].repetirSenha.value;
        const checkbox = document.forms[0].checkbox.checked;

        if (!nome || !cpf || !cnh || !rg || !telefone || !endereco || !estado || !email || !senha || !repetirSenha) {
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

        if (!checkbox) {
            alert("Você deve concordar com os termos de privacidade.");
            return false;
        }

        return true; 
    }
