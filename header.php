<?php
$dbc = mysqli_connect('localhost', 'root', '', 'pizzaproject');
if(!isset($_COOKIE['user_id'])) {
    if(isset($_POST['submit'])) {
        $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        if(!empty($user_username) && !empty($user_password)) {
            $query = "SELECT `user_id` , `username` FROM `user` WHERE username = '$user_username' AND password = SHA('$user_password')";
            $data = mysqli_query($dbc,$query);
            if(mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_assoc($data);
                setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
                setcookie('username', $row['username'], time() + (60*60*24*30));
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/pizzaproject';
                header('Location: '. $home_url);
            }
            else {
                $error = 'Извините, вы должны ввести правильные имя пользователя и пароль';
            }
        }
        else {
            $error = 'Извините вы должны заполнить поля правильно';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pizza</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
</head>
<body>
<header>
    <div class="registration">
        <?php
        if (empty($_COOKIE['username'])){
            ?>
            <!--                     <form action="javascript:autorization();">-->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="username">Логин:</label>
                <input type="text" name="username" id="username1" size="10">
                <label for="password">Пароль:</label>
                <input type="password" name="password" id="password1" size="10">
                <hr>
                <button class="enter-button" name="submit">войти</button>
                <a href="/pizzaproject/signup.php">Регистрация</a>
                <!--                         <div class = "error2" id = "error2"></div>-->
            </form>
            <?php
        }else {
            ?>
            <label>Вы вошли как: <?php echo $_COOKIE['username']; ?></label>
            <hr>
            <a href="exit.php"><button class="enter-button">Выйти</button></a>
            <?php
        }
        ?>
    </div>
    <div class="container">
        <div class="heading clearfix">
            <a href="/pizzaproject"><img src="img/logotype.png" alt="logotype" class="logo"></a>
            <nav>
                <ul class="menu">
                    <li>
                        <a href="/pizzaproject">Главная</a>
                    </li>
                    <li>
                        <a href="#">О нас</a>
                    </li>
                    <li>
                        <a href="#">Контакты</a>
                    </li>
                    <li>
                        <a href="/pizzaproject/cart.php">Список покупок</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>