<?php require "header.php"; ?>
<?php if(isset($error)){echo $error;}?>
    <script type="text/javascript">
        function autorization()
        {
            $.ajax({
                type: 'POST',
                url: 'auth.php',
                dataType:'json',
                data: {username: $('#username1').val(), password: $('#password1').val()},

                success: function(data){

                    $('#error2').text(data.error).show().delay(2000).fadeOut(800);
                }
            });
            setTimeout(function enter(){ //переходная ссылка
                window.location.href = "/pizzaproject";}, 1000);

        }
    </script>
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

<?php require "footer.php"; ?>