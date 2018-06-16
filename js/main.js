var $ = jQuery.noConflict();

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
        out += `<img src="img/${data[key].img}" alt="">`;
        out += `<div class="cost"><i class="fas fa-ruble-sign fa-sm"></i><span style="margin-left: 10px;">${data[key].cost}</span></div>`;
        out += `<p class="name">${data[key].name}</p>`;
        out +='<hr>';
        out += `<div class="description">${data[key].description}</div>`;
        out += '<button class="add-to-cart">Купить</button>';
        out += '</div>';
    }
    $('.goods-out').html(out);
}

$(document).ready(function () {
    init();
})