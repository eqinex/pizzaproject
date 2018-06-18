var cart = {};

function loadCart(){
    //если запись в localStorage
    if (localStorage.getItem('cart')){
        //если да - расшифровываем и записываем в переменную cart
        cart = JSON.parse(localStorage.getItem('cart')); // расшифровка обратно в массив
        showCart();
    }else{
        $('.main-cart').html('Ваш список покупок пуст!');
    }
}

function showCart() {
    //вывод корзины
    if (!isEmpty(cart)){
        $('.main-cart').html('Ваш список покупок пуст!');
    }else {
        $.getJSON('goods.json', function (data) {
            var goods = data;
            var out = '';
            //перебор корзины , id - товар
            for (var id in cart) {
                out += '<div class="paragraph-main-cart">';
                out += '<div class="delete-goods"><i class="fas fa-trash-alt fa-xs del-goods" data-id="' + id + '"></i></div>';
                out += '<div class="name-in-main-cart">' + goods[id].name + '</div>';
                out += '<div class="img-in-main-cart"><img src="img/' + goods[id].img + '"></div>';
                out += '<div class="cost-in-main-cart">'+cart[id]*goods[id].cost+'<i class="fas fa-ruble-sign fa-xs"></i></div>';
                out += '<div class="buttons-paragraph"><i class="fas fa-plus-square fa-xs plus-goods" data-id="' + id + '"></i>';
                out += '<i class="fas fa-minus-square fa-xs minus-goods" data-id="' + id + '"></i></div>';
                out += '<div class="count-in-main-cart">' + cart[id] + '<span class="in-show-cart">Шт.</span></div>';
                out += '</div>';
                out += '<hr>';
            }
            $('.main-cart').html(out);
            $('.del-goods').on('click', delGoods);
            $('.plus-goods').on('click', plusGoods);
            $('.minus-goods').on('click', minusGoods);
        })
    }
}

//удаление товара из корзины
function delGoods() {
    var id = $(this).attr('data-id'); //получаем ид по которому кликнули
    delete cart[id]; //удаяем
    saveCart(); //сохраняем состояние в localStorage
    showCart(); //перерисовываем
}

//добавление
function plusGoods() {
    var id = $(this).attr('data-id'); //получаем ид по которому кликнули
    cart[id]++;
    saveCart(); //сохраняем состояние в localStorage
    showCart(); //перерисовываем
}

//уменьшение
function minusGoods() {
    var id = $(this).attr('data-id'); //получаем ид по которому кликнули
    if (cart[id] == 1){
        delete cart[id];
    }else{
        cart[id]--;
    }
    saveCart(); //сохраняем состояние в localStorage
    showCart(); //перерисовываем
}

function saveCart() {
    //сохранение корзины в localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

}

//проверка корзины на пустоту
function isEmpty(object) {
    for (var key in object)
        if(object.hasOwnProperty(key)) return true;
    return false;
}

function sendEmail() {
    var ename = $('#ename').val();
    var email = $('#email').val();
    var ephone = $('#ephone').val();
    if (ename != '' && email != '' & ephone != '') {
        if (isEmpty(cart)){
            $.post(   //ajax запрос на серв
                "core/mail.php",
                {

                    "ename" : ename,
                    "email" : email,
                    "ephone" : ephone,
                    "cart" : cart
                },
                function (data) {
                    // console.log(data);
                    if (data == 1) {
                        alert('Заказ отправлен');
                    }else{
                        alert('Повторите заказ!');
                    }
                }
            );
        }else{
            alert('Пуста корзина');
        }
    }else{
        alert('Заполните поля');
    }
}

$(document).ready(function () {
    loadCart();
    $('.send-email').on('click', sendEmail); //отправка письма с заказом
});