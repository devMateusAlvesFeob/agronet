<?php
// Inclui o arquivo de conexão
include 'conexao.php';

// Consulta para obter os produtos
$sql = "SELECT produto, custo, venda FROM produtos"; 
$result = $conn->query($sql);

// Inicia a lista de produtos
$produtos = [];

if ($result->num_rows > 0) {
    // Armazena os produtos em um array
    while ($row = $result->fetch_assoc()) {
        $produtos[] = [
            'produto' => $row['produto'],
            'custo' => $row['custo'],
            'venda' => $row['venda']
        ];
    }
} else {
    echo "Nenhum produto encontrado.";
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
    <script>
    function atualizarDados() {
        const produtoSelect = document.getElementById("produto");
        const produto = produtoSelect.value;
        const custoSpan = document.getElementById("custo");
        const precoSpan = document.getElementById("preco-avista");

        if (produto) {
            // Busca o custo e o preço de venda do produto selecionado
            const custo = parseFloat(produtoSelect.options[produtoSelect.selectedIndex].getAttribute('data-custo'));
            const venda = parseFloat(produtoSelect.options[produtoSelect.selectedIndex].getAttribute('data-venda'));

            if (!isNaN(custo) && !isNaN(venda)) {
                custoSpan.textContent = `R$ ${venda.toFixed(2)}`; // Preço de venda

                // Calcula o preço à vista (venda + 18%)
                const precoVista = venda * 1.8;
                precoSpan.textContent = `R$ ${precoVista.toFixed(2)}`; // Preço à vista
            } else {
                custoSpan.textContent = "R$ 0,00";
                precoSpan.textContent = "R$ 0,00";
            }
        } else {
            // Limpa os dados se nenhum produto estiver selecionado
            custoSpan.textContent = "R$ 0,00";
            precoSpan.textContent = "R$ 0,00";
        }
    }

    // Função para inicializar os dados ao carregar a página
    window.onload = function() {
        const produtoSelect = document.getElementById("produto");
        produtoSelect.addEventListener("change", atualizarDados);
    };
    </script>
</head>
<body>
<nav class="navbar">
        <a href="menu.html" target="_blank">
            <img src="images/home.png" alt="Logo" class="logo" width: 100px  />
        </a>
        
    </nav>
    <div class="formularioteste">
        <img
            class="icones"
            src="images/Imagem_do_WhatsApp_de_2024-10-26_à_s__19.49.44_76b676f7-removebg-preview(1).png"
            alt="Ícone do WhatsApp"
        /><BR><BR>
        <label for="produto">Digite aqui o produto que deseja consultar:</label><BR><BR>
        <select id="produto" name="produto" required>
            <option value="">Selecione um produto</option>
            <?php
            // Preenche as opções do select com os produtos do banco de dados
            foreach ($produtos as $produto) {
                echo "<option value=\"" . htmlspecialchars($produto['produto']) . "\" data-custo=\"" . htmlspecialchars($produto['custo']) . "\" data-venda=\"" . htmlspecialchars($produto['venda']) . "\">" . htmlspecialchars($produto['produto']) . "</option>";
            }
            ?>
        </select><br /><br />

        <label>Preco a vista:</label>
        <span id="custo">R$ 0,00</span><br /><BR>

        <label>Prazo Safra:</label>
        <span id="preco-avista">R$ 0,00</span><br />
        <br /><br />

        <p>Para pagamento antecipado: autorizado desconto de até 10% no valor acima</p>
    </div>

</body>
</html>
