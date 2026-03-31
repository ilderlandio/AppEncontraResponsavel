<?php
session_start(); // Inicia a sessão para poder usar $_SESSION

require_once 'classes/Database.php';
require_once 'classes/Usuario.php';
require_once 'classes/Auth.php';

// Verifica se o formulário veio via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { 
    header('Location: index.php'); //  Previne acesso direto deste aquivo pelo navegador
}

// Captura e limpa os dados
$usuario = trim($_POST['usuario'] ?? ''); // Captura e limpa os dados do formulário | secretaria   " → "secretaria"
$senha = trim($_POST['senha'] ?? '');  // "se não existir valor, usa vazio ('')"

// Validação simples do formulário
if ($usuario === '' || $senha === '') { // Verifica se os campos estão vazios
    $_SESSION['erro_login'] = 'Preencha usuário e senha.';
    header('Location: index.php');
    exit;
}
// Tenta executar o processo de login
try {
      // Cria conexão com o banco
    $database = new Database();
    $conn = $database->getConnection(); // $conn é nossa conexão com BD

     // Instancia as classes
    $usuarioModel = new Usuario($conn); 
    $auth = new Auth($usuarioModel); // Passo a referência da Classe Usuário para a Clase Auth
    
     // Tenta fazer login
     var_dump($auth->login($usuario, $senha)); 
    // if ($auth->login($usuario, $senha)) {
    //     // Se login for válido, vai para o sistema/Página protegida
    //     // header('Location: dashboard.php');
    //     // exit;
    // }

    // // Se login falhar
    // $_SESSION['erro_login'] = 'Usuário ou senha inválidos.';
    // header('Location: index.php');
    // exit;

// Caso dê erro na conexão com o banco
} catch (PDOException $e) {
    $_SESSION['erro_login'] = 'Erro ao conectar com o banco.';
    header('Location: index.php');
    exit;
}