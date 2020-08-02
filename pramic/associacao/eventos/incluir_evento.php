<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="" type="text/css" />
</head>

<body>
    <form method="post" enctype="multipart/form-data" autocomplete="off" action="_insert_evento.php">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" maxlength="100" size="150" /><br>

        <label for="descricao">Descrição</label>
        <textarea type="text" id="descricao" name="descricao" maxlength="800" rows="18"></textarea><br>

        <input type="checkbox" id="limpeza" name="limpeza" />
        <label for="limpeza">Limpeza</label> <br>

        <input type="checkbox" id="encanamento" name="encanamento" />
        <label for="encanamento">Reparos de encanamento</label> <br>

        <input type="checkbox" id="dengue" name="dengue" />
        <label for="dengue">Combate a Dengue e Chicungunha</label> <br>

        <input type="checkbox" id="valao" name="valao" />
        <label for="valao">Segurança e sinalização em torno de valões</label> <br>

        <label>Imagem</label>
        <input type="file" id="imagem" name="imagem" /><br>

        <label>Local</label>
        <input type="text" id="local" name="local" maxlength="150" size="150" /><br>

        <label>Data</label>
        <input type="date" id="data" name="data" value="" min="" max="" /><br>

        <label>Hora</label>
        <input type="number" id="hora" name="hora" min="00" max="24" /> :
        <input type="number" id="minutos" name="minutos" min="00" max="60" /><br>
    </form>
</body>

</html>