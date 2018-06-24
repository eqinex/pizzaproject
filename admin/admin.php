<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
</head>
<body>
<header>
    <div class="container">
        <div class="heading clearfix">
            <a href="/pizzaproject"><img src="../img/logotype.png" alt="logotype" class="logo"></a>
            <div class="admin-dashboard">
                Панель администратора
            </div>
        </div>
    </div>
</header>
<section class="menu-admin">
    <div class="container">
        <div class="content">
            <div class="title-menu">
                <h1>Товар</h1>
            </div>
            <div class="order-section clearfix">
                <form enctype='multipart/form-data'>
                    <div class="email-field">
                        <div class="goods-out"></div>
                        <div class="set"><label>Имя: </label><input type="text" id="gname" size="20"></div>
                        <div class="set"><label>Стоимость: </label><input type="text" id="gcost" size="20"></div>
                        <div class="set"><label>Описание: </label><textarea id="gdescr"></textarea></div>
                        <div class="set"><label>Изображение: </label><input type="text" id="gimg" size="20"></div>
                        <div class="set"><label>Порядок: </label><input type="text" id="gorder" size="20"></div>
                        <input type="hidden" id="gid">
                        <hr>
                        <div class="set"><button class="button-main add-to-db">Обновить</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/admin.js"></script>
</body>
</html>
