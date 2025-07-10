
function volta(){
    window.location.href = "../pags/login.php"
}

function tabelaMovi(){
    atualizarJSONmovi();
    setTimeout(displayMovi, 500);
    setTimeout(getMovi, 500);
    totalMovi();
}

function tabelaFixo(){
    atualizarJSONfixo();
    setTimeout(displayFixo, 500);
    setTimeout(getFixos, 500);
    totalFixo();
}

function loadRel(){
    totalMovi();
    graph1();
    graph2();
    graph3();
}

function convertData(data){
    var d = new Date(data + "T00:00:00");
    var newd = d.toLocaleDateString();
    return newd;
}

function convertValor(valor){
    var newv = Number(valor).toLocaleString("pt-BR",{style:"currency", currency:"BRL"});
    return newv
}

if(document.getElementById("pesquisar")){
    var form = document.getElementById("formpesquisar")
    form.onsubmit = function(e){
        e.preventDefault();
    }
}

/////////////////////////////////// MOVIMENTAÇÕES ///////////////////////////////////

async function getMovi(){
    var xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "../json/movi.json", true);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
        }
    };

    xhttp.send();
}

async function atualizarJSONmovi(){
    var xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "../functions.php?getmovi", true);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
        }
    };
    xhttp.send();
}

function autofillputMovi(id, nome, cat, data, valor, tipo){
    document.getElementById("idputm").value = id;
    document.getElementById("nomeputm").value = nome;
    document.getElementById("categoriaput").value = cat;
    document.getElementById("dataput").value = data;
    document.getElementById("valorputm").value = valor;
    document.getElementById("tipoput").value = tipo;
}

function autofilldelMovi(id){
    document.getElementById("iddelm").value = id;
}

function tableBuilderMovi(movimentacoes){
    conteudo = "<table id='movimentacoes'>";
    conteudo += "<thead>";
    conteudo += "   <tr>";
    conteudo += "       <th>Nome</th>";
    conteudo += "       <th>Categoria</th>";
    conteudo += "       <th>Data</th>";
    conteudo += "       <th>Valor</th>";
    conteudo += "   </tr>";
    conteudo += "</thead>";
    conteudo += "<tbody>";
    movimentacoes.forEach(movi => {
        conteudo += "   <tr class='linha'>";
        conteudo += "       <td hidden class='idmovi'>" + movi.id + "</td>";
        conteudo += "       <td>" + movi.nome + "</td>";
        conteudo += "       <td>" + movi.categoria + "</td>";
        conteudo += "       <td>" + convertData(movi.data) + "</td>";
        if(movi.tipo == "Despesa"){
            conteudo += "       <td style='color:red'>(-) " + convertValor(movi.valor) + "</td>"; + "</td>";
        } else{
            conteudo += "       <td style='color:green'>(+) " + convertValor(movi.valor) + "</td>";
        }
        conteudo += "       <td><button type='submit' id='editard' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#edmmodal' onclick='autofillputMovi(`" + movi.id + "`,`" + movi.nome + "`,`" + movi.categoria + "`,`" + movi.data + "`,`" + movi.valor + "`,`" + movi.tipo + "`)'>Editar</button></td>";
        conteudo += "       <td><button type='submit' id='apagard' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#apmmodal'onclick='autofilldelMovi(`" + movi.id + "`)' >Apagar</button></td>";
        conteudo += "   </tr>";
    });
    conteudo +="</tbody>";
    document.getElementById("movimentacoes").innerHTML = conteudo;
}
async function displayMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            movimentacoes = objJSON.movimentacoes;
            console.log(movimentacoes);
            
            tableBuilderMovi(movimentacoes);
        }
    };

    xhttp.open("GET", "../json/movi.json", true);
    xhttp.send();
}

function cadMovi(){
    if(!document.getElementById("nome").value || !document.getElementById("data").value || !document.getElementById("valor").value){
        window.alert("Faltam dados obrigatórios!")
        document.forms["formmovi"].reset();
    } else{
        var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    if(this.responseText == "1"){
                        window.alert("Movimentação cadastrada com sucesso!")
                        document.getElementById("formmovi").reset();
                        atualizarJSONmovi();
                        setTimeout(displayMovi, 1000);
                        setTimeout(totalMovi, 1000);
                    }
                    else{
                        window.alert("Algo deu errado!")
                    }
                }
            };
            url = "../functions.php?cadmovi&nome=" + document.getElementById("nome").value + "&categoria=" + document.getElementById("categoria").value + "&data=" + document.getElementById("data").value + "&valor=" + document.getElementById("valor").value + "&tipo=" + document.getElementById("tipo").value;
            xhttp.open("POST", url, true);
            xhttp.send();
    }
}

function putMovi(){
    if(!document.getElementById("nomeputm").value || !document.getElementById("dataput").value || !document.getElementById("valorputm").value){
        window.alert("Faltam dados obrigatórios!")
        document.forms["formmoviput"].reset();
    }else{
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText == "1"){
                    window.alert("Movimentação atualizada com sucesso!")
                    document.getElementById("formmoviput").reset();
                    atualizarJSONmovi();
                    setTimeout(displayMovi, 1000);
                    setTimeout(totalMovi, 1000);
                }
                else{
                    window.alert("Algo deu errado!")
                }
            }
        };
        url = "../functions.php?putmovi&id=" + document.getElementById("idputm").value + "&nome=" + document.getElementById("nomeputm").value + "&categoria=" + document.getElementById("categoriaput").value + "&data=" + document.getElementById("dataput").value + "&valor=" + document.getElementById("valorputm").value + "&tipo=" + document.getElementById("tipoput").value;
        xhttp.open("POST", url, true);
        xhttp.send()
    }
    
}

function delMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                window.alert("Movimentação apagada com sucesso!")
                document.getElementById("formmovidel").reset();
                atualizarJSONmovi();
                setTimeout(displayMovi, 1000);
                setTimeout(totalMovi, 1000);
            }
            else{
                window.alert("Algo deu errado!")
            }
        }
    };
    url = "../functions.php?delmovi&id=" + document.getElementById("iddelm").value;
    xhttp.open("POST", url, true);
    xhttp.send()
}

function totalMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            objJSON = JSON.parse(this.responseText);
            movimentacoes = objJSON.movimentacoes;
            
            totald = 0;
            totalr = 0;
            movimentacoes.forEach(movi =>{
                if(movi.tipo == "Despesa"){
                    totald += parseInt(movi.valor);
                }
                if(movi.tipo == "Receita"){
                    totalr += parseInt(movi.valor);
                }
            });
            if(totald != 0){
                document.getElementById("numd").innerHTML = convertValor(totald);  
            } else{
                document.getElementById("numd").innerHTML = "N/A";  
            }
            if(totalr != 0){
                document.getElementById("numr").innerHTML = convertValor(totalr);  
            } else{
                document.getElementById("numr").innerHTML = "N/A";  
            }
        }
    };

    xhttp.open("GET", "../json/movi.json", true);
    xhttp.send();
}

function pesqMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            objJSON = JSON.parse(this.responseText);
            movimentacoes = objJSON.movimentacoes;

            var nome = document.forms["formpesquisar"]["nomep"].value;
            var cat = document.forms["formpesquisar"]["categoriap"].value;
            var data = document.forms["formpesquisar"]["datap"].value;
            var valor = document.forms["formpesquisar"]["valorp"].value;
            var tipo = document.forms["formpesquisar"]["tipop"].value;

            /*No Qualquer:
                - pusha todo mundo do array de movis pro pJson
                - verificar se o elemento pushado é o procurado
                    - se for, salva o elemento no matchesJson.
                    - se não for, mantém o elemento e continua o loop até acabar
                - se não houver nenhum encontrado, mostrar o pJson pro usuário.
                - se houver encontrados, mostrar o matchesJson pro usuário.
                ------------------
            No tipo específico:
                - pusha os que foram deste tipo pro pJson
                - verificar se o elemento pushado é o procurado
                    - se for, salva o elemento no matchesJson.
                    - se não for, mantém o elemento e continua o loop até acabar.
                - se não houver nenhum encontrado, mostrar o pjson pro usuário.
                - se houver encontrados, mostrar o matchesJson pro usuário.
            */

            //CONSERTAR
            //Fazer com que ele não traga elementos cujos valores batam com qualquer campo da pesquisa (ex.: no momento, pesquisar "Salário" e "Lazer" vai trazer os dois registros)

            var pJson = [];
            var matchesJson = [];
            for(var i = 0; i < movimentacoes.length; i++){
                //console.log("--------------");
                if(tipo == "Qualquer"){
                    pJson.push(movimentacoes[i])
                    if(movimentacoes[i].nome == nome || movimentacoes[i].categoria == cat || movimentacoes[i].data == data || movimentacoes[i].valor == valor){
                        matchesJson.push(movimentacoes[i])
                        //console.log("achou o registro específico") 
                    } else{
                        if(nome == "" && cat == "Qualquer" && data == "" && valor == ""){
                            //console.log("vazio")
                            continue
                        } else{
                            pJson.pop()
                            //console.log("não achou um específico")
                        }
                    }
                } else{
                    if (movimentacoes[i].tipo == tipo ){
                        pJson.push(movimentacoes[i])
                        //console.log("achou deste tipo") 
                        if(movimentacoes[i].nome == nome || movimentacoes[i].categoria == cat || movimentacoes[i].data == data || movimentacoes[i].valor == valor){
                            matchesJson.push(movimentacoes[i])
                           //console.log("achou o registro específico")
                        } else{
                            if(nome == "" && cat == "" && data == "" && valor == ""){
                                //console.log("vazio")
                                continue
                            } else{
                                pJson.pop()
                                //console.log("não achou um específico")
                            }
                        }
                    } else{
                        //console.log("não achou deste tipo")
                        continue
                    } 
                }
            }

            if(matchesJson.length >= 1){
                tableBuilderMovi(matchesJson)
                console.log("Encontrou:" , matchesJson); 
            } else{
                if(pJson.length >= 1){
                    tableBuilderMovi(pJson)
                    console.log("Todos desse tipo" , pJson);    
                } else{
                    console.log("Não achei nada mermão")
                }
            }
        }
    };


    xhttp.open("GET", "../json/movi.json", true);
    xhttp.send();
}

/////////////////////////////////// LANÇAMENTOS FIXOS ///////////////////////////////////


async function getFixos(){
    var xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "../json/fixos.json", true);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
        }
    };

    xhttp.send();
}

async function atualizarJSONfixo(){
    var xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "../functions.php?getfixo", true);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
        }
    };

    xhttp.send();
}

function autofillputFixo(id, nome, val, valor){
    document.getElementById("idputf").value = id;
    document.getElementById("nomeputf").value = nome;
    document.getElementById("validadeput").value = val;
    document.getElementById("valorputf").value = valor;
}

function autofilldelFixo(id){
    document.getElementById("iddelf").value = id;
}

function tableBuilderFixo(fixos){
    conteudo = "<table id='fixos'>";
    conteudo += "<thead>";
    conteudo += "   <tr>";
    conteudo += "       <th>Nome</th>";
    conteudo += "       <th>Validade</th>";
    conteudo += "       <th>Valor</th>";
    conteudo += "   </tr>";
    conteudo += "</thead>";
    conteudo += "<tbody>";
    fixos.forEach(f => {
        conteudo += "   <tr>";
        conteudo += "       <td hidden class='idfixo'>" + f.id + "</td>";
        conteudo += "       <td>" + f.nome + "</td>";
        conteudo += "       <td>" + convertData(f.validade) + "</td>";
        conteudo += "       <td>" + convertValor(f.valor) + "</td>";
        conteudo += "       <td><button type='submit' id='editarc' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#edfmodal' onclick='autofillputFixo(`" + f.id + "`,`" + f.nome + "`,`" + f.validade + "`,`" + f.valor + "`)'>Editar</button></td>";
        conteudo += "       <td><button type='submit' id='apagarc' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#apfmodal' onclick='autofilldelFixo(`"+ f.id + "`)'>Apagar</button></td>";
        conteudo += "       <td><button type='submit' id='baixa' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#bmodal'>Dar Baixa</button></td>";
        conteudo += "   </tr>";
    });
    conteudo +="</tbody>";
    document.getElementById("fixos").innerHTML = conteudo;
}

function displayFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            fixos = objJSON.fixos;
            console.log(fixos);
            
            tableBuilderFixo(fixos);
        }
    };

    xhttp.open("GET", "../json/fixos.json", true);
    xhttp.send();
}

function cadFixo(){
    if(!document.getElementById("nome").value || !document.getElementById("validade").value || !document.getElementById("valorconta").value){
        window.alert("Faltam dados obrigatórios!")
        document.forms["formfixo"].reset();
    }else{
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText == "1"){
                    window.alert("Lançamento fixo cadastrado com sucesso!")
                    document.getElementById("formfixo").reset();
                    atualizarJSONfixo();
                    setTimeout(displayFixo, 1000);
                    setTimeout(totalFixo, 1000);
                }
                else{
                    window.alert("Algo deu errado!")
                }
            }
        };
        url = "../functions.php?cadfixo&nome=" + document.getElementById("nome").value + "&validade=" + document.getElementById("validade").value + "&valor=" + document.getElementById("valorconta").value;
        xhttp.open("POST", url, true);
        xhttp.send();   
    }
    
}

function putFixo(){
    if(!document.getElementById("nomeputf").value || !document.getElementById("validadeput").value || !document.getElementById("valorputf").value){
        window.alert("Faltam dados obrigatórios!")
        document.forms["formfixoput"].reset();
    }else{
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText == "1"){
                    window.alert("Lançamento fixo atualizado com sucesso!")
                    document.getElementById("formfixoput").reset();
                    atualizarJSONfixo();
                    setTimeout(displayFixo, 1000);
                    setTimeout(totalFixo, 1000);
                }
                else{
                    console.log(this.responseText)
                    window.alert("Algo deu errado!")
                }
            }
        };
        url = "../functions.php?putfixo&id=" + document.getElementById("idputf").value + "&nome=" + document.getElementById("nomeputf").value + "&validade=" + document.getElementById("validadeput").value + "&valor=" + document.getElementById("valorputf").value;
        xhttp.open("POST", url, true);
        xhttp.send()    
    }
    
}

function delFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                window.alert("Lançamento fixo apagado com sucesso!")
                document.getElementById("formfixodel").reset();
                atualizarJSONfixo();
                setTimeout(displayFixo, 1000);
                setTimeout(totalFixo, 1000);
            }
            else{
                window.alert("Algo deu errado!")
            }
        }
    };
    url = "../functions.php?delfixo&id=" + document.getElementById("iddelf").value;
    xhttp.open("POST", url, true);
    xhttp.send()
}

function totalFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            objJSON = JSON.parse(this.responseText);
            fixos = objJSON.fixos;
            
            total = 0;
            fixos.forEach(f =>{
                total += parseInt(f.valor);
            });
            if(total != 0){
                document.getElementById("numf").innerHTML = convertValor(total);  
            } else{
                document.getElementById("numf").innerHTML = "N/A";  
            }
        }
    };

    xhttp.open("GET", "../json/fixos.json", true);
    xhttp.send();
}

/////////////////////////////////// RELATÓRIO ///////////////////////////////////

function graph1(){
    const ctx1 = document.getElementById('myChart1');

    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Moradia', 'Alimentação', 'Lazer', 'Saúde', 'Educação', 'Transporte', 'Trabalho'],
            datasets: [{
                label: '# de Despesas',
                data: [12, 19, 3, 5, 2, 3, 6],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function graph2(){
    const ctx2 = document.getElementById('myChart2');

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18','19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
            datasets: [{
                label: '# de Despesas',
                data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 7, 5],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function graph3(){
    const ctx3 = document.getElementById('myChart3');

    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: '# de Despesas',
                data: [12, 19, 3, 5, 2, 3, 5, 4, 7, 6, 2, 4],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}