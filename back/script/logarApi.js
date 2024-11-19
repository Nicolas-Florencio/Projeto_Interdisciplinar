
function logarApi() {
    document.getElementById("form").addEventListener('submit', async (e) => {
        e.preventDefault(); //cancela envio do formulário

        let loginValue = document.getElementById('user').value; //pega dados de pesquisa
        let senhaValue = document.getElementById('pass').value; //pega dados de pesquisa
        let url = "logar";
        url = criarUrl(url);

        // console.log(loginValue, senhaValue, url)
        try  {
            const respostaApi = await fetch(url, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: loginValue,
                    senha: senhaValue
                })
            });
            
            if(respostaApi.ok) {
                let retorno = await respostaApi.json();
                console.log(retorno);

                if(retorno.success && retorno.redirect) {
                    window.location.href = retorno.redirect;
                }
            }
            else {
                console.log("Usuário ou senha inválido");

                const resultadoDiv = document.getElementById('form'); //Pega div para inserir resultado
                var p1 = document.createElement('p');
                p1.setAttribute('class', 'erro');
                p1.innerHTML = "Usuário ou senha inválidos";
                resultadoDiv.appendChild(p1);
            }
        }
        catch(e) {
            console.log("Erro na requisição HTTP!", e);
        }
    })
}