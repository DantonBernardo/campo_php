<?php
include('../connect.php'); // Conectar ao banco

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar a query para evitar SQL Injection
    $stmt = $pdo->prepare("DELETE FROM livros WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Livro deletado com sucesso!";
    } else {
        echo "Erro ao deletar o livro.";
    }
} else {
    echo "ID inválido.";
}

// Redireciona para a página inicial (ou outra página)
header("Location: index.php");
exit;
?>