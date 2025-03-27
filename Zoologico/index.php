<?php
$host = 'localhost';
$dbname = 'zoologico';
$username = 'root';
$password = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
  die("Erro na conexão: " . $e->getMessage());
}

// Função para listar animais
function listarAnimais(): array
{
  global $pdo;
  $stmt = $pdo->query("SELECT * FROM animais");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para adicionar um animal
function adicionarAnimal($nome, $especie, $idade, $habitat): void
{
  global $pdo;
  $stmt = $pdo->prepare("INSERT INTO animais (nome, especie, idade, habitat) VALUES (:nome, :especie, :idade, :habitat)");
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':especie', $especie);
  $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
  $stmt->bindParam(':habitat', $habitat);

  if ($stmt->execute()) {
    echo "Animal adicionado com sucesso!";
  } else {
    echo "Erro ao adicionar o animal.";
  }
}

// Função para editar um animal
function editarAnimal($id, $nome, $especie, $idade, $habitat)
{
  global $pdo;
  $stmt = $pdo->prepare("UPDATE animais SET nome = :nome, especie = :especie, idade = :idade, habitat = :habitat WHERE id = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':especie', $especie);
  $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
  $stmt->bindParam(':habitat', $habitat);

  if ($stmt->execute()) {
    echo "Animal atualizado com sucesso!";
  } else {
    echo "Erro ao atualizar o animal.";
  }
}

// Função para excluir um animal
function excluirAnimal($id)
{
  global $pdo;
  $stmt = $pdo->prepare("DELETE FROM animais WHERE id = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  if ($stmt->execute()) {
    echo "Animal excluído com sucesso!";
  } else {
    echo "Erro ao excluir o animal.";
  }
}

// Teste para adicionar um animal
if (isset($_GET['teste'])) {
  adicionarAnimal('Tigre', 'Felino', 4, 'Floresta');
  echo "Animal adicionado!";
}

// Teste para listar os animais
$animais = listarAnimais();
echo '<pre>';
print_r($animais);
echo "\nFim do script.";
?>