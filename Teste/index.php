<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "biblioteca";

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM livros";
$result = $conn->query($sql);

// Exibir resultados
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fechar conexão
$conn->close();
?>