<?php
session_start();
$host = 'localhost';
$db = 'reg_author';
$user = 'daniil';
$pass = 'password';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::MYSQL_ATTR_LOCAL_INFILE => true,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $opt);

} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}

    $id = @$_SESSION['id'];
    $name = htmlspecialchars($_POST['show']);
    $stmt = $pdo->prepare("UPDATE `registration` SET name=? WHERE id=?");

    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $id);

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

     if ($stmt) {
         $_SESSION['name'] = $name;
        echo "Вы изменили имя!";
    } else {
        echo "Ошибка!";
    }
?>