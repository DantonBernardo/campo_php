<?php

function getLivros($pdo) {
    try {
        // Prepara e executa a query para buscar os livros
        $sql = "SELECT id, nome, descricao, url FROM livros";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Obtém todos os livros como array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro ao buscar os livros: " . $e->getMessage());
    }
}

?>