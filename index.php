<?php

require_once("config.php");

$user = new Usuario();
$user->loadByID(4);
echo $user;


?>