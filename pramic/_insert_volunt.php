<?php
require_once "_conexao.php";
require_once "_funcoes.php";

if (
    !empty($_POST['id_evento'])
    && !empty($_POST['token'])
    && !empty($_POST['nome'])
    && !empty($_POST['cpf'])
    && !empty($_POST['idade'])
    && !empty($_POST['email'])
) {
    $id_evento = (int) $_POST['id_evento'];
    $token = $_POST['token'];
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $idade = (int) $_POST['idade'];
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);

    $select = "SELECT cpf, evento FROM rel_vol_evt WHERE cpf = '$cpf' AND evento = $id_evento";
    $result = mysqli_query($conexao, $select);

    if (mysqli_num_rows($result) != 0) {
        print_js("
            alert('O CPF inserido já está cadastrado para esse evento.');
            location.href = 'evento.php?k=$token';
            ");
        die;
    }

    $select2 = "SELECT cpf FROM voluntarios WHERE cpf = '$cpf'";
    $result = mysqli_query($conexao, $select2);
    if (!$result) {
        echo 'erro2';
        die;
    } else {
        if (mysqli_num_rows($result) == 0) {
            $query = "INSERT INTO voluntarios VALUES (?, ?, ?, ?, ?)";
            if ($stmt = $conexao->prepare($query)) {
                $stmt->bind_param(
                    'ssdss',
                    $cpf,
                    $nome,
                    $idade,
                    $telefone,
                    $email
                );
                $stmt->execute();
                $linhas = $stmt->affected_rows;
                $stmt->close();
            } else {
                $error = $conexao->errno . ' ' . $conexao->error;
                echo $error;
            }
        }
    }

    $query2 = "INSERT INTO rel_vol_evt VALUES (?, ?)";
    if ($stmt = $conexao->prepare($query2)) {
        $stmt->bind_param(
            'sd',
            $cpf,
            $id_evento
        );
        $stmt->execute();
        $linhas2 = $stmt->affected_rows;
        $stmt->close();
    } else {
        $error = $conexao->errno . ' ' . $conexao->error;
        echo $error;
    }

    if ($linhas2 == 1) {
        print_js("
        alert('Parabéns! Você agora é um voluntário para esse evento.');
        location.href = 'mural_eventos.php';
        ");
    }
}
print_js("
    alert('Não foi possível realizar o cadastro.\\nVerifique as informações inseridas.');
    location.href = 'evento.php?k=$token';
");

@mysqli_close($conexao);
die;
