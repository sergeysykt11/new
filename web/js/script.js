$('#show-menu').click(function(){
  $('#left-menu').slideToggle(200);
});



function showCart(cart){
    $('#cart-modal .modal-body').html(cart);
    $('#cart-modal').modal();
}

function showProduct(cart){
    $('#product-modal .modal-body').html(cart);
    $('#product-modal').modal();
}

$('#orders-share').change(function (e) {
   var id = $(this).val();
    $.ajax({
        url: '/share/get-gift',
        data: {id: id},
        type: 'GET',
        beforeSend: function() {
            $('#loading').css('display', 'block');
        },
        success: function(res){
            $('#loading').css('display', 'none');
            if(res) $('#gift-product').css('display', 'block');
            else $('#gift-product').css('display', 'none');
        },
        error: function(res){
            alert('Error');
        }
    });
});


$(document).on('click', '.del-item-insrip', function(e){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item-insrip',
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Надписи не существует');
            showCart(res);
            updateSumInHeader(res);
        },
        error: function(res){
            alert('Error');
        }
    });
});

$(document).on('click', '.del-item-decor', function(e){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item-decor',
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Вида не существует');
            showCart(res);
            updateSumInHeader(res);
        },
        error: function(res){
            alert('Error');
        }
    });
});

$(document).on('click', '.del-item', function(e){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Продукта нет в корзине');
            showCart(res);
            updateSumInHeader(res);
        },
        error: function(res){
            alert('Error');
        }
    });
});

$(document).on('click', '.add-item', function(e) {
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/add',
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Данного товара не существует');
            showCart(res);
            updateSumInHeader(res);
        },
        error: function(res){
            alert('Error');
        }
    });
});

function updateSumInHeader(res) {
    var reg = '<td id="all-price-product">(.*)</td>';
    var code = String(res.match(reg));
    var price = code.substring(code.indexOf(',')+1);
    if(price === 'null') price = 0;
    $('#all-sum').html(price);
}

$(document).on('click', '#go-to-bask', function (e) {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка');
            showCart(res);
            updateSumInHeader(res);
        },
        error: function(res){
            alert('Ошибка');
        }
    });
});

$(document).on('click', '.open-cart', function (e) {
    $('.close').click();
    $('#go-to-bask').click();
});

$(document).on('click', '.all-info', function (e) {
    e.preventDefault();
    var id = $(this).attr('id');
    $.ajax({
        url: '/product/view',
        type: 'GET',
        data: {id: id},
        success: function(res){
            if(!res) alert('Ошибка');
            showProduct(res);
        },
        error: function(res){
            console.log(res);
        }
    });
});

$(document).on('click', '.minus-item', function(e) {
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/minus',
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Данного товара не существует');
            showCart(res);
            updateSumInHeader(res);
        },
        error: function(res){
            alert('Error');
        }
    });
});

function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка');
            showCart(res);
            updateSumInHeader(res);
        },
        error: function(res){
            alert('Ошибка');
        }
    });
}

$(document).on('click', '.add-to-car', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var inscription = $('#inscription-product').val();
    var decor = $("#decor").val();
    if(!decor) decor = 1;
    $("#decor").val(1);
    $('#inscription-product').val('');
        $.ajax({
            url: '/cart/add',
            data: {
                id: id,
                inscription: inscription,
                decor: decor
            },
            type: 'GET',
            success: function (res) {
                if (!res) alert('Данного товара не существует');
                if (res == 'no-cart') {
                    alert('Корзина на данный момент не работает');
                 } else if(res == 'big-text'){
                    alert('Надпись должна содержать до 20 символов');
                } else {
                    alert('Товар добавлен!');
                    updateSumInHeader(res);
                }
            },
            error: function (res) {
                console.log(res);
                alert('Error');
            }
        });
});