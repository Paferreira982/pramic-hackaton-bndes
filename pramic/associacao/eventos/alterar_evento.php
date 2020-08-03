<?php
require_once "../../_conexao.php";
require_once "../../_funcoes.php";

$id_evento = (int) $_POST['id_evento'];
$id_assoc = $_POST['id_assoc'];
$nome_assoc = $_POST['nome_assoc'];
$comunidade_assoc = $_POST['comunidade_assoc'];

$query = "SELECT * FROM eventos WHERE id = $id_evento";
$result = mysqli_query($conexao, $query);

if (!$result) {
    echo 'erro';
    die;
} else {
    $linha = mysqli_fetch_assoc($result);
    $token = $linha['token'];
    $titulo = $linha['titulo'];
    $descricao = $linha['descricao'];
    $id_atividade = $linha['id_atividade'];
    $local = $linha['local'];
    $data = $linha['data'];

    $hora = (string) $linha['hora'];
    $hora1 = $hora[0] . $hora[1];
    $minutos1 = $hora[3] . $hora[4];
}

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
            <h1>Alterar Evento</h1>
            <h2>Compartilhe o link do evento: <span style="color:#840a0a"><?= $_SERVER['SERVER_NAME'] . "/evento.php?k=" . $token ?></span></h2>
        </div>

        <div id="formulario-corpo">
            <form method="post" enctype="multipart/form-data" autocomplete="off" action="_update.php">
                <input type="hidden" name="id_evento" value="<?= $id_evento ?>" />
                <input type='hidden' name='id_assoc' value='<?= $id_assoc ?>'>
                <input type='hidden' name='nome_assoc' value='<?= $nome_assoc ?> '>
                <input type='hidden' name='comunidade_assoc' value='<?= $comunidade_assoc ?>'>

                <label for="titulo" class="text-label">Título do Evento:</label> <br>
                <input type="text" id="titulo" name="titulo" maxlength="80" size="50" class="text-cadastro" required="required" value='<?= $titulo ?>' /> <br>

                <label for="descricao" class="text-label">Descrição</label> <br>
                <textarea type="text" id="descricao" name="descricao" maxlength="370" rows="5" cols="52" class="text-cadastro" required="required"><?= $descricao ?></textarea>
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
                <input type="file" id="imagem" name="imagem" class="text-cadastro" accept="image/*" /> <br> <br>

                <label for="local" class="text-label">Endereço:</label> <br>
                <input type="text" id="local" name="local" maxlength="100" size="50" class="text-cadastro" onblur="tratarEndereço('local')" required="required" value='<?= $local ?>' /> <br> <br>

                <label for="data" class="text-label">Data:</label>
                <input type="date" id="data" name="data" onclick="tratarData('data')" required="required" value='<?= $data ?>' /> <br> <br>

                <label for="hora" class="text-label">Hora:</label>
                <input type="number" id="hora" name="hora" min="00" max="24" required="required" value='<?= $hora1 ?>' /> :
                <input type="number" id="minutos" name="minutos" min="00" max="60" required="required" value='<?= $minutos1 ?>' /><br> <br>
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
    <script>
        document.getElementById('select-atividades').selectedIndex = '<?= $id_atividade ?>';
    </script>
</body>

</html>