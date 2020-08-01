<?php
$conexao = mysqli_connect("127.0.0.1", "root", "", "pramic");

if (!$conexao) {
    echo "Error: Não possível conectar ao banco de dados." . PHP_EOL;
    //echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    //echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    echo 'Sucesso na conexão.';
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

/* mysqli_close($conexao); */
