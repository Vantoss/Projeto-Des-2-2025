var form = document.getElementById("loginform")
form.onsubmit = function(e){
    e.preventDefault();
}

//////////////////////////////////////////////////////////////////////

function login(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            if (this.responseText == document.getElementById("nomelog").value){
                window.location.href = "../pags/main.php";
            } else{
                window.alert("Dados incorretos!")
            }
        }
    };
    url = "../functions.php?login&nome=" + document.getElementById("nomelog").value + "&senha=" + document.getElementById("senhalog").value;
    xhttp.open("POST", url, true);
    xhttp.send();
}

function autofillLogin(nome, senha){
    document.getElementById("nomelog").value = nome;
    document.getElementById("senhalog").value = senha;
}

function cadastro(){
    var xhttp = new XMLHttpRequest();

    var nome = document.getElementById("nomecad").value;
    var senha = document.getElementById("senhacad").value

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            window.alert("Usuário cadastrado com sucesso!");
            autofillLogin(nome, senha);
        }
    };
    url = "../functions.php?caduser&nome=" + nome + "&senha=" + senha;
    xhttp.open("POST", url, true);
    xhttp.send();
}

function atualizar(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText)
        }
    };
    url = "../functions.php?putuser&nome=" + document.getElementById("userput").value + "&senha=" + document.getElementById("userput").value + "&id=" + document.getElementById("userputid").value;
    xhttp.open("GET", url, true);
    xhttp.send()
}

function deletar(){
    if(document.getElementById("iddel").value == "1" || document.getElementById("iddel").value == "2"){
        window.alert("Você não pode deletar este usuário");
    }else{
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText)
            }
        };
        
        url = "../functions.php?deluser&id=" + document.getElementById("iddel").value;
        xhttp.open("GET", url, true);
        xhttp.send()
    }
    
}