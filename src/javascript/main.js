
function volta(){
    window.location.href = "../pags/login.php"
}

function tabelaMovi(){
    var mesAtual = new Date().getMonth() + 1;
    atualizarJSONmovi();
    setTimeout(displayMovi, 500, mesAtual);
    //setTimeout(getMovi, 500);
}

function tabelaFixo(){
    var mesAtual = new Date().getMonth() + 1;
    atualizarJSONfixo();
    setTimeout(displayFixo, 500, mesAtual);
    //setTimeout(getFixos, 500);
}

function loadRel(){
    var mesAtual = new Date().getMonth() + 1;
    atualizarJSONmovi();
    setTimeout(displayRel, 500, mesAtual);
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
    movimentacoes.sort((a,b)=>{
        var dateA = new Date(a.data + "T00:00:00").getDate();
        var dateB = new Date(b.data + "T00:00:00").getDate();
        if(dateA < dateB){
            return -1;
        }
        if(dateA > dateB){
            return 1;
        }
        return 0;
    })

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
async function displayMovi(mes){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            movimentacoes = objJSON.movimentacoes;
            //console.log(movimentacoes);
            if(movimentacoes.length == 0){
                document.getElementById("movimentacoes").innerHTML = "<p class='naotem'>Não há movimentações registradas neste mês</p>"
                document.getElementById("periodo").setAttribute("hidden", "")
            } else{
                if(document.getElementById("periodo").hasAttribute("hidden")){
                    document.getElementById("periodo").removeAttribute("hidden")
                }
                var mesfiltrado = movimentacoes.filter(m => {
                    var moviData = new Date(m.data + "T00:00:00").getMonth() + 1;
                    return mes == moviData;
                })
                
                tableBuilderMovi(mesfiltrado);
                mesesBtnsMovi(movimentacoes);
                totalMovi(mesfiltrado);    
            }
            
        }
    };

    xhttp.open("GET", "../json/movi.json", true);
    xhttp.send();
}

function mesesBtnsMovi(movimentacoes){
    var data = new Date();
    var options = { month : "long"};
    var mesAtual = new Intl.DateTimeFormat("pt-BR", options).format(data);
    var classes = document.getElementsByClassName("mes");

    var mesesjson = [];
    movimentacoes.forEach(m => {
        var dataformat = new Date(m.data + "T00:00:00")
        var mes = new Intl.DateTimeFormat("pt-BR", options).format(dataformat)
        if(!mesesjson.includes(mes)){
            mesesjson.push(mes);   
        }
    })

    for(var i = 0; i < classes.length; i++){
        if(classes[i].value.toLowerCase() == mesAtual){
            classes[i].setAttribute("checked", "")
        }
        if(!mesesjson.includes(classes[i].value)){
            document.getElementById(classes[i].value).setAttribute("hidden", "")
        }
    }
}

function bringMesMovi(mes){

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            objJSON = JSON.parse(this.responseText);
            movimentacoes = objJSON.movimentacoes;
            var options = { month : "long"};
            //console.log(movimentacoes);
            if(movimentacoes.length == 0){
                document.getElementById("movimentacoes").innerHTML = "<p class='naotem'>Não há movimentações registradas neste mês</p>"
            } else{
                var mesfiltrado = movimentacoes.filter(m => {
                    var dataformat = new Date(m.data + "T00:00:00")
                    var moviData = new Intl.DateTimeFormat("pt-BR", options).format(dataformat)
                    return mes == moviData;
                })
                tableBuilderMovi(mesfiltrado);
                totalMovi(mesfiltrado);
            }
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
                        var mesAtual = new Date().getMonth() + 1;
                        window.alert("Movimentação cadastrada com sucesso!")
                        document.getElementById("formmovi").reset();
                        atualizarJSONmovi();
                        setTimeout(displayMovi, 1000, mesAtual);
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
                    var mesAtual = new Date().getMonth() + 1;
                    window.alert("Movimentação atualizada com sucesso!")
                    document.getElementById("formmoviput").reset();
                    atualizarJSONmovi();
                    setTimeout(displayMovi, 1000, mesAtual);
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
                var mesAtual = new Date().getMonth() + 1;
                window.alert("Movimentação apagada com sucesso!")
                document.getElementById("formmovidel").reset();
                atualizarJSONmovi();
                setTimeout(displayMovi, 1000, mesAtual);
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

function totalMovi(movimentacoes){
    totald = 0;
    totalr = 0;
    movimentacoes.forEach(movi =>{
        if(movi.tipo == "Despesa"){
            totald += parseFloat(movi.valor);
        }
        if(movi.tipo == "Receita"){
            totalr += parseFloat(movi.valor);
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

function autofillputFixo(id, nome, cat, val, valor){
    document.getElementById("idputf").value = id;
    document.getElementById("nomeputf").value = nome;
    document.getElementById("catputf").value = cat;
    document.getElementById("validadeput").value = val;
    document.getElementById("valorputf").value = valor;
}

function autofillLancFixo(id, nome, cat, valor){
    var data = new Date();
    data + "T00:00:00";
    var novadata = data.toISOString().substring(0,10);
    document.getElementById("idb").value = id;
    document.getElementById("nomeb").value = nome;
    document.getElementById("catb").value = cat;
    document.getElementById("datab").value = novadata;
    document.getElementById("valorb").value = valor;
}

function autofilldelFixo(id){
    document.getElementById("iddelf").value = id;
}

function tableBuilderFixo(fixos){
    fixos.sort((a,b)=>{
        var dateA = new Date(a.validade + "T00:00:00").getDate();
        var dateB = new Date(b.validade + "T00:00:00").getDate();
        if(dateA < dateB){
            return -1;
        }
        if(dateA > dateB){
            return 1;
        }
        return 0;
    })

    conteudo = "<table id='fixos'>";
    conteudo += "<thead>";
    conteudo += "   <tr>";
    conteudo += "       <th>Nome</th>";
    conteudo += "       <th>Categoria</th>";
    conteudo += "       <th>Vencimento</th>";
    conteudo += "       <th>Valor</th>";
    conteudo += "   </tr>";
    conteudo += "</thead>";
    conteudo += "<tbody>";
    fixos.forEach(f => {
        conteudo += "   <tr>";
        conteudo += "       <td hidden class='idfixo'>" + f.id + "</td>";
        conteudo += "       <td>" + f.nome + "</td>";
        conteudo += "       <td>" + f.categoria + "</td>";
        conteudo += "       <td>" + convertData(f.validade) + "</td>";
        if(f.foi_paga == "1"){
            conteudo += "       <td>" + convertValor(f.valor) + " (pago) </td>";
        }else{
            conteudo += "       <td>" + convertValor(f.valor) + "</td>";
        }
        conteudo += "       <td><button type='submit' id='editarc' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#edfmodal' onclick='autofillputFixo(`" + f.id + "`,`" + f.nome + "`,`" + f.categoria + "`,`" + f.validade + "`,`" + f.valor + "`)'>Editar</button></td>";
        conteudo += "       <td><button type='submit' id='apagarc' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#apfmodal' onclick='autofilldelFixo(`"+ f.id + "`)'>Apagar</button></td>";
        if(f.foi_paga == "0"){
            conteudo += "       <td><button type='submit' id='baixa' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#bmodal' onclick='autofillLancFixo(`" + f.id + "`,`" + f.nome + "`,`" + f.categoria + "`,`" + f.valor + "`)'>Lançar</button></td>";
        }
        conteudo += "   </tr>";
    });
    conteudo +="</tbody>";
    document.getElementById("fixos").innerHTML = conteudo;
}

function tableBuilderFixoALL(fixos){
    if(fixos.length == 0){
        document.getElementById("alltable").innerHTML = "Não há despesas fixas a serem lançadas.";
        document.getElementById("enviarall").setAttribute("disabled", "");
    } else{
        conteudo = "<table id='alltable'>";
        conteudo += "<thead>";
        conteudo += "   <tr>";
        conteudo += "       <th>Nome</th>";
        conteudo += "       <th>Categoria</th>";
        conteudo += "       <th>Valor</th>";
        conteudo += "   </tr>";
        conteudo += "</thead>";
        conteudo += "<tbody>";
        fixos.forEach(f => {
            conteudo += "   <tr>";
            conteudo += "       <td hidden class='idlanc'>" + f.id + "</td>";
            conteudo += "       <td>" + f.nome + "</td>";
            conteudo += "       <td>" + f.categoria + "</td>";
            conteudo += "       <td><input class='valorlanc' type='number' required value='" + f.valor + "'></td>";
        });
        conteudo +="</tbody>";
        document.getElementById("alltable").innerHTML = conteudo; 
    }
    
}

async function displayFixo(mes){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            fixos = objJSON.fixos;
            //console.log(fixos);
            if(fixos.length == 0){
                document.getElementById("fixos").innerHTML = "<p class='naotem'>Não há lançamentos registrados neste mês</p>"
                document.getElementById("periodo").setAttribute("hidden", "")
            } else{
                if(document.getElementById("periodo").hasAttribute("hidden")){
                    document.getElementById("periodo").removeAttribute("hidden")
                }
                var mesfiltrado = fixos.filter(f => {
                    var fixoData = new Date(f.validade + "T00:00:00").getMonth() + 1;
                    return mes == fixoData;
                })
                
                tableBuilderFixo(mesfiltrado);
                mesesBtnsFixo(fixos);
                totalFixo(mesfiltrado);    
            }
            
        }
    };

    xhttp.open("GET", "../json/fixos.json", true);
    xhttp.send();
}

function mesesBtnsFixo(fixos){
    var data = new Date();
    var options = { month : "long"};
    var mesAtual = new Intl.DateTimeFormat("pt-BR", options).format(data);
    var classes = document.getElementsByClassName("mes");

    var mesesjson = [];
    fixos.forEach(f => {
        var dataformat = new Date(f.validade + "T00:00:00")
        var mes = new Intl.DateTimeFormat("pt-BR", options).format(dataformat)
        if(!mesesjson.includes(mes)){
            mesesjson.push(mes);   
        }
    })

    for(var i = 0; i < classes.length; i++){
        if(classes[i].value.toLowerCase() == mesAtual){
            classes[i].setAttribute("checked", "")
        }
        if(!mesesjson.includes(classes[i].value)){
            document.getElementById(classes[i].value).setAttribute("hidden", "")
        }
    }
}

function bringMesFixo(mes){

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            objJSON = JSON.parse(this.responseText);
            fixos = objJSON.fixos;
            //console.log(fixos);
            if(fixos.length == 0){
                document.getElementById("fixos").innerHTML = "<p class='naotem'>Não há lançamentos registrados neste mês</p>"
            } else{
                var options = { month : "long"};
                var mesfiltrado = fixos.filter(f => {
                    var dataformat = new Date(f.validade + "T00:00:00")
                    var fixoData = new Intl.DateTimeFormat("pt-BR", options).format(dataformat)
                    return mes == fixoData;
                })    
                tableBuilderFixo(mesfiltrado);
                totalFixo(mesfiltrado);
            }
            
            
            
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
        url = "../functions.php?cadfixo&nome=" + document.getElementById("nome").value + "&categoria=" + document.getElementById("categoria").value + "&validade=" + document.getElementById("validade").value + "&valor=" + document.getElementById("valorconta").value;
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
        url = "../functions.php?putfixo&id=" + document.getElementById("idputf").value + "&nome=" + document.getElementById("nomeputf").value + "&categoria=" + document.getElementById("catputf").value + "&validade=" + document.getElementById("validadeput").value + "&valor=" + document.getElementById("valorputf").value;
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

function lancFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                window.alert("Lançamento convertido em despesa com sucesso!")
                document.getElementById("formfixob").reset();
                atualizarJSONfixo();
                setTimeout(displayFixo, 1000);
                setTimeout(totalFixo, 1000);
            }
            else{
                console.log(this.responseText);
                window.alert("Algo deu errado!")
            }
        }
    };
    url = "../functions.php?lancafixo&id=" + document.getElementById("idb").value + "&nome=" + document.getElementById("nomeb").value  + "&categoria=" + document.getElementById("catb").value +  "&data=" + document.getElementById("datab").value + "&valor=" + document.getElementById("valorb").value;
    xhttp.open("POST", url, true);
    xhttp.send()
}

function getNaoPagos(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            objJSON = JSON.parse(this.responseText);
            fixos = objJSON.fixos;
            console.log(fixos);
            var nPagos = fixos.filter(f => {
                if(f.foi_paga == "0"){return f;}
            });
            console.log(nPagos);
            tableBuilderFixoALL(nPagos);
        }
    };

    xhttp.open("GET", "../json/fixos.json", true);
    xhttp.send();
}

function lancNPagos(){
    var table = document.getElementById("alltable");
    var idvaljson = []
    for(var i = 1, j = 0; i < table.rows.length; i++, j++){
        obj = {"id": table.rows[i].cells[0].innerHTML, "nome": table.rows[i].cells[1].innerHTML, "categoria": table.rows[i].cells[2].innerHTML,"valor": document.getElementsByClassName("valorlanc")[j].value}
        idvaljson.push(obj)
        console.log(obj);
    }
    var data = new Date();
    data + "T00:00:00";
    var novadata = data.toISOString().substring(0,10);

    var idvalstring = JSON.stringify(idvaljson)
    console.log(idvalstring)
    console.log(novadata)

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText)
            window.alert("Lançamentos convertidos em despesas com sucesso!")
            atualizarJSONfixo();
            setTimeout(displayFixo, 1000);
            setTimeout(totalFixo, 1000);
        }
    };

    url = "../functions.php?lancaall&objs=" + idvalstring + "&data=" + novadata;
    xhttp.open("POST", url, true);
    xhttp.send();
}

function totalFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            objJSON = JSON.parse(this.responseText);
            fixos = objJSON.fixos;
            
            total = 0;
            fixos.forEach(f =>{
                if(f.foi_paga == "0"){
                    total += parseInt(f.valor);
                }
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

function displayRel(mes){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            movimentacoes = objJSON.movimentacoes;
            //console.log(movimentacoes);

            var mesfiltrado = movimentacoes.filter(m => {
                var moviData = new Date(m.data + "T00:00:00").getMonth() + 1;
                return mes == moviData;
            })
            
            mesesBtnsRel(movimentacoes);
            graph1(mesfiltrado);
            graph2(mesfiltrado);
            graph3(movimentacoes);
        }
    };

    xhttp.open("GET", "../json/movi.json", true);
    xhttp.send();
}

function mesesBtnsRel(movimentacoes){
    var data = new Date();
    var options = { month : "long"};
    var mesAtual = new Intl.DateTimeFormat("pt-BR", options).format(data);
    var classes = document.getElementsByClassName("mes");

    var mesesjson = [];
    movimentacoes.forEach(m => {
        var dataformat = new Date(m.data + "T00:00:00")
        var mes = new Intl.DateTimeFormat("pt-BR", options).format(dataformat)
        if(!mesesjson.includes(mes)){
            mesesjson.push(mes);   
        }
    })

    for(var i = 0; i < classes.length; i++){
        if(classes[i].value.toLowerCase() == mesAtual){
            classes[i].setAttribute("checked", "")
        }
        if(!mesesjson.includes(classes[i].value)){
            document.getElementById(classes[i].value).setAttribute("hidden", "")
        }
    }
}

function bringMesRel(mes){

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            objJSON = JSON.parse(this.responseText);
            movimentacoes = objJSON.movimentacoes;
            var options = { month : "long"};
            //console.log(movimentacoes);
            var mesfiltrado = movimentacoes.filter(m => {
                var dataformat = new Date(m.data + "T00:00:00")
                var moviData = new Intl.DateTimeFormat("pt-BR", options).format(dataformat)
                return mes == moviData;
            })
            
            graph1(mesfiltrado);
            graph2(mesfiltrado);
        }
    };
    
    xhttp.open("GET", "../json/movi.json", true);
    xhttp.send();
}

function graph1(movimentacoes){
    var categorias = [];
    movimentacoes.forEach(m => {
        if(m.tipo == "Despesa"){
            categorias.push(m.categoria)    
        }
    })
    if(categorias.length == 0){
        document.getElementById("grafico1").innerHTML = "<p class='naotem'>Você não tem despesas neste mês.</p>"
    } else{
        var labels = [];
        categorias.forEach(m => {
            if(!labels.includes(m)){
                labels.push(m)
            }
        })
        var data = [];
        labels.forEach(l => {
            var count = 0;
            for(var c of categorias){
                if (c == l){
                    count += 1;
                }
            }
            data.push(count);
        })
        var data2 = [];
        labels.forEach(l => {
            var totald = 0;
            movimentacoes.forEach(m => {
                if(l == m.categoria){
                    totald += parseFloat(m.valor);
                }
            })
            data2.push(totald);
        })
        
        //console.log(categorias);
        //console.log(labels);
        //console.log(data);
        //console.log(data2);

        document.getElementById("grafico1").innerHTML = "<canvas id='myChart1'></canvas>"

        const ctx1 = document.getElementById('myChart1');

        var graph1;

        graph1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: '# de Despesas',
                    data: data,
                    borderWidth: 1
                },
                {
                    label: 'Total gasto (R$)',
                    data: data2,
                    borderWidth: 1
                }]
            },
            options: {
                interaction:{
                    mode: 'index'
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Total de despesas deste mês / Total gasto (por categoria)'
                    }
                }
            }
        }); 
    }
}

function graph2(movimentacoes){
    var destemes = movimentacoes.filter(m => {
        if(m.tipo == "Despesa"){
            return m
        }
    })
    if(destemes.length == 0){
        document.getElementById("grafico2").innerHTML = "<p class='naotem'>Você não tem despesas neste mês.</p>"
    } else{
        var labels = [];
        var moviMes = new Date(destemes[0].data).getMonth() + 1;
        if(moviMes == "1" || moviMes == "3" || moviMes == "5" || moviMes == "7" || moviMes == "8" || moviMes == "10" || moviMes == "12"){
            labels.push('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18','19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31')
        }
        if(moviMes == "4" || moviMes == "6" || moviMes == "9" || moviMes == "11"){
            labels.push('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18','19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30')
        }
        if(moviMes == "2"){
            labels.push('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18','19', '20', '21', '22', '23', '24', '25', '26', '27', '28')
        }

        var dias = [];
        destemes.forEach(m => {
            var dia = new Date(m.data + "T00:00:00").getDate()
            dias.push(String(dia))
        })

        var data = [];
        labels.forEach(l => {
            var count = 0;
            for(var d of dias){
                if (d == l){
                    count += 1;
                }
            }
            data.push(count);
        })
        var data2 = [];
        labels.forEach(l => {
            var totald = 0;
            destemes.forEach(m => {
                var moviData = new Date(m.data + "T00:00:00").getDate();
                if(l == moviData){
                    totald += parseFloat(m.valor);
                }
            })
            data2.push(totald);
        })

        //console.log(destemes)
        //console.log(labels)
        //console.log(dias)
        //console.log(data2)

        document.getElementById("grafico2").innerHTML = "<canvas id='myChart2'></canvas>"

        const ctx2 = document.getElementById('myChart2');

        var graph2;

        graph2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# de Despesas',
                    data: data,
                    borderWidth: 1
                },
                {
                    label: 'Total gasto (R$)',
                    data: data2,
                    borderWidth: 1
                }]
            },
            options: {
                interaction:{
                    mode: 'index'
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Total de despesas deste mês / Total gasto (por dia)'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
            
        });    
    }

    
}

function graph3(movimentacoes){
    //console.log(movimentacoes)

    var options = {month : "long"};

    var meses = [];
    movimentacoes.forEach(m => {
        if(m.tipo == "Despesa"){
            var dataformat = new Date(m.data + "T00:00:00")
            var moviData = new Intl.DateTimeFormat("pt-BR", options).format(dataformat)
            meses.push(moviData)
        }
    })
    if(meses.length == 0){
        document.getElementById("grafico3").innerHTML = "<p class='naotem'>Você não tem despesas neste ano.<p>"
    } else{
        var labels = [];
        meses.forEach(m => {
            if(!labels.includes(m)){
                labels.push(m)
            }
        })
        var data1 = [];
        labels.forEach(l => {
            var count = 0;
            for(var m of meses){
                if (m == l){
                    count += 1;
                }
            }
            data1.push(count);
        })

        var data2 = [];
        labels.forEach(l => {
            var totald = 0;
            movimentacoes.forEach(m => {
                var dataformat = new Date(m.data + "T00:00:00")
                var moviData = new Intl.DateTimeFormat("pt-BR", options).format(dataformat)
                if(l == moviData){
                    totald += parseFloat(m.valor);
                }
            })
            data2.push(totald);
        })
        for(var l = 0; l < labels.length; l++){
            var newl = String(labels[l][0]).toUpperCase() + String(labels[l]).slice(1);
            labels[l] = newl
        }

        //console.log(meses)
        //console.log(labels)
        //console.log(data1)
        //console.log(data2)

        const ctx3 = document.getElementById('myChart3');

        var graph3;

        graph3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# de Despesas',
                    data: data1,
                    borderWidth: 1
                },
                {
                    label: 'Total gasto (R$)',
                    data: data2,
                    borderWidth: 1
                }]
            },
            options: {
                interaction:{
                    mode: 'index'
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Total de despesas deste ano / Total gasto por mês'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });    
    }
    
}