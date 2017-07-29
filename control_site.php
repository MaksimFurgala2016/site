<?php
require "db.php";
if (isset($_SESSION['logged_user']))
{
?>

<div >
    <h1>Здравствуйте, <?php echo $_SESSION['logged_user']->email;  ?> </h1>
    <a href="logout.php">Выйти</a>
</div>
<?php
//search users
$data = R::findAll('users',"ORDER BY 'email' DESC");
?>

<div class="container">
<div class="three columns">

<?php foreach ($data as $user) {?>

    <div class="row">
            <?php echo $user->email?>
        <a href="signup.php">
            <img src="content/icons/plus.png">
        </a>
        <a href="edit_user.php">
            <img src="content/icons/edit.png">
        </a>
            <a href="delete_user.php">
                <img src="content/icons/trash.png">
            </a>
    </div>
    <?php }} ?>
</div>
</div>
    <!--list by users-->

</div>
