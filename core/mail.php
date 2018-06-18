<meta charset="utf-8">
<?php
// читка jsonа

$json = file_get_contents('../goods.json');
$json = json_decode($json, true); //декордирование

//письмо
$message = '';
$message .= '<h1>Заказ в пицерии</h1>';  //конкотенируеум строку, добваляем в письмо
$message .= '<p>Телефон: '.$_POST['ephone'].'</p>';
$message .= '<p>Почта: '.$_POST['email'].'</p>';
$message .= '<p>Клиент: '.$_POST['ename'].'</p>';

$cart = $_POST['cart'];
$sum = 0;
//id - id товара $count - кол во
foreach ($cart as $id=>$count) {
    $message .= $json[$id]['name'].'----';
    $message .= $count.'----';
    $message .= $count*$json[$id]['cost'];
    $message .= '<br>';
    $sum = $sum + $count*$json[$id]['cost'];
}
$message .= 'Всего: '.$sum.' рублей'.'<br>';

print_r($message);

$to = 'temmaz@mail.ru'.',';  //мой мейл и указываю, кому еще
$to .= $_POST['email']; //копия письма
$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>'; //хтмл письмо
//посылаем заголовки
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

//отправка
$m = mail($to, 'Заказ в магазине', $spectext.$message.'</body></html>', $headers);

if ($m) { echo 'Сообщение отправлено'; } else { echo 'Сообщение не отправлено'; }