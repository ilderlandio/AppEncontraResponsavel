<?php
class Usuario // Busca o usuário no banco
{
    private PDO $conn; // variável/atributo para receber a conexão com o BD | Virá da classe Database
    private string $tabela = 'usuarios'; // nome da tabela

    public function __construct(PDO $conn) // recebe a conexão com BD
    {
        $this->conn = $conn;
    }
    public function buscarPorUsuario(string $usuario): ?object  // A função pode retornar Array ou Null
    {
        // Consulta SQL que busca o usuário na tabela
        $sql = "SELECT id, usuario, senha FROM {$this->tabela} WHERE usuario = :usuario LIMIT 1"; 
        // LIMIT 1 garante que apenas um registro seja retornado

        $stmt = $this->conn->prepare($sql); // Prepara a consulta para ser executada

        // Associa o valor da variável $usuario ao parâmetro :usuario da consulta
        $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);

        $stmt->execute(); // Executa a consulta no banco

        // Obtém o resultado da consulta (dados do usuário encontrado)
        $resultado = $stmt->fetch();

        // Retorna os dados do usuário ou null se não encontrar
        return $resultado ?: null;
    }
}