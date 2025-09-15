<?php
class Clube {
    private $id;
    private $nome;
    private $cidade;

    public function __construct($nome, $cidade, $id = null) {
        $this->nome = $nome;
        $this->cidade = $cidade;
        $this->id = $id;
    }

    public function getId() { return $this->id; }
    public function getNome() { return $this->nome; }
    public function getCidade() { return $this->cidade; }
}
