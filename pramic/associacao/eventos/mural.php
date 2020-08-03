<?php

if (empty($_POST['id_assoc'])) {
    header("Location: ../login.php");
}

require_once "../../_conexao.php";
require_once "../../_funcoes.php";

$id_assoc = $_POST['id_assoc'];
$nome_assoc = $_POST['nome_assoc'];
$comunidade_assoc = $_POST['comunidade_assoc'];

$query = "SELECT e.id, e.token, e.titulo, e.descricao, e.id_atividade, e.imagem, e.comunidade, e.local, e.data, e.hora, a.atividade
        FROM eventos e
        JOIN atividades a ON a.id = e.id_atividade
        WHERE e.comunidade = '$comunidade_assoc'
        ORDER BY e.data ASC";

$result = mysqli_query($conexao, $query);

if (!$result) {
    echo 'erro';
    die;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/mural-eventos.css" type="text/css">
    <link rel="stylesheet" href="../../css/footer.css" type="text/css">
    <script>
        function acessaEvento(id) {
            if (id === 'incluir') {
                document.forms.namedItem('p-form').action = 'incluir_evento.php';
                document.forms.namedItem('p-form').submit();
            } else {
                document.querySelector("#id_evento").value = id;
                document.forms.namedItem('p-form').submit();
            }
        }
    </script>
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
            <h1>Eventos da sua Associação</h1>
            <button type="button" id="botao-incluir" onclick="acessaEvento('incluir');">Incluir Evento</button>
        </div>
        <form id='p-form' method='post' action='alterar_evento.php'>
            <input type='hidden' name='id_assoc' value='<?= $id_assoc ?>'>
            <input type='hidden' name='nome_assoc' value='<?= $nome_assoc ?> '>
            <input type='hidden' name='comunidade_assoc' value='<?= $comunidade_assoc ?>'>
            <input type='hidden' name='id_evento' id='id_evento'>
        </form>
        </form>
        <section id="mural-eventos">
            <?php
            while ($linha = mysqli_fetch_assoc($result)) {
                $id = $linha['id'];
                $token = $linha['token'];
                $titulo = $linha['titulo'];
                $descricao = $linha['descricao'];
                $atividade = $linha['atividade'];
                $imagem = $linha['imagem'];
                $comunidade = $linha['comunidade'];
                $data = date_create($linha['data']);
                $data = date_format($data, 'd/m/Y');
                $hora = date_create($linha['hora']);
                $hora = date_format($hora, 'H:i');

                echo "<div id='evento1'>
                        <div onclick='acessaEvento($id)' class='evento'>
                            <div id = 'imagem'>
                                <img src = '../../imagens_eventos/$imagem'>
                            </div>
                            <div id = 'descricao'>
                                <h3>$titulo</h3>
                                <p>Descrição:<br>$descricao
                                <br><br>Atividade:<br>$atividade</p>
                            </div>
                            <div id='dados'>
                            &nbsp;
                            Data: $data&nbsp; &nbsp;
                            Hora: $hora
                            </div>
                        </div>
                    </div>";
            }
            ?>

        </section>
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