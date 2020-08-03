<?php
require_once "../../_conexao.php";
require_once "../../_funcoes.php";

$id_evento = (int) $_POST['id_evento'];
$id_assoc = $_POST['id_assoc'];
$nome_assoc = $_POST['nome_assoc'];
$comunidade_assoc = $_POST['comunidade_assoc'];

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$id_atividade = (int) $_POST['atividade'];
$local = $_POST['local'];
$data = $_POST['data'];
$hora1 = (string) $_POST['hora'];
$minutos1 = (string) $_POST['minutos'];

function formata_hora($hora, $minutos)
{
    if (strlen($hora) == 1) $hora = "0" . $hora;
    if (strlen($minutos) == 1) $minutos = "0" . $minutos;
    return $hora . ':' . $minutos . ':00';
}
$hora = formata_hora($hora1, $minutos1);

$file_name = $_FILES['imagem']['name'];
$file_tmp_name = $_FILES['imagem']['tmp_name'];
$ok = true;
$fez_download = false;

echo $file_name;
echo $file_tmp_name;

$caminho = '';
if ((!empty($file_tmp_name)) && (is_file($file_tmp_name)) && ($ok)) {
    $caminho = "../../imagens_eventos/";
    $caminho = $caminho . $file_name;
    if (move_uploaded_file($file_tmp_name, $caminho))
        $fez_download = true;
} else {
    $ok = false;
}

$query = "UPDATE eventos SET titulo = '$titulo', descricao = '$descricao',
            id_atividade = $id_atividade, `local` = '$local', `data` = '$data', hora = '$hora', ";

if (($ok) && ($fez_download)) {
    $query .= "imagem = '$file_name'";
}
$query .= " WHERE id = $id_evento";

if (mysqli_query($conexao, $query)) {
    print_js("alert('Evento alterado com sucesso.')");
    echo "<form id='p-form' method='post' action='mural.php'>
            <input type='hidden' name='id_assoc' value='$id_assoc'>
            <input type='hidden' name='nome_assoc' value='$nome_assoc'>
            <input type='hidden' name='comunidade_assoc' value='$comunidade_assoc'>
        </form>";
    print_js("document.forms.namedItem('p-form').submit()");
} else {
    print_js("
        alert('Ocorreu um erro ao efetuar a alteração no banco de dados.');
        //history.go(-1);
    ");
    //echo "Error: " . $query . "<br>" . mysqli_error($conexao);
}
