function tratarNome(id) {
    let caracteresAceitos = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuWwYyVvXxZzÁáÉéÍíÓóÚúÃãÕõÂâÊêÎîÔôÛûàÀ ";
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