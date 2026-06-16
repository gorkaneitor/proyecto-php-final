function mezuaBidali(){
    if(document.getElementById('izena').value == "" || document.getElementById('email').value ==  "" || document.getElementById('mezua').value == ""){
        alert("Eremu guztiak bete behar dira");
    }else{
        //datuak web-zerbitzarira bidaltzeko XMLHttpRequest motako objetu bat sortu
        let httpRequest = new XMLHttpRequest();
        
        //datuak web-zerbitzarira bidaltzeko eskaria konfiguratu

        httpRequest.open("POST","index.php",true);
        httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");

        //web-zerbitzaritik jasotako erantzuna nola porzesatuko den definitu

        httpRequest.onreadystatechange = function(){
            if(httpRequest.readyState == 4){
                if(httpRequest.status == 200){
                    document.getElementById('komentarioa').innerHTML = this.responseText;
                }else{
                    alert("falloa komunikazioan: " + this.statusText)
                }
            }
        }
        httpRequest.send( 
        "izena="+ document.getElementById('izena').value +
        "&email="+ document.getElementById('email').value + 
        "&mezua=" + document.getElementById('mezua').value);
    }
}