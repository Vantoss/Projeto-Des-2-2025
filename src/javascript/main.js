
function volta(){
    window.location.href = "../pags/login.php"
}

/////////////////////////////////// DESPESAS ///////////////////////////////////

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

function cadConta(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText)
        }
    };
    url = "../functions.php?cadconta&tipo=" + document.getElementById("tipoconta").value + "&prazo=" + document.getElementById("prazo").value + "&valorconta=" + document.getElementById("valorconta").value;
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
    url = "../functions.php?putconta&tipo=" + document.getElementById("tipoconta").value + "&prazo=" + document.getElementById("prazo").value + "&valorconta=" + document.getElementById("valorconta").value;
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