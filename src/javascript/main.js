
function volta(){
    window.location.href = "../pags/login.php"
}

function tabelas(){
    getDesp();
    getConta();
}

//Refazer tudo

/////////////////////////////////// DESPESAS ///////////////////////////////////

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

function cadDesp(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            getDesp();
            window.alert("Despesa cadastrada com sucesso!")
        }
    };
    url = "../functions.php?caddesp&tipo=" + document.getElementById("tipodesp").value + "&data=" + document.getElementById("data").value + "&hora=" + document.getElementById("hora").value + "&valor=" + document.getElementById("valordesp").value;
    xhttp.open("POST", url, true);
    xhttp.send();
}

function putDesp(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            window.alert("Despesa atualizada com sucesso!");
        }
    };
    url = "../functions.php?putdesp&tipo=" + document.getElementById("tipodesp").value + "&data=" + document.getElementById("data").value + "&hora=" + document.getElementById("hora").value + "&valor=" + document.getElementById("valordesp").value;
    xhttp.open("GET", url, true);
    xhttp.send()
}

function delDesp(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            window.alert("Despesa apagada com sucesso!");
        }
    };
    url = "../functions.php?deldesp&id=" + document.getElementById("deldesp").value;
    xhttp.open("GET", url, true);
    xhttp.send()
}

/////////////////////////////////// CONTAS ///////////////////////////////////

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

function cadConta(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            getConta();
            window.alert("Conta cadastrada com sucesso!");
        }
    };
    url = "../functions.php?cadconta&tipo=" + document.getElementById("tipoconta").value + "&prazo=" + document.getElementById("prazo").value + "&valor=" + document.getElementById("valorconta").value;
    xhttp.open("POST", url, true);
    xhttp.send();
}

function putConta(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            window.alert("Conta atualizada com sucesso!");
        }
    };
    url = "../functions.php?putconta&tipo=" + document.getElementById("tipoconta").value + "&prazo=" + document.getElementById("prazo").value + "&valor=" + document.getElementById("valorconta").value;
    xhttp.open("GET", url, true);
    xhttp.send()
}

function delConta(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            window.alert("Conta apagada com sucesso!");
        }
    };
    url = "../functions.php?delconta&id=" + document.getElementById("delconta").value;
    xhttp.open("GET", url, true);
    xhttp.send()
}