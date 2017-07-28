<?php
    require "db.php";

    $data = $_POST;
    if( isset($data['do_signup'] ))
    {
        //регистрация
        $errors = array();//errors
        if(trim($data['email']) == '') {
            $errors[] = 'Введите адрес электронной почты!';
        }
        if($data['password'] == '') {
            $errors[] = 'Введите пароль!';
        }
        if($data['confirm_password'] != $data['password']) {
            $errors[] = 'Повторный пароль введен неверно!';
        }
        if(empty($errors)) {
            //регистрируем
        }
        else {
            echo '<div>'.array_shift($errors).'</div>';
        }
    }

?>

<form action="signup.php" method="POST">
<legend>Регистрация пользователя:</legend>
<!---->
<p>
    <label for="email">E-mail:</label>
    <input type="email" name="email"/>
</p>

<p>    
    <label for="password">Парол:ь</label>
    <input type="password" name="password"/>
</p>

<p>
    <label for="confirm_password">Введите пароль еще раз:</label>
    <input type="password" name="confirm_password"/>
</p>
<p>
    <button type="submit" name="do_signup">Зарегистрироваться</button>    
</p>
</form>