<?php

include('../connect.php');

// Verifica se o ID foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar os dados do livro no banco
    $sql = "SELECT * FROM livros WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $livro = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$livro) {
        die("Livro não encontrado.");
    }
} else {
    die("ID inválido.");
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar livro</title>
  <form action="processoUpdate.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($livro['id']) ?>">

    <label>Nome do Livro:</label>
    <input type="text" name="nome" value="<?= htmlspecialchars($livro['nome']) ?>" required>

    <label>Descrição:</label>
    <textarea name="descricao" required><?= htmlspecialchars($livro['descricao']) ?></textarea>

    <label>URL do PDF:</label>
    <input type="text" name="url" value="<?= htmlspecialchars($livro['url']) ?>" required>

    <button type="submit">Salvar Alterações</button>
</form>
</head>
<body>
  
</body>
</html>