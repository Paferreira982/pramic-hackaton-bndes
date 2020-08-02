<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cadastro_associado.css" type="text/css">
    <script src="javascript/tratamento-input.js"></script>
</head>

<body>

    <header>
        <img src="imagens/pramic-logo.png" alt="logo" id="logo">
        <nav>
            <a href="home.html" class="text-nav">PÁGINA INICIAL &nbsp;&nbsp;|</a>
            <a href="mural_eventos.html" class="text-nav">MURAL DE EVENTOS &nbsp;&nbsp;|</a>
            <a href="cadastro_associacao.html" class="text-nav">SEJA UM ASSOCIADO</a>
        </nav>
    </header>

    <main>
        <div class="header">
            <h2>CADASTRO DA ASSOCIAÇÃO</h2>
        </div>
        <form id="f-cadastro" method="post" action="_insert_assoc.php" enctype="multipart/form-data" autocomplete="off">
            <div id="formulario-associados">

                <label for="nome-associado" class="text-cadastro" id="label-nome">Nome da Associação:</label>
                <input type="text" name="nome" id="nome-associado" placeholder="Nome da Associação" class="text-cadastro" onblur="tratarNome('nome-associado')" maxlength="100" size="50">

                <label for="select-comunidade" class="text-cadastro" id="label-comunidade">Comunidade:</label>
                <select name="id-comunidade" id="select-comunidade" class="text-cadastro">
                    <option value="">Selecione</option>
                    <option value="1">Acari</option>
                    <option value="2">Cidade de Deus</option>
                    <option value="3">Complexo do Alemão</option>
                    <option value="4">Jacarezinho</option>
                    <option value="5">Mangueira</option>
                    <option value="6">Manguinhos</option>
                    <option value="7">Maré</option>
                    <option value="8">Parada de Lucas</option>
                    <option value="9">Rocinha</option>
                    <option value="10">Santa Marta</option>
                </select>

                <label for="telefone1" class="text-cadastro" id="label-telefone1">Telefone:</label>
                <input type="tel" name="telefone1" id="telefone1" class="text-cadastro" onblur="tratarTelefone('telefone1')" maxlength="11">

                <label for="telefone2" class="text-cadastro" id="label-telefone2">Telefone 2 (Opcional):</label>
                <input type="tel" name="telefone2" id="telefone2" class="text-cadastro" onblur="tratarTelefone('telefone2')" maxlength="11">

                <label for="email1" id="label-email1" class="text-cadastro">Email:</label>
                <input type="email" name="email" id="email1" class="text-cadastro" onblur="verificarEmail('email1')">

                <label for="senha" id="label-senha" class="text-cadastro">Senha:</label>
                <input type="password" id="senha" class="text-cadastro" name="senha" maxlength="64" />
                <br><br>
                <button type="submit" form="f-cadastro" id="botao-cadastrar">Cadastrar</button>
            </div>
        </form>
    </main>

    <footer>
        <div id="rodape">
            <div class="social">
                <img src="imagens/facebook-black-icon.png"><br>
                <span>/PramicRJ</span>
            </div>
            <div class="social">
                <img src="imagens/twitter-black-icon.png"><br>
                <span>@Pramic</span>
            </div>
            <div class="social">
                <img src="imagens/whatsapp-black-icon.png"><br>
                <span>xxxxx-xxxx</span>
            </div>
        </div>
    </footer>

</body>

</html>