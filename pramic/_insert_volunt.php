<?php
require_once "_conexao.php";
require_once "_funcoes.php";

if (
    !empty($_POST['nome'])
    && !empty($_POST['id-comunidade'])
    && !empty($_POST['telefone1'])
    && !empty($_POST['email'])
    && !empty($_POST['senha'])
) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $id_comunidade = (int) $_POST['id-comunidade'];
    $telefone1 = mysqli_real_escape_string($conexao, $_POST['telefone1']);
    $telefone2 = empty($_POST['telefone2']) ? NULL : mysqli_real_escape_string($conexao, $_POST['telefone2']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query_comunidade = "SELECT nome FROM comunidades WHERE id = $id_comunidade";
    $result = mysqli_query($conexao, $query_comunidade);

    if (mysqli_num_rows($result) == 1) {
        $linha = mysqli_fetch_assoc($result);
        $comunidade = $linha['nome'];
    }

    if ($comunidade) {
        $query = "INSERT INTO associacoes VALUES (NULL, ?, ?, ?, ?, ?, MD5(?) )";
        if ($stmt = $conexao->prepare($query)) {
            $stmt->bind_param(
                'ssssss',
                $nome,
                $comunidade,
                $telefone1,
                $telefone2,
                $email,
                $senha
            );
            $stmt->execute();
            $linhas = $stmt->affected_rows;
            $stmt->close();
        } else {
            $error = $conexao->errno . ' ' . $conexao->error;
            echo $error;
        }
    }

    if ($linhas == 1) {
        print_js("
        alert('Cadastro realizado com sucesso');
        location.href = 'associacao/login.php';
        ");
    }
}
print_js("
    alert('Não foi possível realizar o cadastro.\\nVerifique as informações inseridas.');
    location.href = 'cadastro_associacao.php';
");

@mysqli_close($conexao);
die;
