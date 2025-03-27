<?php 

include('../connect.php');

function adicionarLivro($nome, $descricao, $url): void
{
  global $pdo;
  $stmt = $pdo->prepare("INSERT INTO livros (nome, descricao, url) VALUES (:nome, :descricao, :url)");
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':descricao', $descricao);
  $stmt->bindParam(':url', $url);

  if ($stmt->execute()) {
    echo "<span>Livro adicionado com sucesso!</span>";
  } else {
    echo "<span>Erro ao adicionar este Livro.</span>";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $url = $_POST['url'];

  adicionarLivro($nome, $descricao, $url);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar livro</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #2C3E50;
      color: #F5F5DC;
      display: flex;
      width: 100%;
      padding: 10px 20px;
      box-sizing: border-box;
      align-items: center;
    }

    header button {
      justify-content: end;
      margin-left: auto;
      color: #F5F5DC;
      text-transform: uppercase;
      background-color: #C94C4C;
      padding: 10px 20px;
      transition: .5s;
      cursor: pointer;
      border: none;
      border-radius: 10px;
    }

    header button:hover {
      background-color: rgb(117, 46, 46);
      transition: .5s;
    }

    header a {
      display: flex;
      text-decoration: none;
      margin-left: auto;
    }

    header button a:visited {
      text-decoration: none;
      color: #F5F5DC;
    }

    .green {
      background-color: rgb(13, 213, 80);
    }

    .green:hover {
      background-color: rgb(51, 187, 97);
    }

    form {
      height: 100%;
      display: flex;
      flex-direction: column;
      gap: 10px;
      width: 300px;
      margin: 20px auto;
      padding: 20px;
      background: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      align-items: center;
    }

    label {
      font-weight: bold;
      color: #333;
    }

    input {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    input:focus {
      border-color: #007bff;
      outline: none;
    }
    footer {
      background-color: #006D77;
      width: 100%;
      display: flex;
      text-align: center;
      justify-content: center;
      color: #fff;
      box-sizing: border-box;
      padding: 10px;
    }
  </style>
</head>

<body>
  <header>
    <h2>GIGI Books</h2>
    <a href="http://localhost/camporeal/EBooks/Home/addLivro.php">
      <button class="green">Adicionar novo livro</button>
    </a>
    <a href="../logout.php">
      <button>Sair</button>
    </a>
  </header>

  <form method="POST" action="">
    <label>Nome:</label>
    <input type="text" name="nome" placeholder="nome..." required>
    <label>Descrição:</label>
    <input type="text" name="descricao" placeholder="descrição..." required>
    <label>Link PDF:</label>
    <input type="text" name="url" placeholder="https://..." required>
    <button type="submit">ENVIAR</button>
  </form>
</body>
</html>