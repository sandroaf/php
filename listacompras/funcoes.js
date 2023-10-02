console.log("funcoes carregadas");

function salvarmsg(msg) {
    window.sessionStorage.setItem('msg',msg);
    console.log(sessionStorage.msg);
    return true;
}

function retornamsg() {
    return (window.sessionStorage.msg?window.sessionStorage.msg:false);
}

function mostramsg() {
    console.log("msg salva: "+retornamsg());
    if (retornamsg()) {
        document.querySelector("#msg").innerHTML = retornamsg();
        var timemsg = setTimeout(apagamsg,5000);
    }
}

function apagamsg() {
    document.querySelector("#msg").innerHTML = ""
    window.sessionStorage.removeItem('msg');
}