<?php
require_once "../../_conexao.php";
require_once "../../_funcoes.php";

$comunidade = $_POST['comunidade_assoc'];
$id_assoc = $_POST['id_assoc'];
$nome_assoc = $_POST['nome_assoc'];

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


function gera_token($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$token = gera_token();

$file_name = $_FILES['imagem']['name'];
$file_tmp_name = $_FILES['imagem']['tmp_name'];
$ok = true;
$fez_download = false;

$caminho = '';
if ((!empty($file_tmp_name)) && (is_file($file_tmp_name)) && ($ok)) {
    $caminho = "../../imagens_eventos/";
    $caminho = $caminho . $file_name;
    if (@move_uploaded_file($file_tmp_name, $caminho))
        $fez_download = true;
} else {
    $ok = false;
}

if (($ok) && ($fez_download)) {
    $query = "INSERT INTO eventos VALUES(NULL, '$titulo','$descricao', $id_atividade,
                                        '$file_name', '$comunidade', '$local', '$data', '$hora', '$token' ) ";

    if (mysqli_query($conexao, $query)) {
        print_js("alert('Evento criado com sucesso.')");
        echo "<form id='p-form' method='post' action='mural.php'>
                <input type='hidden' name='id_assoc' value='$id_assoc'>
                <input type='hidden' name='nome_assoc' value='$nome_assoc'>
                <input type='hidden' name='comunidade_assoc' value='$comunidade'>
            </form>";
        print_js("document.forms.namedItem('p-form').submit()");
    } else {
        //echo "Error: " . $query . "<br>" . mysqli_error($conexao);
    }
} else {
    print_js("
            alert('Ocorreu um erro ao efetuar o download do arquivo. Inclusão não realizada.');
            history.go(-1);
            ");
}
