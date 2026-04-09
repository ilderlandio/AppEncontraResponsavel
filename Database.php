<?php
class Database
{
    private string $host = 'localhost';
    private string $dbname = 'contatoresponsaveis';
    private string $user = 'root';
    private string $pass = '';
    private ?PDO $conn = null; // Variável deve guardar um objeto da classe PDO (a conexão com o banco).
                               // no início → não existe conexão ainda (null)
                               //depois → passa a guardar um objeto PDO

    public function getConnection(): PDO // A função/Método deve retornar um objeto PDO.
    {                                    // Quem chamar essa função receberá uma conexão com o banco.
        if ($this->conn === null) {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";

            $this->conn = new PDO($dsn, $this->user, $this->pass);

            // Boas práticas básicas
            // Exibir erros de banco como exceções
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Retornar resultados como objetos
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // $usuario->nome | $usuario->id
        }
        return $this->conn;
    }
}