<?php
session_start();
?>
<html>
<head>
    <title>Доброй пожаловать!</title>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="update.js"></script>
</head>
<body>
<form  method="post">
    <h2>Добро пожаловать,<span id="name"><?php echo $name = @$_SESSION["name"]; ?></span></h2>

</form>
<button name="change_name" id="change_name">Изменить имя</button>
<a href="logout.php"><button  name="submit">Выйти</button></a>
</body>
</html>
