<?php
unset($_COOKIE['user_id']);
unset($_COOKIE['username']);
setcookie('user_id', '', -1, '/pizzaproject');
setcookie('username', '', -1, '/pizzaproject');
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/pizzaproject';
header('Location: '. $home_url);
?>
<?php
//
//if    (empty($_COOKIE['username']))
//{
//    //если не существует сессии с логином и паролем, значит на    этот файл попал невошедший пользователь. Ему тут не место. Выдаем сообщение    об ошибке, останавливаем скрипт
//    exit ("Доступ на эту страницу разрешен только зарегистрированным пользователям. Если вы зарегистрированы, то войдите на сайт под своим логином и паролем<br>
//<a href='/index.php'>Главная страница</a>");
//}
//
//unset($_COOKIE['password']);
//unset($_COOKIE['username']);
//unset($_COOKIE['status']);
////unset($_SESSION['id']);//    уничтожаем переменные в сессиях
//exit("<html><head><meta http-equiv='Refresh' content='0;    URL=/'></head></html>");
//// отправляем пользователя на главную страницу.
//?>
