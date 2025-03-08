<?php
namespace Alunos;

class Aluno {
    // Propriedades da classe
    public $nome;
    public $matricula;
    public $curso;

    // Método construtor
    public function __construct($nome, $matricula, $curso) {
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    // Método para obter o nome do aluno
    public function getNome() {
        return $this->nome;
    }

    // Método para definir o nome do aluno
    public function setNome($nome) {
        $this->nome = $nome;
    }

    // Método para obter a matrícula do aluno
    public function getMatricula() {
        return $this->matricula;
    }

    // Método para definir a matrícula do aluno
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    // Método para obter o curso do aluno
    public function getCurso() {
        return $this->curso;
    }

    // Método para definir o curso do aluno
    public function setCurso($curso) {
        $this->curso = $curso;
    }
}
?>