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

function pesquisarApi() {
    document.getElementById("form").addEventListener('submit', (e) => {
        e.preventDefault(); //cancela envio do formulário

        let busca = document.getElementById('busca').value; //pega dados de pesquisa

        fetch('http://localhost/Projeto_Interdisciplinar/back/buscar.php?busca=' + busca)
            .then(
                respostaApi => {
                    return respostaApi.json(); //transforma o retorno da api em JSON
                }
            )
            .then(
                retorno => {
                    let resultadoDiv = document.getElementById('resultado'); //pega a div que receberá os resultados
                    // console.log(resultadoDiv);
                    resultadoDiv.innerHTML = '';
                    var p = document.createElement('p'); //criação de elemento de resultado

                    if (retorno.error) {
                        alert("Erro na consulta"); //caso haja erros vindo da API
                    }
                    else if (retorno.length > 0) {

                        retorno.forEach(dados => {
                            var p = document.createElement('p');
                            const produto = criarProduto(dados); // criação de objeto

                            //colocando os dados dentro do elemento
                            p.innerHTML = `${produto.idProduto} | ${produto.nome} | ${produto.descricao} | Peso: ${produto.peso} | Marca: ${produto.marca}`

                            resultadoDiv.appendChild(p); //colocando o elemento dentro da div
                        });
                    }
                    else {
                        p.innerHTML = "Resultado não encontrado!";
                        resultadoDiv.appendChild(p);
                    }
                }
            )
    })
}