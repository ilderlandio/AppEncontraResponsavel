<?php
// Sessões são usadas para armazenar informações entre páginas
session_start(); // Inicia ou retoma uma sessão do usuário.
// // Verifica se já existe uma sessão indicando que o usuário está logado.
// if (isset($_SESSION['usuario_id'])) { //Variável criada quando o login é validado com sucesso.
//     header('Location: dashboard.php'); // Redireciona o usuário para a página protegida do sistema.
//     exit; // Encerra o script 
// }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login do Sistema</title>
</head>
<body>
    <h2>Login</h2>
    <!-- Verifica se existe uma mensagem de erro armazenada na sessão.--> 
    <?php if (isset($_SESSION['erro_login'])): ?>         <!-- É criada em Login.php, Dado errado | Vazio | Erro de Autenticação --> 
        <p style="color: red;">
            <?php
                echo $_SESSION['erro_login']; // Mostra a mensagem criada 
                unset($_SESSION['erro_login']); // Remove a mensagem da sessão depois
            ?>
        </p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <div>
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" id="usuario" required>
        </div>
        <br>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
        </div>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>