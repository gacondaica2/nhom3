$(document).ready(function() {
    Cart();
    $(document).on('click' , '.cart-plus-item', function() {
        var id =$(this).data('id')
        addToCartPlus(id)
    })

    $(document).on('click','.add-to-cart', function(){
        var id = $(this).data('id');
        AddtoCart(id);
    })

    $(document).on('click','.remove-item-cart', function(){
        var r = confirm('Bạn muốn xoá sản phẩm này khỏi giỏ hàng!')
        if( r == true) {
                
            var id = $(this).data('id');
            RemoveItemCart(id);
        }
    })

    function Cart() {
        var cart = "";
        $.ajax({
            url: '/home/api/cart',
            success : function(response) {
                if( response.messages === "success") {
                    $.each(response.item , function(key, value) {
                        cart += '<li class="minicart-product">'+
                        '<a class="product-item_remove remove-item-cart" data-id="'+ value.id +'"><i class="ion-android-close"></i></a>' +
                        '<div class="product-item_img">' +
                            '<img src="'+ value.attributes.img +'" alt="Kenne s Product Image">' +
                        '</div>' +
                        '<div class="product-item_content">' +
                            '<a class="product-item_title" href="shop-left-sidebar.html">'+ value.name+'</a>' +
                            '<span class="product-item_quantity">'+ value.quantity+' x '+ new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(value.price)+'₫</span>' +
                        '</div>' +
                    '</li>'
                    });
                    $('.minicart-list').html(cart);
                    $('.ammount').html(new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(response.total)+"₫");
                    $('.item-count').html(response.quantity);
                }
            }
        })
    }    
    
    function RemoveItemCart(id) {
        var cart = "";
        $.ajax({
            url: '/home/api/cart/delete/'+ id,
            success : function(response) {
                if( response.messages === "success") {
                    if(response.item !== 0) {
                        $.each(response.item , function(key, value) {
                            cart += '<li class="minicart-product">'+
                            '<a class="product-item_remove remove-item-cart" data-id="'+ value.id +'"><i class="ion-android-close"></i></a>' +
                            '<div class="product-item_img">' +
                                '<img src="'+ value.attributes.img +'" alt="Kenne s Product Image">' +
                            '</div>' +
                            '<div class="product-item_content">' +
                                '<a class="product-item_title" href="shop-left-sidebar.html">'+ value.name+'</a>' +
                                '<span class="product-item_quantity">'+ value.quantity+' x '+ new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(value.price) +'₫</span>' +
                            '</div>' +
                        '</li>'
                        });
                        $('.minicart-list').html(cart);
                    }
                    else {
                        $('.minicart-list').html("");
                    }
                    $('.ammount').html(new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(response.total)+"₫");
                    $('.item-count').html(response.quantity);
                }
            }
        });
        
    }

    function AddtoCart(id) {
        var cart = "";
        $.ajax({
            url: '/home/danh-muc/cart/add/'+ id,
            success : function(response) {
                if( response.messages === "success") {
                    $.each(response.item , function(key, value) {
                        cart += '<li class="minicart-product">'+
                        '<a class="product-item_remove remove-item-cart" data-id="'+ value.id +'"><i class="ion-android-close"></i></a>' +
                        '<div class="product-item_img">' +
                            '<img src="'+ value.attributes.img +'" alt="Kenne s Product Image">' +
                        '</div>' +
                        '<div class="product-item_content">' +
                            '<a class="product-item_title" href="shop-left-sidebar.html">'+ value.name+'</a>' +
                            '<span class="product-item_quantity">'+ value.quantity+' x '+ new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(value.price) +'₫</span>' +
                        '</div>' +
                    '</li>'
                    });
                    $('.minicart-list').html(cart);
                    $('.ammount').html(new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(response.total)+"₫");
                    $('.item-count').html(response.quantity);
                }
            }
        })
    }

    $(document).on('click' , '.cart-mines-item', function() {
        var id =$(this).data('id')
        minesItemCart(id)
    })

    function addToCartPlus(id) {
        $.ajax({
            url: '/home/danh-muc/cart/plus/' + id,
            success: function(response) {
               
            }
        })
    }

    $(document).on('change', '.province', function(){       
        id = $(this).val();
        disTrict(id);
    })

    $(document).on('change', '.district', function(){       
        id = $(this).val();
        ward(id);
    })
    function disTrict(id) {
        var district = ""
        $.ajax({
            url: '/home/cart/checkout/district/' + id,
            success: function(response) {
                console.log(response.data)
               if( response.messages === "success") {
                   $.each( response.data , function(key, value ) {
                    district += '<option value="'+ value.id +'" data-id="'+ value.id +'">'+ value.name +'</option>';  
                   })
                   $('.district').html(district);
               }
            }
        })
    }

    function ward(id) {
        var ward = ""
        $.ajax({
            url: '/home/cart/checkout/ward/' + id,
            success: function(response) {
                console.log(response.data)
               if( response.messages === "success") {
                   $.each( response.data , function(key, value ) {
                    ward += '<option value="'+ value.id +'" data-id="'+ value.id +'">'+ value.name +'</option>';  
                   })
                   $('.ward').html(ward);
               }
            }
        })
    }

    function minesItemCart(id) {
        $.ajax({
            url: '/home/danh-muc/cart/mines/' + id,
            success: function(response) {
            }
        })
    }
})