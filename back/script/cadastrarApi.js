// Função para redirecionar para o login caso haja sucesso
function redirecionar() {
    // Redireciona para outra página após 3 segundos
    let div = document.getElementById("resultado");
    let p = document.createElement("p");
    div.appendChild(p);

    let contagem = 3;

    let contador = setInterval(() => {
        p.innerHTML = contagem;
        contagem--;

        if (contagem < 0) {
            clearInterval(contador); // Parar intervalo
            window.location.href = "http://localhost/Projeto_Interdisciplinar/front/pages/logar.php"; // redirecionamento
        }
    }, 1000);
}

function cadastrarApi() {
    document.getElementById("form").addEventListener('submit', async (e) => {
        e.preventDefault(); //cancela envio do formulário

        let nome = document.getElementById('nome').value; //pega dados de cadastro
        let email = document.getElementById('email').value; //pega dados de cadastro
        let senha = document.getElementById('senha').value; //pega dados de cadastro
        let dataNasc = document.getElementById('data').value; //pega dados de cadastro
        
        let url = "cadastrar";
        url = criarUrl(url);
        

        try {
            const respostaApi = await fetch(url, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    nome: nome,
                    email: email,
                    senha: senha,
                    dataNasc: dataNasc
                })
            });

            if (respostaApi.ok) {
                console.log(respostaApi);
                redirecionar();
            }
            else if (respostaApi.status == 409) {
                console.log("Usuário já cadastrado!");
            }
            else {
                console.log("Erro vindo da API!", respostaApi.status);
            }
        }
        catch (e) {
            console.log("Erro na requisição HTTP: ", e);
        }
    });
}