<?php
@session_unset();
@session_destroy();
@$_SESSION = array();
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="" type="text/css">
</head>

<body>
    <form id="f-login" method="post" action="login.php" enctype="multipart/form-data" autocomplete="off">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" maxlength="40" size="50" />

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" maxlength="40" size="50" />
    </form>
    <button type="submit" form="f-login">Entrar</button>
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
?>