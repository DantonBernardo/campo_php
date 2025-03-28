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
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    
    body {
      padding: 20px;
    }
    
    form {
      display: flex;
      flex-direction: column; /* Isso que estava faltando */
      gap: 15px; /* Espaço entre os itens */
      max-width: 600px;
      margin: 0 auto;
    }
    
    form div {
      width: 100%;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    
    input[type="text"],
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    textarea {
      min-height: 100px;
      resize: vertical;
    }
    
    button {
      padding: 10px 15px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
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
</body>
</html>