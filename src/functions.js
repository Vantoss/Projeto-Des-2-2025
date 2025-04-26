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