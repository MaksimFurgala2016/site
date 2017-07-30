<?php
require "db.php";
$data = $_POST;
if (isset($data['do_login'])) {
    $errors = array();//errors
    $user = R::findOne('users', 'email = ?', array($data['email']));
    if ($user) {
        //логин существует
        if (password_verify($data['password'], $user->password)) {
            $_SESSION['logged_user'] = $user;
            header("location: control_site.php");
        }
        else {
            $errors[] = 'Неверно введен пароль!';
        }
    }
    else {
        $errors[] = 'Пользователь с таким e-mail не существует!';
    }
    if (! empty($errors)) {
        echo 'Неверно введен e-mail или пароль!';
    }
}
?>

<form action="login.php" method="POST">
<legend>Вход в систему администрирования:</legend>
<!---->
<p>
    <label for="email">E-mail:</label>
    <input type="email" name="email" value="<?php echo @$data['email'];?>"/>
</p>

<p>
    <label for="password">Пароль:</label>
    <input type="password" name="password"/>
</p>

<p>
    <button type="submit" name="do_login">Вход</button>
</p>
</form>
