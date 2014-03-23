function conta(maxChar,campotexto,campovalor) {
    
    campovalor.value = maxChar - campo.value.length
    if (event.keyCode < 65 || event.keyCode > 90) {
        //Nada a Fazer
    } else if (campo.value.length == maxChar) {
        alert('Limite de caracteres atingidos!');
    }

}

function filtrapalavrasproibidas(palavrasproibidas, texto) {


    var proibido = new Array();
    proibido = palavrasproibidas;
    

    for (i = 0; i < proibido.length; i++) {
        var expresao = "";
        for (j = 0; j < proibido[i].length; j++) {

            switch (proibido[i][j]) {
                case 'a':
                    expresao += "\\W*[áãàâäaª@@4]+";
                    break;
                case 'e':
                    expresao += "\\W*[éèêëe3]+";
                    break;
                case 'i':
                    expresao += "\\W*[íìîiï1!]+";
                    break;
                case 'o':
                    expresao += "\\W*[óõòôöo0]+";
                    break;
                case 'u':
                    expresao += "\\W*[úùûüu]+";
                    break;

                case 's':
                    expresao += "\\W*[s5]+";
                    break;
                default:
                    expresao += "\\W*" + proibido[i][j] + "+";
            }

        }

        var regularexprecao = new RegExp(expresao, "gi");
        var regularexprecaoparatestar = regularexprecao.exec(texto.value);

        if (regularexprecaoparatestar!=null && texto.value.indexOf(regularexprecaoparatestar) != -1) {
            alert("Você digitou uma palavra de teor ofensivo não permitida");
            texto.value = texto.value.replace(regularexprecaoparatestar, "");
        }
    }

}