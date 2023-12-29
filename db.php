<?php

$host = 'localhost';
$db = 'pharmacy';
$user = 'root';
$pass = '';


try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo "Помилка з'єднання з БД";
}
