
function volta(){
    window.location.href = "../pags/login.php"
}

function tabelaMovi(){
    atualizarJSONmovi();
    setTimeout(getMovi, 500);
    setTimeout(displayMovi, 500)
}

function tabelaFixo(){
    atualizarJSONfixo();
    setTimeout(getFixos, 500);
    setTimeout(displayFixo, 500)
}

function getID(id, metodo){ //Refazer para autocompletar os modais de editar e apagar. Dividir em duas funções. Fazer aplicar aos modais de fixos também.
    var inputid = id;
    if(metodo == "put"){
        document.getElementById("idputm").value = inputid;
    }
    if(metodo == "del"){
        document.getElementById("iddelm").value = inputid;
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

function displayMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            movimentacoes = objJSON.movimentacoes;
            console.log(movimentacoes);
            
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
                conteudo += "       <td>" + movi.data + "</td>";
                if(movi.tipo == "Despesa"){
                    conteudo += "       <td style='color:red'>(-) R$" + movi.valor + "</td>";
                } else{
                    conteudo += "       <td style='color:green'>(+) R$" + movi.valor + "</td>";
                }
                conteudo += "       <td><button type='submit' id='editard' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#edmmodal' onclick='getID(" + movi.id + ", `put`)'>Editar</button></td>";
                conteudo += "       <td><button type='submit' id='apagard' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#apmmodal'onclick='getID(" + movi.id + ", `del`)' >Apagar</button></td>";
                conteudo += "   </tr>";
            });
            conteudo +="</tbody>";
            document.getElementById("movimentacoes").innerHTML = conteudo;
        }
    };

    xhttp.open("GET", "../json/movi.json", true);
    xhttp.send();
}

function cadMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                window.alert("Movimentação cadastrada com sucesso!")
                document.getElementById("formmovi").reset();
                atualizarJSONmovi();
                setTimeout(displayMovi, 1000);
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

function putMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                window.alert("Movimentação atualizada com sucesso!")
                document.getElementById("formmoviput").reset();
                atualizarJSONmovi();
                setTimeout(displayMovi, 1000);
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

function delMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                window.alert("Movimentação apagada com sucesso!")
                document.getElementById("formmovidel").reset();
                atualizarJSONmovi();
                setTimeout(displayMovi, 1000);
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

/////////////////////////////////// CUSTOS FIXOS ///////////////////////////////////


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

function displayFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            fixos = objJSON.fixos;
            console.log(fixos);
            
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
                conteudo += "       <td>" + f.validade + "</td>";
                conteudo += "       <td>" + f.valor + "</td>";
                conteudo += "       <td><button type='submit' id='editarc' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#edfmodal'>Editar</button></td>";
                conteudo += "       <td><button type='submit' id='apagarc' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#apfmodal'>Apagar</button></td>";
                conteudo += "       <td><button type='submit' id='baixa' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#bmodal'>Dar Baixa</button></td>";
                conteudo += "   </tr>";
            });
            conteudo +="</tbody>";
            document.getElementById("fixos").innerHTML = conteudo;
        }
    };

    xhttp.open("GET", "../json/fixos.json", true);
    xhttp.send();
}

function cadFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                window.alert("Lançamento fixo cadastrado com sucesso!")
                document.getElementById("formfixo").reset();
                atualizarJSONfixo();
                setTimeout(displayFixo, 1000);
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

function putFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                window.alert("Lançamento fixo atualizado com sucesso!")
                document.getElementById("formfixoput").reset();
                atualizarJSONfixo();
                setTimeout(displayFixo, 1000);
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

function delFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                window.alert("Lançamento fixo apagado com sucesso!")
                document.getElementById("formfixodel").reset();
                atualizarJSONfixo();
                setTimeout(displayFixo, 1000);
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