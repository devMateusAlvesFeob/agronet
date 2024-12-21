<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o parâmetro 'produto' foi passado na URL
if (isset($_GET['produto'])) {
    $produto = $_GET['produto'];

    // Prepara a consulta para buscar informações do produto
    $sql = "SELECT produto, custo, venda FROM produtos WHERE produto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $produto); // 's' indica que o tipo do parâmetro é string
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o produto foi encontrado
    if ($result->num_rows > 0) {
        // Obtém os dados do produto
        $dadosProduto = $result->fetch_assoc();
        // Retorna os dados como JSON
        echo json_encode($dadosProduto);
    } else {
        // Retorna erro se o produto não for encontrado
        echo json_encode(['error' => 'Produto não encontrado.']);
    }

    // Fecha a declaração e a conexão
    $stmt->close();
} else {
    // Retorna erro se o parâmetro 'produto' não for passado
    echo json_encode(['error' => 'Parâmetro de produto não especificado.']);
}

// Fecha a conexão com o banco de dados
$conn->close();
?>