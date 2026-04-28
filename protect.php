<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {

    // Se não estiver, bloqueia acesso
    header('Location: index.php');
    exit;
}