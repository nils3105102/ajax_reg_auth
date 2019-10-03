<?php
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

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = md5(htmlspecialchars($_POST['password']));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Неверный формат email! ";
    } else {

        /*$result = $pdo->query("SELECT * FROM registration WHERE email='$email'");
        $data = $result->fetchColumn();*/
        $stmt = $pdo->prepare("SELECT * FROM `registration` WHERE email=?");
        $stmt->execute(array($_POST['email']));
        $data = $stmt->fetchColumn();


        if ($data == 0) {
            $stmt = $pdo->prepare("INSERT INTO `registration`(name, email, password) values (?,?,?)");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $password);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //$_SESSION['name'] = @$result[0]['name'];
            if ($stmt) {
                echo "Вы успешно зарегистрировались!";
            } else {
                echo "Ошибка!";
            }
        } else {
            echo "Этот email уже зарегистрирован!";
        }
    }

?>