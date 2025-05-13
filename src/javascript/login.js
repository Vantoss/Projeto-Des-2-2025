function login(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            if (this.responseText == document.getElementById("nomelog").value){
                window.location.href = "../pags/main.php";
            } else{
                console.log("Some daqui!")
            }
        }
    };
    url = "../functions.php?login&nome=" + document.getElementById("nomelog").value + "&senha=" + document.getElementById("senhalog").value;
    xhttp.open("POST", url, true);
    xhttp.send();
}

function cadastro(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText)
        }
    };
    url = "../functions.php?caduser&nome=" + document.getElementById("nomecad").value + "&senha=" + document.getElementById("senhacad").value;
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