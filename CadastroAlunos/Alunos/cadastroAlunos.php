<?php
namespace CadastroAlunos;

use Alunos\Aluno; // Importa a classe Aluno do namespace Alunos

class CadastroAluno {
    // Propriedade privada para armazenar a lista de alunos
    private $alunos = [];

    // Método para adicionar um aluno à lista
    public function cadastrarAluno(Aluno $aluno) {
        $this->alunos[] = $aluno;
    }

    // Método para retornar todos os alunos cadastrados
    public function fetchAll() {
        return $this->alunos;
    }
}