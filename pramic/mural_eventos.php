<?php

include "_conexao.php";
$query = "SELECT titulo, descricao, atividade, imagem, comunidade, `local`, `data`, hora, token
        FROM eventos ORDER BY `data` ASC";
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
    <link rel="stylesheet" href="css/mural-eventos.css" type="text/css">
</head>

<body>

    <header>
        <img src="imagens/pramic-logo.png" alt="logo" id="logo">
        <nav>
            <a href="home.html" class="text-nav">PÁGINA INICIAL &nbsp;&nbsp;|</a>
            <a href="mural_eventos.html" class="text-nav">MURAL DE EVENTOS &nbsp;&nbsp;|</a>
            <a href="cadastro_associacao.html" class="text-nav">SEJA UM ASSOCIADO</a>

        </nav>
    </header>

    <main>
        <div class="header">
            <h2>EVENTOS</h2>
        </div>
        <section id="mural-eventos">
            <?php
            while ($linha = mysqli_fetch_assoc($result)) {
                $titulo = $linha['titulo'];
                $descricao = $linha['descricao'];
                $atividade = $linha['atividade'];
                $imagem = $linha['imagem'];
                $comunidade = $linha['comunidade'];
                $data = $linha['data'];
                $hora = $linha['hora'];
                $token = $linha['token'];

                echo "<a href='evento.php?k=$token' class='evento'>
                        <div>
                            <img src='imagens_eventos/$imagem' alt='foto-evento' class='imagem-evento'>
                        </div>
                        <h3 class='titulo-evento'>$titulo</h3>
                        <p class='descricao-evento'>$descricao</p>
                    </a>";
            }
            ?>

        </section>
    </main>

    <footer></footer>

</body>

</html>