<?php
require_once 'User.php';
require_once 'UserManager.php';
require_once 'UserEmail.php';
require_once 'UserPassword.php';

$userManager = new UserManager;
$userManager->generateSimulatedUsers();

User::login($userManager, "Email", "Senha");
User::login($userManager, "maria@email.com", "Senha123");

User::updatePassword($userManager, "maria@email.com", "Senha1234")

?>