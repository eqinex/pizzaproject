var cart = {};

function loadCart(){
    //если запись в localStorage
    if (localStorage.getItem('cart')){
        //если да - расшифровываем и записываем в переменную cart
        cart = JSON.parse(localStorage.getItem('cart')); // расшифровка обратно в массив
        showCart();
    }else{
        $('.main-cart').html('Вы не выбрали ни одной нашей вкусняшки!');
    }
}

function showCart() {
    //вывод корзины
    if (!isEmpty(cart)){
        $('.main-cart').html('Вы не выбрали ни одной нашей вкусняшки!');
    }else {
        $.getJSON('goods.json', function (data) {
            var goods = data;
            var out = '';
            //перебор корзины , id - товар
            for (var id in cart) {
                out += '<i class="fas fa-trash-alt fa-xs del-goods" data-id="' + id + '"></i>';
                out += '' + goods[id].name + '';
                out += '' + cart[id] + '';
                out += '<img src="img/' + goods[id].img + '">';
                out += '<hr>'
            }
            $('.main-cart').html(out);
            $('.del-goods').on('click', delGoods);
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

$(document).ready(function () {
    loadCart();
});