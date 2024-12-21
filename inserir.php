<?php
// Inclui o arquivo de conexão
include 'conexao.php';

// Variável para armazenar mensagens de status (sucesso ou erro)
$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $produto = $_POST['produto'];
    $preco_custo = $_POST['preco_custo'];
    $preco_venda = $_POST['preco_venda'];

    // Verifica se os preços são numéricos
    if (!is_numeric($preco_custo) || !is_numeric($preco_venda)) {
        $mensagem = "<p class='mensagem-erro'>Os preços devem ser numéricos.</p>";
    } else {
        // Prepara e executa a consulta SQL
        $sql = "INSERT INTO produtos (produto, custo, venda) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            $mensagem = "<p class='mensagem-erro'>Erro na preparação da consulta: " . $conn->error . "</p>";
        } else {
            // Realiza o binding das variáveis corretas
            $stmt->bind_param("sdd", $produto, $preco_custo, $preco_venda);

            // Executa a consulta
            if ($stmt->execute()) {
                $mensagem = "<p class='mensagem-sucesso'>Produto cadastrado com sucesso!</p>";
            } else {
                $mensagem = "<p class='mensagem-erro'>Erro: " . $stmt->error . "</p>";
            }

            // Fecha a declaração
            $stmt->close();
        }
    }
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>AgroNet</title>
    
</head>
<body>
<nav class="navbar">
        <a href="menu.html" target="_blank">
            <img src="images/home.png" alt="Logo" class="logo" width: 100px  />
        </a>
        
    </nav>
    <div class="formularioteste">
        <form class="form-cadastro" action="" method="POST">
            <img class="icones" src="images/CADPRODUTO.png" alt="" /><br /><br />
            <h1>Cadastro de Novo Produto</h1>
            <p>Insira um novo produto no sistema cadastrando abaixo:</p>

            <!-- Exibe a mensagem de sucesso ou erro aqui -->
            <?php if ($mensagem): ?>
                <div><?php echo $mensagem; ?></div>
            <?php endif; ?>

            <label for="produto">Produto:</label><br />
            <input type="text" id="produto" name="produto" required /><br /><br />

            <label for="preco-custo">Preço de Custo:</label><br />
            <input type="number" id="preco-custo" name="preco_custo" step="0.01" required /><br /><br />

            <label for="preco-venda">Preço de Venda:</label><br />
            <input type="number" id="preco-venda" name="preco_venda" step="0.01" required /><br /><br />

            <button class="btn" type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>



