<?php

include "_conexao.php";
$query = "SELECT titulo, descricao, id_atividade, imagem, comunidade, `local`, `data`, hora, token
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
                $atividade = $linha['id_atividade'];
                $imagem = $linha['imagem'];
                $comunidade = $linha['comunidade'];
                $data = date_create($linha['data']);
                $data = date_format($data, 'd/m/Y');
                $hora = date_create($linha['hora']);
                $hora = date_format($hora, 'H:i');
                $token = $linha['token'];

                echo "<div id='evento1'>
                        <a href='evento.php?k=$token' class='evento'>
                            <div id = 'imagem'>
                                <img src = 'imagens_eventos/$imagem'>
                            </div>
                            <div id = 'descricao'>
                                <h3>$titulo</h3>
                                <p>Descrição: $descricao</p>
                            </div>
                            <div id = 'dados'>
                                &nbsp; &nbsp; Comunidade: $comunidade &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                Data: $data&nbsp; &nbsp;
                                Hora: $hora
                            </div>
                        </a>
                    </div>";
            }
            ?>

        </section>
    </main>

    <footer></footer>

</body>

</html>