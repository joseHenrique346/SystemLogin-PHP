<?php
require_once 'User.php';
require_once 'UserManager.php';
require_once 'UserEmail.php';
require_once 'UserPassword.php';

new UserManager $userManager;
$userManager->generateSimulatedUsers();

User::login($userManager, "Email", "Senha");
User::login($userManager, "maria@email.com", "Senha123");

User::changePassword($userManager, "maria@email.com", "Senha1234")

?>