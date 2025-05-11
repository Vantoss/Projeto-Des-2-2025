function getBanco(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            objJSON = JSON.parse(this.responseText);
            usuarios = objJSON.usuarios;
            
            console.log(usuarios);

            document.getElementById("user").innerHTML = usuarios[0].nome;
            document.getElementById("pass").innerHTML = usuarios[0].senha;
        }
    };

    xhttp.open("GET", "../functions.php?get", true);
    xhttp.send();
}

function postBanco(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText)
        }
    };
    url = "../functions.php?post&nome=" + document.getElementById("userNome").value + "&senha=" + document.getElementById("userPass").value;
    xhttp.open("GET", url, true);
    xhttp.send()
}

function putBanco(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText)
        }
    };
    url = "../functions.php?put&nome=" + document.getElementById("userNome").value + "&senha=" + document.getElementById("userPass").value + "&id=" + document.getElementById("userId").value;
    xhttp.open("GET", url, true);
    xhttp.send()
}

function delBanco(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText)
        }
    };
    url = "../functions.php?del&id=" + document.getElementById("userId").value;
    xhttp.open("GET", url, true);
    xhttp.send()
}