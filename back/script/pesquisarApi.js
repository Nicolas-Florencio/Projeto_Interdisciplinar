    // Função para criar um objeto produto a partir dos dados recebidos
    function criarProduto(dadosApi) {
        const produto = {
            idProduto: dadosApi.idProduto,
            nome: dadosApi.nome,
            peso: dadosApi.peso,
            descricao: dadosApi.descricao,
            marca: dadosApi.marca,
            ingredientes: dadosApi.ingredientes
        };
        return produto;
    }

    async function pesquisarApi(url, busca) {
        try {
            //console.log("entrou: " + url + busca);
            const respostaApi = await fetch(url + '?busca=' + busca);
            const retorno = await respostaApi.json();

            const resultadoDiv = document.getElementById('resultado'); //Pega div para inserir resultado
            resultadoDiv.innerHTML = ''; //Limpa os resultados anteriores

            if (retorno.error) {
                alert("Erro na consulta"); //caso haja erros vindo da API
            }

            else if (retorno.length > 0) {

                retorno.forEach(dados => {
                    var card = document.createElement('div');
                    var img = document.createElement('img');
                    var p1 = document.createElement('p');
                    var p2 = document.createElement('p');
                    var p3 = document.createElement('p');

                    const produto = criarProduto(dados); // criação de objeto
                    
                    p1.setAttribute('class', 'prod');
                    p1.setAttribute('id', 'prod1');
                    p2.setAttribute('class', 'prod');
                    p3.setAttribute('class', 'prod');
                    card.setAttribute('class', 'card');
                    img.setAttribute('src', `../../back/images/${produto.idProduto}.png`);
                    img.setAttribute('id', `imgTam`);
                    img.setAttribute('alt', `${produto.nome}`);

                    //colocando os dados dentro do elemento
                    p1.innerHTML = `${produto.nome}`;
                    p2.innerHTML = `Descricao: ${produto.descricao}`;
                    p3.innerHTML = `Peso: ${produto.peso}g`;

                    card.appendChild(img); //coloca a imagem dentro da div
                    card.appendChild(p1); //coloca o p dentro da div
                    card.appendChild(p2); //coloca o p dentro da div
                    card.appendChild(p3); //coloca o p dentro da div
                    resultadoDiv.appendChild(card); //colocando a div dentro do resultado
                });
            }
            else {
                p.innerHTML = "Resultado não encontrado!";
                resultadoDiv.appendChild(p);
            }
        }
        catch(erro) {
            alert(erro);
        }
    }

    let params = new URLSearchParams(document.location.search); //Objeto da url
    let busca = params.get("buscar"); //parametro da url        

    let url = "buscar";
    url = criarUrl(url);

    document.getElementById("form").addEventListener('submit', async (e) => {
        e.preventDefault(); //cancela envio do formulário
        let busca = document.getElementById('barraPesq').value; //pega busca
        await pesquisarApi(url, busca);
    });
    pesquisarApi(url, busca);
