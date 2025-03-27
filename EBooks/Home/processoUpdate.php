<?php

include('../connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $url = $_POST['url'];

    // Atualizar no banco de dados
    $sql = "UPDATE livros SET nome = :nome, descricao = :descricao, url = :url WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $stmt->bindParam(':url', $url, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "Livro atualizado com sucesso!";
        header("Location: index.php"); // Redireciona de volta à lista
        exit();
    } else {
        echo "Erro ao atualizar o livro.";
    }
}
?>
