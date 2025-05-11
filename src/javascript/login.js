function login(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            if (this.responseText == document.getElementById("nome").value){
                window.location.href = "../pags/main.php";
            } else{
                console.log("Some daqui!")
            }
        }
    };
    url = "../functions.php?login&nome=" + document.getElementById("nome").value + "&senha=" + document.getElementById("senha").value;
    xhttp.open("POST", url, true);
    xhttp.send();
}