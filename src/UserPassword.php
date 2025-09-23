<?php

class UserPassword
{
    private $password;

    public function __construct(string $hashPassword)
    {
        $this->password = $hashPassword;
    }

    public function getPassword() : string { return $this->password; }
    public function setPassword(string $password) { $this->password = password_hash($password, PASSWORD_DEFAULT) }
}

?>