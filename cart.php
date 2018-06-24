<?php require "header.php" ?>

<section class="menu-cart">
    <div class="darken-background">
        <div class="container">
            <div class="content">
                <div class="title-menu">
                    <h1>Список покупок</h1>
                </div>
                <div class="cart-list-block">
                    <div class="main-cart"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="menu-pizza">
    <div class="container">
        <div class="content">
            <div class="title-menu">
                <h1>Оформление заказа</h1>
            </div>
            <div class="order-section clearfix">
                <div class="email-field">
                    <div class="set"><label>Ваше имя</label><span> * </span><input type="text" id="ename" placeholder="Мазитов Тимур" size="40"></div>
                    <div class="set"><label>Email</label><span> * </span><input type="text" id="email" placeholder="temmaz@mail.ru" size="40"></div>
                    <div class="set"><label>Адресс</label><span> * </span><input type="text" id="eaddress" placeholder="ул. Московская д.1 кв.2" size="40"></div>
                    <div class="set"><label>Телефон</label><span> * </span><input type="text" id="ephone" placeholder="312312312" size="40"></div>
                    <hr>
                    <div class="set"><button class="button-main send-email">Заказать</button></div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="footer-block">
            <div class="footer-info">
                © 2018–<?php echo date('Y')?> Лучшая пицца в магнитогорске - это пицца от Тимура Мазитова!
            </div>
        </div>
    </div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
<script src="js/cart.js"></script>
</body>
</html>