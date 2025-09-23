<?php
require_once 'User.php';
require_once 'UserManager.php';
require_once 'UserEmail.php';
require_once 'UserPassword.php';

$userManager = new UserManager;
echo("<h3>Criação dos usuários<br></h3>");
$userManager->generateSimulatedUsers();

echo("<h3>Login com usuário inexiste<br></h3>");
echo(User::login($userManager, "Email", "Senha"));

echo("<h3>Login normal<br></h3>");
echo(User::login($userManager, "maria@email.com", "Senha123"));

echo("<h3>Atualizar senha<br></h3>");
echo(User::updatePassword($userManager, "maria@email.com", "Senha1234"));

?>