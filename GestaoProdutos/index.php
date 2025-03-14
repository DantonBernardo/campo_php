<?php
// Classe Produto
class Produto
{
  private $nome;
  private $preco;
  private $quantidade;

  // Construtor
  public function __construct($nome, $preco, $quantidade)
  {
    $this->nome = $nome;
    $this->preco = $preco;
    $this->quantidade = $quantidade;
  }

  // Método para exibir informações do produto
  public function exibirInfo()
  {
    return "Produto: {$this->nome} | Preço: R$ {$this->preco} | Quantidade: {$this->quantidade}<br/>";
  }

  // Método para aplicar desconto
  public function aplicarDesconto($percentual)
  {
    $this->preco -= $this->preco * ($percentual / 100);
  }

  // Método para atualizar a quantidade
  public function atualizarQuantidade($novaQuantidade)
  {
    $this->quantidade = $novaQuantidade;
  }

  // Métodos getters
  public function getNome()
  {
    return $this->nome;
  }

  public function getPreco()
  {
    return $this->preco;
  }

  public function getQuantidade()
  {
    return $this->quantidade;
  }
}

// Classe Estoque
class Estoque
{
  private $produtos = [];

  // Método para adicionar produtos ao estoque
  public function adicionarProduto(Produto $produto)
  {
    $this->produtos[] = $produto;
  }

  // Método para listar produtos disponíveis
  public function listarProdutos()
  {
    foreach ($this->produtos as $produto) {
      echo $produto->exibirInfo();
    }
  }

  // Método para calcular o valor total do estoque
  public function calcularValorTotal()
  {
    $total = 0;
    foreach ($this->produtos as $produto) {
      $total += $produto->getPreco() * $produto->getQuantidade();
    }
    return "Valor total do estoque: R$ " . number_format($total, 2, ',', '.') . "<br/>";
  }
}

// Teste do sistema
$produto1 = new Produto("Celular", 2000, 5);
$produto2 = new Produto("Notebook", 4500, 3);

$estoque = new Estoque();
$estoque->adicionarProduto($produto1);
$estoque->adicionarProduto($produto2);

echo "Produtos no estoque:<br/>";
$estoque->listarProdutos();

echo "<br/>Aplicando desconto de 10% no celular...<br/>";
$produto1->aplicarDesconto(10);
$estoque->listarProdutos();

echo "<br/>" . $estoque->calcularValorTotal();
?>