<?php

class Validator
{
    public static function validatePassword(string $password): bool 
    {
        if (strlen($password) < 8 || !preg_match('/\d/', $password) || !preg_match('/[A-Z]/', $password)) {
            echo("Senha '{$password}' inválida<br>");
            return false;
        }

        return true;
    }

    public static function validateEmail(string $email) : bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("Email '{$email}' Inválido<br>");
            return false;
        }

        return true;
    }

    public static function validateUser(int $id, string $name, string $email, string $password) : bool
    {
        if ($id <= 0 || strlen($name) <= 1 || !Validator::validateEmail($email) || !Validator::validatePassword($password)) {
            return false;
        }

        return true;
    }
}

?>