<?php require "header.php"; ?>

    <section class="view-pizza">
        <div class="darken-background">
            <div class="container">
                <div class="content">
                    <div class="description-view-block">
                        <div class="text-view">
                            Приходите к нам!<br>Вам рады всегда!
                        </div>
                        <div class="pizza-view">
                            <img src="img/neapolitana.png" alt="pizza-view" height="490px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="menu-pizza">
        <div class="container">
            <div class="content">
                <div class="title-menu">
                    <h1>Меню</h1>
                </div>
                <div class="cart-block clearfix">
                    <div class="goods-out"></div>
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
                <a href="/pizzaproject/cart.php">
                    <div class="cart-info">
                        Корзина:
                        <div class="mini-cart"></div>
                    </div>
                </a>
            </div>
        </div>
    </footer>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    </body>
    </html>