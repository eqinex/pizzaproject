<?php
session_start();
$username = $_POST["username1"];
$password = $_POST["password1"];

$host="localhost";//Подключение к бд
$user="root";
$pass="";
$db_name="pizzaproject";
$link=mysqli_connect($host,$user,$pass);
mysqli_select_db($db_name,$link);

$result = mysqli_query('SELECT username FROM user WHERE username = "' . $username . '"');
if(mysqli_num_rows($result) == 1){
    $result1 = mysqli_query('SELECT password FROM user WHERE username = "' . $username . '"');

    $result3 = mysqli_query('SELECT status FROM user WHERE username = "' . $username . '"'); //

    $result2 = mysqli_fetch_assoc($result1);
    $result2 = $result2['password'];

    $result_status = mysqli_fetch_assoc($result3);//
    $result_status = $result_status['status'];//

    if ($password == $result2){
        $error = "Вы успешно зашли!";
        $_SESSION['username'] = $username;
        $_SESSION['status'] = $result_status;
    }else{
        $error2 = "Неправильный пароль или логин!";
    }
}else{
    $error2 = "Пользователь не найден!";
}

echo json_encode(array("error"=>$error2));
?>