<?php
include "../_verif_sessao.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../css/incluir.css" type="text/css" />
    <link rel="stylesheet" href="../../css/footer.css" type="text/css">
    <script src="../../javascript/tratamento-input.js"></script>
</head>

<body>
    <header>
        <img src="../../imagens/pramic-logo.png" alt="logo" id="logo">
        <nav>
            <a href="../../home.php" class="text-nav">PÁGINA INICIAL &nbsp;&nbsp;|</a>
            <a href="../../mural_eventos.php" class="text-nav">MURAL DE EVENTOS &nbsp;&nbsp;|</a>
            <a href="mural.php" class="text-nav">PÁGINA DO ASSOCIADO</a>

        </nav>
    </header>

    <main>
        <div class="header">
            <h1>Crie um Evento</h1>
        </div>

        <div id="formulario-corpo">
            <form method="post" enctype="multipart/form-data" autocomplete="off" action="_insert_evento.php">
                <label for="titulo" class="text-label">Título do Evento:</label> <br>
                <input type="text" id="titulo" name="titulo" maxlength="80" size="50" class="text-cadastro" required="required" /> <br>

                <label for="descricao" class="text-label">Descrição</label> <br>
                <textarea type="text" id="descricao" name="descricao" maxlength="370" rows="5" cols="52" class="text-cadastro" required="required"></textarea>
                <br>

                <label for="select-atividades" class="text-label">Atividades:</label>
                <select name="atividade" id="select-atividades" class="text-cadastro" required="required">
                    <option value="">Selecione uma Atividade</option>
                    <option value="1">Limpeza</option>
                    <option value="2">Reparos de encanamento</option>
                    <option value="3">Combate a Dengue e Chicungunha</option>
                    <option value="4">Segurança e sinalização em torno de valões</option>
                </select> <br> <br>

                <label for="imagem" class="text-label">Imagem:</label>
                <input type="file" id="imagem" name="imagem" class="text-cadastro" accept="image/*" required="required" /> <br> <br>

                <label for="local" class="text-label">Endereço:</label> <br>
                <input type="text" id="local" name="local" maxlength="100" size="50" class="text-cadastro" onblur="tratarEndereço('local')" required="required" /> <br> <br>

                <label for="data" class="text-label">Data:</label>
                <input type="date" id="data" name="data" onclick="tratarData('data')" required="required" /> <br> <br>

                <label for="hora" class="text-label">Hora:</label>
                <input type="number" id="hora" name="hora" min="00" max="24" required="required" /> :
                <input type="number" id="minutos" name="minutos" min="00" max="60" required="required" /><br> <br>
                <button type="submit" id="botao-enviar">Enviar</button>
            </form>
        </div>
    </main>

    <footer>
        <div id="rodape">
            <div class="social">
                <img src="../../imagens/facebook-black-icon.png"><br>
                <span>/PramicRJ</span>
            </div>
            <div class="social">
                <img src="../../imagens/twitter-black-icon.png"><br>
                <span>@Pramic</span>
            </div>
            <div class="social">
                <img src="../../imagens/whatsapp-black-icon.png"><br>
                <span>xxxxx-xxxx</span>
            </div>
        </div>
    </footer>

</body>

</html>