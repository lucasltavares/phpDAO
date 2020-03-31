<?php

require_once("config.php");

$user = new Usuario();

$user->loadById(1);

echo $user;