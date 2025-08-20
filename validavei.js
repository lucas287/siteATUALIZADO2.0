    function validarFormulario() {
        const placa = document.forms[0].placa.value;
        const km = document.forms[0].km.value;
        const ano = document.forms[0].ano.value;
        const chassi = document.forms[0].chassi.value;
        const cor = document.forms[0].cor.value;
        const tipo = document.forms[0].tipo.value;
        const renavam = document.forms[0].renavam.value;
        const nome = document.forms[0].nome.value;

        if (!placa || !km || !ano || !chassi || !cor || !tipo || !renavam || !nome) {
            alert("Por favor, preencha todos os campos obrigatórios.");
            return false;
        }

        return true; 
    }
