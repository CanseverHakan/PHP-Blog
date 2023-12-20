<?php

$db = new PDO(
    "mysql:host=localhost;dbname=blog;",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]
);

