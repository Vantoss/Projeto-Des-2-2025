
function volta(){
    window.location.href = "../pags/login.php"
}

function tabelas(){
    atualizarJSONmovi();
    atualizarJSONfixo();
    setTimeout(getMovi, 500);
    setTimeout(getFixos, 500);
}

//TESTAR REQUISIÇÕES

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

function getDesp(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            despesas = objJSON.despesas;
            console.log(despesas);
            
            conteudo = "<table id='despesas'>";
            conteudo += "<thead>";
            conteudo += "   <tr>";
            conteudo += "       <th>Nome</th>";
            conteudo += "       <th>Data</th>";
            conteudo += "       <th>Categoria</th>";
            conteudo += "       <th>Valor</th>";
            conteudo += "   </tr>";
            conteudo += "</thead>";
            conteudo += "<tbody>";
            despesas.forEach(desp => {
                conteudo += "   <tr>";
                conteudo += "       <td>" + desp.tipo + "</td>";
                conteudo += "       <td>" + desp.data + "</td>";
                conteudo += "       <td></td>";
                conteudo += "       <td>" + desp.valor + "</td>";
                conteudo += "       <td><button type='submit' id='editard' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#eddmodal'>Editar</button></td>";
                conteudo += "       <td><button type='submit' id='apagard' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#apdmodal'>Apagar</button></td>";
                conteudo += "   </tr>";
            });
            conteudo +="</tbody>";
            document.getElementById("despesas").innerHTML = conteudo;
        }
    };

    xhttp.open("GET", "../functions.php?getdesp", true);
    xhttp.send();
}

function cadMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                atualizarJSONmovi();
                getMovi();
                document.getElementById("formmovi").reset();
                window.alert("Movimentação cadastrada com sucesso!")
                //getDesp();
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
            console.log(this.responseText);
            window.alert("Movimentação atualizada com sucesso!");
        }
    };
    url = "../functions.php?putmovi&id=" + document.getElementById("idput") + "&nome=" + document.getElementById("nome").value + "&categoria=" + document.getElementById("categoria").value + "&data=" + document.getElementById("data").value + "&valor=" + document.getElementById("valor").value + "&tipo=" + document.getElementById("tipo").value;
    xhttp.open("POST", url, true);
    xhttp.send()
}

function delMovi(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            window.alert("Movimentação apagada com sucesso!");
        }
    };
    url = "../functions.php?delmovi&id=" + document.getElementById("iddel").value;
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

function getConta(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            contas = objJSON.contas;
            console.log(contas);
            
            conteudo = "<table id='contas'>";
            conteudo += "<thead>";
            conteudo += "   <tr>";
            conteudo += "       <th>Nome</th>";
            conteudo += "       <th>Prazo</th>";
            //conteudo += "       <th>Categoria</th>";
            conteudo += "       <th>Valor</th>";
            conteudo += "   </tr>";
            conteudo += "</thead>";
            conteudo += "<tbody>";
            contas.forEach(conta => {
                conteudo += "   <tr>";
                conteudo += "       <td>" + conta.tipo + "</td>";
                conteudo += "       <td>" + conta.prazo + "</td>";
                //conteudo += "       <td></td>";
                conteudo += "       <td>" + conta.valor + "</td>";
                conteudo += "       <td><button type='submit' id='editarc' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#edcmodal'>Editar</button></td>";
                conteudo += "       <td><button type='submit' id='apagarc' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#apcmodal'>Apagar</button></td>";
                conteudo += "       <td><button type='submit' id='baixa' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#bmodal'>Dar Baixa</button></td>";
                conteudo += "   </tr>";
            });
            conteudo +="</tbody>";
            document.getElementById("contas").innerHTML = conteudo;
        }
    };

    xhttp.open("GET", "../functions.php?getconta", true);
    xhttp.send();
}

function cadFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "1"){
                atualizarJSONfixo();
                getFixos();
                document.getElementById("formfixo").reset();
                window.alert("Custo fixo cadastrado com sucesso!")
                //getDesp();
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
            console.log(this.responseText);
            window.alert("Custo fixo atualizado com sucesso!");
        }
    };
    url = "../functions.php?putfixo&id=" + document.getElementById("idput") + "&nome=" + document.getElementById("nome").value + "&validade=" + document.getElementById("validade").value + "&valor=" + document.getElementById("valorconta").value;
    xhttp.open("POST", url, true);
    xhttp.send()
}

function delFixo(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            window.alert("Custo fixo apagado com sucesso!");
        }
    };
    url = "../functions.php?delfixo&id=" + document.getElementById("iddel").value;
    xhttp.open("POST", url, true);
    xhttp.send()
}