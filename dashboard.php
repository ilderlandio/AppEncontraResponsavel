<?php
require_once 'includes/protect.php'; // Verifica 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Sistema</title>
</head>
<body>

    <h2>Bem-vinda ao sistema</h2>
    <p>Usuário logado: <strong><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></strong></p> <!-- Pega o nome do usuário salvo na  --> 
<!-- htmlspecialchars --> 
    <ul>
        <li>Cadastrar estudante</li>
        <li>Cadastrar responsável</li>
        <li>Pesquisar estudante</li>
        <li>Pesquisar responsável</li>
        <li>Abrir contato no WhatsApp</li>
    </ul>

    <a href="logout.php">Sair</a> <!-- Chama a página PHP que limpa a sessão --> 

</body>
</html>