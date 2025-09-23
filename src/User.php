<?php

class User
{
    private $id;
    private $name;
    private $userEmail;
    private $userPassword;

    public function __construct(int $id, string $name, UserEmail $userEmail, UserPassword $userPassword) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
    }

    public function getId() : int { return $this->Id; }
    public function getName() : string { return $this->name; }
    public function getEmail() : string { return $this->userEmail->getEmail(); }
    public function getPassword() : string { return $this->userPassword->getPassword(); }
    public function setPassword(string $newPassword) : void { $this->userPassword->setPassword($newPassword); }

    public static function login(UserManager $userManager, string $email, string $password) : string
    {
        $user = $userManager->getUserByEmail($email);
        if ($user == null) {
            return "Usuário inexistente<br>";
        }

        if (password_verify($password, $user->getPassword())) {
            return "Conectado com sucesso!<br>";
        }

        return "Credenciais inválidas<br>";
    }

    public static function updatePassword(UserManager $userManager, string $email, string $newPassword) : string
    {
        if (!Validator::validatePassword($newPassword)) {
            return "Senha inválida para atualizar.<br>";
        }

        $user = $userManager->getUserByEmail($email);
        if ($user == null) {
            return "Usuário não encontrado<br>";
        }

        $user->setPassword($newPassword);
        return "Senha alterada com sucesso!<br>";
    }
}

?>