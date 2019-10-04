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
<form  method="post" id="form" action="update.php">
    <h2>Добро пожаловать,<span id="name"><?php echo @$_SESSION["name"]; ?></span></h2>
    <!--<input type="text" name="name" placeholder="Изменить имя">-->
    <button name="change_name" id="change_name">Изменить имя</button>
</form>

<a href="logout.php"><button  name="submit">Выйти</button></a>
</body>
</html>
