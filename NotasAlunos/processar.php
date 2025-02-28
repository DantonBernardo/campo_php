<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $nota = trim($_POST["nota"]);

    if (!empty($nome) && is_numeric($nota) && $nota >= 0 && $nota <= 10) {
        $linha = "$nome;$nota\n";
        file_put_contents("notas.txt", $linha, FILE_APPEND);
        echo "Nota cadastrada com sucesso!";
    } else {
        echo "Erro: A nota deve estar entre 0 e 10.";
    }
}
echo "<br><a href='index.php'>Voltar</a>";
?>
