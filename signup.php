<?php require 'header.php'; ?>
<?php
    $dbc = mysqli_connect('localhost','root','','pizzaproject');

if(isset($_POST['signup_submit'])){
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    if(!empty($username) && !empty($password) && !empty($password2) && ($password == $password2)) {
        $query = "SELECT * FROM `user` WHERE username = '$username'";
        $data = mysqli_query($dbc, $query);
        if (mysqli_num_rows($data) == 0) {
            $query ="INSERT INTO `user` (username, password) VALUES ('$username', SHA('$password2'))";
            mysqli_query($dbc,$query);
            echo 'Всё готово, можете авторизоваться';
            mysqli_close($dbc);
            exit();
        }
        else {
            echo 'Логин уже существует';
        }

    }
}

?>
<body>
<section class="flour">
    <div class="container">
        <div class="content">
            <div class="signup">
                <h1>Регистрация</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD='POST'>
                    <label for="username">Введите ваш логин:</label>
                    <input type="text" name="username">
                    <label for="password">Введите ваш пароль:</label>
                    <input type="password" name="password">
                    <label for="password">Повторите пароль:</label>
                    <input type="password" name="password2">
                    <hr>
                    <button class="button-main" name="signup_submit">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
<?php require 'footer.php'; ?>
