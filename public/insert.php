<?php

use W1020\Table;

include "../vendor/autoload.php";

$config = [
    "servername" => "localhost",
    "username" => "root",
    "password" => "root",
    "dbname" => "guestbook",
    "table" => "ved"
];

$table = new Table($config);

$table->ins($_POST);
header("Location: index.php");