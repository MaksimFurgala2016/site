<?php
require "db.php";
?>

<div>
    <h1>Здравствуйте, <?php echo $_SESSION['logged_user']->email;  ?> </h1>
    <a href="logout.php">Выйти</a>
</div>
<div>
    <a href="signup.php">Регистрация нового пользователя</a>
    <a href="#">Добавить новый товар</a>
    <a href="#">Удалить товар</a>
</div>
