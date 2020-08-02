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

function tratarEndereço(id) {
    let caracteresAceitos = "AaBbÇçCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuWwYyVvXxZzÁáÉéÍíÓóÚúÃãÕõÂâÊêÎîÔôÛûàÀ0123456789 ";
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
    if (auxId.length == 11) {
        return true;
    } else {
        return false;
    }
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

function verificarCPF(strCPF) {
    let Soma = 0;
    let Resto = 0;

    if (strCPF == "00000000000") {
        return false;
    }

    for (i = 1; i <= 9; i++) {
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;
    }

    if ((Resto == 10) || (Resto == 11)) {
        Resto = 0;
    }

    if (Resto != parseInt(strCPF.substring(9, 10))) {
        return false;
    }

    Soma = 0;
    for (i = 1; i <= 10; i++) {
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
    }

    if ((Resto == 10) || (Resto == 11)) {
        Resto = 0;
    }
    if (Resto != parseInt(strCPF.substring(10, 11))) {
        return false;
    }
    return true;
}

function inputCPF(id) {
    let caracteresAceitos = "0123456789";
    let auxId = document.getElementById(id).value, aux = "";
    aux = auxId.length;

    for (let i = 0; i < aux; i++) {
        if (caracteresAceitos.includes(auxId.charAt(i)) == false) {
            auxId = auxId.replace(auxId.charAt(i), "");
            i--;
        }
    }

    if (auxId.length != 11) {
        document.getElementById(id).style.backgroundColor = "rgba(255, 110, 110, 0.726)";
        document.getElementById(id).style.border = "red";
        document.getElementById(id).value = auxId;
        return false
    }

    if (verificarCPF(auxId)) {
        document.getElementById(id).style.backgroundColor = "white";
        document.getElementById(id).style.border = "black";
        auxId = auxId.substr(0, 3) + "." + auxId.substr(3, 3) + "." + auxId.substr(6, 3) + "-" + auxId.substr(9, 2);
        document.getElementById(id).value = auxId;
        return true
    } else {
        document.getElementById(id).style.backgroundColor = "rgba(255, 110, 110, 0.726)";
        document.getElementById(id).style.border = "red";
        auxId = auxId.substr(0, 3) + "." + auxId.substr(3, 3) + "." + auxId.substr(6, 3) + "-" + auxId.substr(9, 2);
        document.getElementById(id).value = auxId;
        return false
    }
}

function tratarIdade(id) {
    let caracteresAceitos = "0123456789";
    let auxId = document.getElementById(id).value, aux = "";
    aux = auxId.length;

    for (let i = 0; i < aux; i++) {
        if (caracteresAceitos.includes(auxId.charAt(i)) == false) {
            auxId = auxId.replace(auxId.charAt(i), "");
            i--;
        }
    }

    console.log(auxId);
    if (parseInt(auxId) < 18 || parseInt(auxId) > 99) {
        document.getElementById(id).style.backgroundColor = "rgba(255, 110, 110, 0.726)";
        document.getElementById(id).style.border = "red";
        document.getElementById(id).value = auxId;
        return false
    } else {
        document.getElementById(id).style.backgroundColor = "white";
        document.getElementById(id).style.border = "black";
        document.getElementById(id).value = auxId;
        return true
    }
}

function tratarData(id) {
    let today = new Date();
    let dd = today.getDate();
    let mm = today.getMonth() + 1;
    let aaaa = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = aaaa + '-' + mm + '-' + dd;
    document.getElementById(id).setAttribute("min", today);
    aaaa += 2;
    today = aaaa + '-' + mm + '-' + dd;
    document.getElementById(id).setAttribute("max", today);
}