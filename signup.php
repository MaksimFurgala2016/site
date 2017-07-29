<?php
    require "db.php"; //до

    $data = $_POST;
    if( isset($data['do_signup'] ))
    {
        if (trim($data['name']) == '') {
            $errors[] = 'Введите свое имя';
        }
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
        if (R::count('users', "name = ?", array($data['name'])) > 0 ) {
            $errors[] = 'Пользователь с таким именем уже зарегистрирован!';
        }
        if (R::count('users', 'email = ?', array($data['email'])) > 0 ) {
            $errors[] = 'Пользователь с таким e-mail уже зарегистрирован!';
        }
        if(empty($errors)) {
            //регистрируем
            $user = R::dispense('users');
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div style="color: green">Новый пользователь зарегистрирован!</div>';
        }
        else {
            echo '<div style="color: red">'.array_shift($errors).'</div>';
        }
    }

?>

<form action="signup.php" method="POST">
<legend>Регистрация нового пользователя:</legend>
<!---->
    <p>
        <label for="email">Имя пользователя:</label>
        <input type="text" name="name" value="<?php echo @$data['name'];?>"/>
    </p>


    <p>
    <label for="email">E-mail:</label>
    <input type="email" name="email" value="<?php echo @$data['email'];?>"/>
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
    <button type="submit" name="do_signup">Зарегистрировать</button>
</p>
</form>