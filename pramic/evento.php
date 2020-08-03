<?php
include "_conexao.php";

@$token = $_GET['k'];
if ($token) {
    $query = "SELECT e.id, e.titulo, e.descricao, e.id_atividade, e.imagem, e.comunidade, e.local, e.data, e.hora, a.atividade
                FROM eventos e
                JOIN atividades a ON a.id = e.id_atividade
                WHERE token = '$token'";
    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) == 1) {
        $linha = mysqli_fetch_assoc($result);
        $id = $linha['id'];
        $titulo = $linha['titulo'];
        $descricao = $linha['descricao'];
        $atividade = $linha['atividade'];
        $imagem = $linha['imagem'];
        $comunidade = $linha['comunidade'];
        $local = $linha['local'];
        $data = date_create($linha['data']);
        $data = date_format($data, 'd/m/Y');
        $hora = date_create($linha['hora']);
        $hora = date_format($hora, 'H:i');
    } else {
        echo 'nenhum registro';
    }
} else {
    header("Location: mural_eventos.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/evento.css" type="text/css">
    <script src="javascript/tratamento-input.js"></script>
</head>

<body>
    <header>
        <img src="imagens/pramic-logo.png" alt="logo" id="logo" />
        <nav>
            <a href="home.php" class="text-nav">PÁGINA INICIAL &nbsp;&nbsp;|</a>
            <a href="mural_eventos.php" class="text-nav">MURAL DE EVENTOS &nbsp;&nbsp;|</a>
            <a href="cadastro_associacao.php" class="text-nav">SEJA UM ASSOCIADO</a>
        </nav>
    </header>

    <main>
        <section class="header">
            <h3><?php echo $titulo; ?></h3>
        </section>

        <img src="imagens_eventos/<?php echo $imagem; ?>" alt="foto-evento" class="imagem-evento">

        <section class="container-descricao">
            <p class="descricao-evento2">Atividade:<br><?php echo $atividade; ?></p>
            <p class="descricao-evento2">Descrição:<br><?php echo $descricao; ?></p>
        </section>

        <section class="container-data-local">
            <span class="data-local-evento">Comunidade: <?php echo $comunidade; ?></span>
            <span class="data-local-evento">Endereço: <?php echo $local; ?></span>
            <span class="data-local-evento">Data: <?php echo $data; ?></span>
            <span class="data-local-evento">Hora: <?php echo $hora; ?></span>
        </section>

        <section class="container-formulario">
            <form method="post" action="_insert_volunt.php" enctype="multipart/form-data" autocomplete="off">
                <input type="hidden" name="id_evento" value="<?php echo $id; ?>" />
                <input type="hidden" name="token" value="<?php echo $token; ?>" />

                <label for="nome-vexterno" class="text-label" id="label-nome">Nome Completo:</label>
                <input type="text" name="nome" id="nome-vexterno" class="input-evento">

                <label for="cpf1" class="text-label">CPF:</label>
                <input type="text" name="cpf" id="cpf1" class="input-evento" onblur="inputCPF('cpf1')">

                <label for="idade" class="text-label">Idade:</label>
                <input type="text" name="idade" id="idade" class="input-evento" maxlength="2" onblur="tratarIdade('idade')">

                <label for="tel1" class="text-label">Telefone (Opcional):</label>
                <input type="tel" name="telefone" id="tel1" class="input-evento" onblur="tratarTelefone('tel1')" maxlength="11">

                <label for="email2" class="text-label">Email:</label>
                <input type="email" name="email" id="email2" class="input-evento" onblur="verificarEmail('email2')">

                <button type="submit" id="botao-cadastro">Voluntariar-se</button>
            </form>
        </section>
    </main>

    <footer></footer>
</body>

</html>