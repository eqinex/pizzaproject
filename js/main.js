var $ = jQuery.noConflict();

var cart = {}; //корзина
function init() {
    //читка файла
    $.getJSON("goods.json", goodsOut);
}

function goodsOut(data) {
    //вывод товаров на стр
    console.log(data);
    var out='';
    for (var key in data){
        out += '<div class="cart">';
        out += '<img src="img/'+data[key].img+'" alt="">';
        out += '<div class="cost"><i class="fas fa-ruble-sign fa-sm"></i><span style="margin-left: 10px;">'+data[key].cost+'</span></div>';
        out += '<p class="name">'+data[key].name+'</p>';
        out +='<hr>';
        out += '<div class="description">'+data[key].description+'</div>';
        out += '<button class="add-to-cart" data-id="'+key+'">Купить</button>';
        out += '</div>';
    }
    $('.goods-out').html(out);
    $('.add-to-cart').on('click', addToCart);
}

function addToCart(){
    //товар в корзину
    var id = $(this).attr('data-id');
    // console.log(id);
    if (cart[id] == undefined){
        cart[id] = 1; //если в корзине нет товара, то делаем равным 1
    }else{
        cart[id]++; //если товар есть - увеличиваем на 1
    }
    // console.log(cart);
    showMiniCart();
    saveCart();
}

function saveCart() {
    //сохранение корзины в localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

}

function showMiniCart() {
    var out='';
    for (var key in cart){
        out += key + '----' + cart[key] + '<br>';
    }
    $('.mini-cart').html(out);
}

//чтобы при обновлении стр не пропадали наши покупки
function loadCart(){
    //если запись в localStorage
    if (localStorage.getItem('cart')){
        //если да - расшифровываем и записываем в переменную cart
        cart = JSON.parse(localStorage.getItem('cart')); // расшифровка обратно в массив
        showMiniCart();
    }
}

$(document).ready(function () {
    init();
    loadCart();
});