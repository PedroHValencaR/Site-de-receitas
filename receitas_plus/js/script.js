// Aguarda o carregamento do DOM (Estrutura da página)
document.addEventListener('DOMContentLoaded', function() {
    
    // Seleciona o botão de login pelo ID
    const btnLogin = document.getElementById('btn_login');

    // Adiciona um "ouvinte" de evento para o clique
    btnLogin.addEventListener('click', function() {
        // Simula uma validação de dados usando Prompt do navegador
        let email = prompt("Digite seu e-mail:");
        let senha = prompt("Digite sua senha:");

        // Função simples de validação
        if (validarLogin(email, senha)) {
            alert("Login realizado com sucesso! Bem-vindo ao Receitas+");
        } else {
            alert("Erro: E-mail ou senha inválidos.");
        }
    });
});

// Função declarada para validar os dados (Conceito de Funções - Seção I.4)
function validarLogin(email, senha) {
    // Verifica se os campos não estão vazios
    if (email === null || email === "" || senha === null || senha === "") {
        return false;
    }
    // Validação básica (apenas exemplo)
    if (email.includes("@") && senha.length > 5) {
        return true;
    }
    return false;
}