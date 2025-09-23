<?php

class Validator
{
    public static function validatePassword(string $password): bool 
    {
        if (strlen($password) < 8 || !preg_match('/\d/', $password) || !preg_match('/[A-Z]/', $password)) {
            echo("Senha inválida<br>");
            return false;
        }

        return true;
    }

    public static function validateEmail(string $email) : bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("Email Inválido<br>");
            return false;
        }

        return true;
    }

    public static function validateUser(int $id, string $name, string $email, string $password) : bool
    {
        if ($id <= 0 || strlen($name) <= 1 || !Validator::validateEmail($email) || !Validator::validatePassword($password)) {
            echo("Usuário inválido<br>");
            return false;
        }

        return true;
    }
}

?>