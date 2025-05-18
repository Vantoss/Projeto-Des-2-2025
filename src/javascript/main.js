
function volta(){
    window.location.href = "../pags/login.php"
}

function tabelas(){
    getDesp();
    getConta();
}

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
            conteudo += "<tr>";
            conteudo += "   <th>Tipo</th>";
            conteudo += "   <th>Data</th>";
            conteudo += "   <th>Hora</th>";
            conteudo += "   <th>Valor</th>";
            conteudo += "</tr>";
            despesas.forEach(desp => {
                conteudo += "<tr>";
                conteudo += "   <td>" + desp.tipo + "</td>";
                conteudo += "   <td>" + desp.data + "</td>";
                conteudo += "   <td>" + desp.hora + "</td>";
                conteudo += "   <td>" + desp.valor + "</td>";
                conteudo += "</tr>";
            });
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
            console.log(this.responseText)
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
            console.log(this.responseText)
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
            console.log(this.responseText)
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
            conteudo += "<tr>";
            conteudo += "   <th>Tipo</th>";
            conteudo += "   <th>Prazo</th>";
            conteudo += "   <th>Valor</th>";
            conteudo += "</tr>";
            contas.forEach(conta => {
                conteudo += "<tr>";
                conteudo += "   <td>" + conta.tipo + "</td>";
                conteudo += "   <td>" + conta.prazo + "</td>";
                conteudo += "   <td>" + conta.valor + "</td>";
                conteudo += "</tr>";
            });
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
            console.log(this.responseText)
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
            console.log(this.responseText)
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
            console.log(this.responseText)
        }
    };
    url = "../functions.php?delconta&id=" + document.getElementById("delconta").value;
    xhttp.open("GET", url, true);
    xhttp.send()
}