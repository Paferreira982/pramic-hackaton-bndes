<?php
$conexao = mysqli_connect("us-cdbr-east-02.cleardb.com", "b7ca04fd7fa49c", "8c96900d", "heroku_873d96e06d89292");

if (!$conexao) {
    echo "Error: Não possível conectar ao banco de dados." . PHP_EOL;
    //echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    //echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

/* $query = "SELECT nome FROM associacoes";
$resultado = mysqli_query($conexao, $query);

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo $linha['nome'] . "\n";
    }
} else {
    echo "0 results";
} */