<?php
require_once 'Validator.php';
require_once 'UserEmail.php';
require_once 'UserPassword.php';

class UserManager
{
    private $userArray;

    public function getUserArray() { return $this->userArray; }
    public function setUserArray(array $users) { $this->userArray = $users; }

    public function getUserByEmail(string $email) : ?User
    {
        foreach ($this->userArray as $user){
            if ($user->getEmail() === $email)
                return $user;
        }

        return null;
    }

    public function generateSimulatedUsers() : array
    {
        $usersData = [
            ["id" => 1, "name" => "William", "email" => "williamunimar@gmail.com", "password" => "SenhaForte1"],
            ["id" => 2, "name" => "Maria Oliveira", "email" => "maria@email.com", "password" => "Senha123"],
            ["id" => 3, "name" => "Pedro", "email" => "pedro@@email.com", "password" => "Senha123"],
            ["id" => 4, "name" => "Navarro", "email" => "navarro@email.com", "password" => "senhapassword"],
        ];

        $users = [];

        foreach($usersData as $user) {
            if (Validator::validateUser($user['id'], $user['name'], $user['email'], $user['password']))
                $users[] = new User($user['id'], $user['name'], UserManager::createNewEmail($user['email']), UserManager::createNewHashPassword(($user['password'])));
        }

        $this->setUserArray($users);
        return $users;
    }

    private static function createNewEmail(string $email) : UserEmail
    {
        return new UserEmail($email);
    }

    private static function createNewHashPassword(string $password) : UserPassword
    {
        return new UserPassword(password_hash($password, PASSWORD_DEFAULT));
    }
}

?>