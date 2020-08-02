<?php
/* @session_unset();
@session_destroy();
@$_SESSION = [];
@session_start(); */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css" type="text/css">
    <link rel="stylesheet" href="../css/footer.css" type="text/css">
</head>

<body>

    <header>
        <img src="../imagens/pramic-logo.png" alt="logo" id="logo">
        <nav>
            <a href="../home.html" class="text-nav">PÁGINA INICIAL &nbsp;&nbsp;|</a>
            <a href="../mural_eventos.html" class="text-nav">MURAL DE EVENTOS &nbsp;&nbsp;|</a>
            <a href="../cadastro_associacao.html" class="text-nav">SEJA UM ASSOCIADO</a>
        </nav>
    </header>

    <main>
        <div class="header">
            <h2>Painel de Login</h2>
        </div>

        <div id="formulario-login">
            <form id="f-login" method="post" action="login.php" enctype="multipart/form-data" autocomplete="off">
                <label for="email" id="label-email" class="text-cadastro">Email</label>
                <input type="text" id="email" name="email" class="text-cadastro" maxlength="40" size="28" /> <br><br>

                <label for="senha" id="label-senha" class="text-cadastro">Senha</label>
                <input type="password" id="senha" name="senha" class="text-cadastro" maxlength="50" size="28" />
            </form>
            <button type="submit" form="f-login" id="botao-login">Entrar</button>
        </div>
    </main>

    <footer>
        <div id="rodape">
            <div class="social">
                <img src="../imagens/facebook-black-icon.png"><br>
                <span>/PramicRJ</span>
            </div>
            <div class="social">
                <img src="../imagens/twitter-black-icon.png"><br>
                <span>@Pramic</span>
            </div>
            <div class="social">
                <img src="../imagens/whatsapp-black-icon.png"><br>
                <span>xxxxx-xxxx</span>
            </div>
        </div>
    </footer>
</body>

</html>

<?php
require_once "../_conexao.php";

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "SELECT id, nome, comunidade, email, senha FROM associacoes
            WHERE email = ? AND senha = MD5(?)";

    $stmt = $conexao->prepare($query);
    $stmt->bind_param('ss', $email, $senha);
    $stmt->execute();
    $stmt->bind_result($q_id, $q_nome, $q_comunidade, $q_email, $q_senha);
    $stmt->store_result();
    $linhas = $stmt->num_rows;
    $stmt->fetch();

    if ($linhas == 0) {
        mysqli_close($conexao);
        echo ("<script> location.href='login_error.html' </script>");
    } else {
        $_SESSION['id_assoc'] = (int) $q_id;
        $_SESSION['nome_assoc'] = $q_nome;
        $_SESSION['comunidade_assoc'] = $q_comunidade;
        $_SESSION['email_assoc'] = $q_email;

        @mysqli_close($conexao);
        echo ("<script> location.href='eventos/mural.php'; </script>");
    }
}
@mysqli_close($conexao);
?>