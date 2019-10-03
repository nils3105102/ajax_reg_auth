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
    $email = htmlspecialchars($_POST['email']);
    $password = md5(htmlspecialchars($_POST['password']));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Неверный формат email! ";
    }else {
        //$stmt = $pdo->query("SELECT * FROM registration WHERE email='".$email."' AND password='".$password."'");
        $stmt = $pdo->prepare("SELECT * FROM `registration` WHERE email=? AND password=?");
        $stmt->execute(array($email, $password));
        $data = $stmt->fetchColumn();
        if ($data != 0) {
            $stmt = $pdo->prepare("SELECT * FROM `registration` WHERE email=? AND password=?");
            $stmt->execute(array($email, $password));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $id = @$result[0]['id'];
            $name = @$result[0]['name'];
            $_SESSION['name'] = $name;
            $_SESSION['id'] = $id;
            if(isset($_SESSION['name']) && isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $name = $_SESSION['name'];
            }
            echo "Вы успешно вошли!";
        } else {
            echo "Email и пароль неверные!";
        }

        /*$data = $result->fetch(PDO::FETCH_NUM);
        print_r($data);*/
    }

?>