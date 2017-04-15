function sair(){
    navigator.app.exitApp();
}

function navegador(url){
    cordova.InAppBrowser.open(url, '_blank', 'location=yes');
}

function tela(url){
    window.location='index.html#/' + url;
    if (url == 'rmrh') vagasRM();
    if (url == 'atibaia') { vagasAtibaia(); }
    if (url == 'pat') { vagasPat(); }
    if (url == 'cursosPat') { cursosPat(); }
    //if (url == 'cursosEtec') { cursosEtec(); }
}

function vagasRM(){
    var xmlhttp = new XMLHttpRequest();
    var url = "https://etecarmine.com.br/AppWinner/vagas-atibaia/json-rmrh.php";
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                ConectaServidor(xmlhttp.responseText);
            }}
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    function ConectaServidor(response) {
        var dados = JSON.parse(response); //faz a conversão do texto da WEB para JSON
        var i;
        var conteudo = "";
        for(i = 0; i < dados.length; i++) //dados.length retorna o tamanho do vetor.
        {             
            conteudo += ''+
                '<ion-list>'+
                    '<ion-item class="item-divider item">'+ dados[i].VAGA + '</ion-item>' + 
                '</ion-list>' +                
                '<ion-item class="item-icon-left positive item">' +
                '<i class="icon ion-information-circled"></i> ' + dados[i].SALARIO + ' / ' + dados[i].LOCAL + 
                '<p><a href="javascript:void(0)" onclick="navegador(' + "'" + dados[i].URL + "'" + ')"><button ion-button>Detalhes da vaga</button></a></p>' +
                '</ion-item>' + 
                '<div class="spacer" style="width: 300px; height: 20px;"></div> ';
        }
        document.getElementById("listaVagas").innerHTML =  conteudo;           
        document.getElementById("loadRM").style.visibility = "hidden";
        document.getElementById("loadRM").innerHTML = "";
    }
}

function vagasAtibaia(){
     var xmlhttp = new XMLHttpRequest();
    var url = "https://etecarmine.com.br/AppWinner/vagas-atibaia/json-atibaia.php";
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                ConectaServidor(xmlhttp.responseText);
            }}
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    function ConectaServidor(response) {
        var dados = JSON.parse(response); 
        var i;
        var conteudo = "";
        for(i = 0; i < dados.length; i++) { 
            conteudo += ''+
                '<ion-list>'+
                    '<ion-item class="item-divider item">'+ dados[i].VAGA + '</ion-item>' + 
                '</ion-list>' +                
                '<ion-item class="item-icon-left positive item">' +
                '<i class="icon ion-information-circled"></i> ' + dados[i].EMPRESA + 
                '<p><a href="javascript:void(0)" onclick="navegador(' + "'" + dados[i].URL + "'" + ')"><button ion-button>Detalhes da vaga</button></a></p>' +
                '</ion-item>' + 
                '<div class="spacer" style="width: 300px; height: 20px;"></div> ';}
        document.getElementById("listaVagasAtibaia").innerHTML =  conteudo;
        document.getElementById("loadAtibaia").style.visibility = "hidden";
        document.getElementById("loadAtibaia").innerHTML = "";
    }
}

function vagasPat(){
    var xmlhttp = new XMLHttpRequest();
    var url = "https://etecarmine.com.br/AppWinner/vagas-atibaia/json-pat.php";
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                ConectaServidor(xmlhttp.responseText);
            }}
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    function ConectaServidor(response) {
        var dados = JSON.parse(response); 
        var i;
        var conteudo = "";
        for(i = 0; i < dados.length; i++) { 
            conteudo += ''+
                '<ion-list>'+
                    '<ion-item class="item-divider item">'+ dados[i].VAGA + '</ion-item>' + 
                '</ion-list>' +                
                '<ion-item class="item-icon-left positive item">' +
                '<i class="icon ion-information-circled"></i> ' + dados[i].QTD + ' vaga(s) / ' + dados[i].CIDADE +
                '<p><a href="javascript:void(0)" onclick="navegador(' + "'" + dados[i].URL + "'" + ')"><button ion-button>Detalhes da vaga</button></a></p>' +
                '</ion-item>' + 
                '<div class="spacer" style="width: 300px; height: 20px;"></div> ';}
        document.getElementById("listaVagasPAT").innerHTML =  conteudo;
        document.getElementById("loadPAT").style.visibility = "hidden";
        document.getElementById("loadPAT").innerHTML = "";
    }
}

function cursosPat(){
    var xmlhttp = new XMLHttpRequest();
    var url = "http://etecarmine.com.br/AppWinner/vagas-atibaia/json-pat-cursos.php";
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                ConectaServidor(xmlhttp.responseText);
            }}
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    function ConectaServidor(response) {
        var dados = JSON.parse(response); 
        var i;
        var conteudo = "";
        for(i = 0; i < dados.length; i++) { 
            conteudo += ''+
                '<ion-list>'+
                    '<ion-item class="item-divider item">'+ dados[i].CURSO + '</ion-item>' + 
                '</ion-list>' +                
                '<ion-item class="item-icon-left positive item">' +
                '<i class="icon ion-information-circled"></i> Local: ' + dados[i].LOCAL + 
                '<br/>'+
                dados[i].PERIODO + 
                '<br/>'+
                dados[i].MATRICULA + 
                '<p><a href="javascript:void(0)" onclick="navegador(' + "'" + dados[i].URL + "'" + ')"><button ion-button>Detalhes do curso</button></a></p>' +
                '</ion-item>' + 
                '<div class="spacer" style="width: 300px; height: 20px;"></div> ';}
        document.getElementById("listaCursosPAT").innerHTML =  conteudo;
        document.getElementById("loadPATc").style.visibility = "hidden";
        document.getElementById("loadPATc").innerHTML = "";
    }
}