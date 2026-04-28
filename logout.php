<?php
session_start();

require_once 'config/Database.php';
require_once 'classes/Usuario.php';
require_once 'classes/Auth.php';

$database = new Database();
$conn = $database->getConnection();

$usuarioModel = new Usuario($conn);
$auth = new Auth($usuarioModel);

$auth->logout();

header('Location: index.php');
exit;