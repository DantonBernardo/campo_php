<?php
$arquivo = "notas.txt";

if (file_exists($arquivo)) {
    file_put_contents($arquivo, "");
    echo "Todas as notas foram excluídas!";
} else {
    echo "O arquivo de notas não existe.";
}

echo "<br><a href='index.php'>Voltar</a>";
?>