<?php
require "db.php";
if (isset($_SESSION['logged_user']))
{

?>
<div class="control">
<div >

    <?php
    //вытаскиваем имя через сессию
    $list = $_SESSION['logged_user'];
    $user = R::findOne('users', 'email = ?', array($list['email']));
    ?>

    <h1>Здравствуйте, <?php echo $user['name']  ?> </h1>
    <a href="logout.php" class="button">Выйти</a>
    <a href="index.php" class="button">На главную</a>
</div>




<div>
    <div class="row">
        <div class="three columns">
            <ul>
                <li>
            <a href="signup.php" class="add">
                <img src="content/icons/person.png">
                ЛИЧНЫЕ ДАННЫЕ
            </a>
                </li>

                <li>
            <a href="signup.php" class="add">
                <img src="content/icons/plus.png">
                ДОБАВИТЬ ТОВАР
            </a>
                </li>
            </ul>
        </div>

        <div class="nine columns">

        </div>
</div>
</div>
</div>
<?php }
else
{
    header("location: login.php");
}
?>