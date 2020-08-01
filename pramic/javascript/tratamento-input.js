function tratarNome(id) {
    let caracteresAceitos = "AaBbÇçCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuWwYyVvXxZzÁáÉéÍíÓóÚúÃãÕõÂâÊêÎîÔôÛûàÀ ";
    let auxId = document.getElementById(id).value, aux = "";
    aux = auxId.length;
    for (let i = 0; i < aux; i++) {
        if (caracteresAceitos.includes(auxId.charAt(i)) == false) {
            auxId = auxId.replace(auxId.charAt(i), "");
            i--;
        }
    }

    while (auxId.includes("  ")) {
        auxId = auxId.replace("  ", " ");
    }

    document.getElementById(id).value = auxId.trim();
}

function tratarTelefone(id) {
    let caracteresAceitos = "0123456789";
    let auxId = document.getElementById(id).value, aux = "";
    aux = auxId.length;

    for (let i = 0; i < aux; i++) {
        if (caracteresAceitos.includes(auxId.charAt(i)) == false) {
            auxId = auxId.replace(auxId.charAt(i), "");
            i--;
        }
    }

    document.getElementById(id).value = auxId.trim();
}

function verificarEmail(id) {
    let email = document.getElementById(id).value;
    let caracteresValidos = "@._-ABCDEFGHIJKLMNOPQRSTUVWYXZabcdefghijklmnopqrstuvwyxz0123456789"
    let contadorArroba = 0;
    email.trim();

    for (let i = 0; i < email.length; i++) {
        if (email.charAt(i) == "@") {
            contadorArroba++;
        }
    }

    if (contadorArroba != 1) {
        document.getElementById(id).style.backgroundColor = "rgba(255, 110, 110, 0.726)";
        document.getElementById(id).style.border = "red";
        contadorArroba = 0;
        return false;
    }

    if (email.charAt(email.length - 1) == "." || email.charAt(email.length - 1) == "-" || email.charAt(email.length - 1) == "_") {
        document.getElementById(id).style.backgroundColor = "rgba(255, 110, 110, 0.726)";
        document.getElementById(id).style.border = "red";
        contadorArroba = 0;
        return false;
    }

    for (let i = 0; i < 10; i++) {
        if (parseInt(email.charAt(0)) == i || email.charAt(0) == ".") {
            document.getElementById(id).style.backgroundColor = "rgba(255, 110, 110, 0.726)";
        document.getElementById(id).style.border = "red";
            contadorArroba = 0;
            return false;
        }
    }

    for (let i = 0; i < caracteresValidos.length; i++) {
        if (caracteresValidos.indexOf(email.charAt(i)) == -1) {
            document.getElementById(id).style.backgroundColor = "rgba(255, 110, 110, 0.726)";
        document.getElementById(id).style.border = "red";
            contadorArroba = 0;
            i = 1000;
            return false;
        }
    }

    for (let i = 0; i < email.length; i++) {
        if (email.charAt(i) == "." && email.charAt(i + 1) == ".") {
            document.getElementById(id).style.backgroundColor = "rgba(255, 110, 110, 0.726)";
        document.getElementById(id).style.border = "red";
            contadorArroba = 0;
            return false;
        }
    }

    let localizacaoArroba = email.indexOf("@");
    let corte = email.substr(localizacaoArroba, email.length);

    if (corte.length < 9 || (corte.includes(".com") == false)) {
        document.getElementById(id).style.backgroundColor = "rgba(255, 110, 110, 0.726)";
        document.getElementById(id).style.border = "red";
        contadorArroba = 0;
        return false;
    } else {
        document.getElementById(id).style.backgroundColor = "white";
        document.getElementById(id).style.border = "black";
        contadorArroba = 0;
        return true;
    }
}