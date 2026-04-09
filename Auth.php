<?php
class Auth
{
    private Usuario $usuarioModel; // Declara um atributo do tipo Usuario (ainda não inicializado)

    public function __construct(Usuario $usuarioModel)
    {
        // Guarda a classe Usuario dentro da Auth
        $this->usuarioModel = $usuarioModel;
    }
    public function login(string $usuario, string $senha): object|false //bool
    {
        // Busca o usuário no banco
        $dadosUsuario = $this->usuarioModel->buscarPorUsuario($usuario);

        // Se não encontrou o usuário, já falha
        if (!$dadosUsuario) {
            return false;
        }

        // Compara a senha digitada com o hash salvo no banco
        // password_verify pega a senha digitada e compara com a senha criptografada
        // if (!password_verify($senha, $dadosUsuario->senha)) {
        //     return false;
        // }

        // Se chegou aqui, login está correto
        // Regenera o ID da sessão (boa prática de segurança)
        session_regenerate_id(true);

        // Cria variáveis de sessão (usuário agora está logado)
        $_SESSION['usuario_id'] = $dadosUsuario->id;
        $_SESSION['usuario_nome'] = $dadosUsuario->usuario;
 
        return $dadosUsuario; 
        // return true;
    }

    public function logout(): void
    {
        // Limpa todas as variáveis de sessão
        $_SESSION = [];

        // Destrói a sessão
        session_destroy();
    }

    public function estaLogado(): bool
    {
        // Verifica se existe sessão ativa
        return isset($_SESSION['usuario_id']);
    }
}