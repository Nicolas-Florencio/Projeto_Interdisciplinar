
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
                else if(respostaApi.code == 403) {
                    console.log("Usuario ou senha invalidos");
                }
            }
        }
        catch(e) {
            console.log("Erro na requisição HTTP!", e);
        }
    })
}