$(document).ready(function() {
    $(document).on("change",".myniceselect",function() {
        value = $(".myniceselect").val();
        var sort = [{'type':"title","orderBy": 'asc'},
            {'type':"title","orderBy": 'desc'},
            {'type':"price","orderBy": 'asc'},
            {'type':"price","orderBy": 'desc'}
        ]
        data = sort[value]
        category(data)
    });
    function category(data) {        
        title = $('.title-category').val();
        var items = "";
        $.ajax({
            url: '/danh-muc/api/' + title,
            data: data,
            success : function(response) {
                if( response.message === "success" && response.records.data.length > 0) {
                    $.each( response.records.data, function(key, item) {
                        items += 
                        '<div class="col-lg-4 col-md-4 col-sm-6">' +
                            '<div class="product-item">' +
                                '<div class="single-product">' +
                                    '<div class="product-img">' +
                                        '<a href="single-product.html">' +
                                            '<img width="300px" height="300px" class="primary-img" src="'+ item.img +'" alt="Kenne s Product Image">' +
                                        '</a>' +
                                        ((item.price_sale > 0 && item.price_sale < item.price) ? 
                                        ('<span class="sticker">-' + Math.round( (item.price - item.price_sale) / item.price * 100 )+'%</span>'): "")+
                                        '<div class="add-actions">' +
                                            '<ul>' +
                                                '<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>' +
                                                '</li>' +
                                                '<li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>' +
                                                '</li>' +
                                                '<li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i class="ion-ios-reload"></i></a>' +
                                                '</li>' +
                                                '<li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>' +
                                                '</li>' +
                                            '</ul>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="product-content">' +
                                        '<div class="product-desc_info">' +
                                            '<h3 class="product-name"><a href="single-product.html">'+ item.title + '</a></h3>'+
                                            '<div class="price-box">' +
                                                (( item.price_sale > 0 && item.price_sale < item.price ) ? (
                                                '<span class="new-price">'+ new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(item.price_sale) + '₫</span>') : "" )+
                                                '<span class="old-price">'+ new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(item.price) + '₫</span>' +
                                            '</div>' +
                                            '<div class="rating-box">' +
                                                '<ul>' +
                                                    '<li><i class="ion-ios-star"></i></li>' +
                                                    '<li><i class="ion-ios-star"></i></li>' +
                                                    '<li><i class="ion-ios-star"></i></li>' +
                                                    '<li class="silver-color"><i class="ion-ios-star-half"></i></li>' +
                                                    '<li class="silver-color"><i class="ion-ios-star-outline"></i>' +
                                                    '</li>' +
                                                '</ul>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="list-product_item">' +
                                '<div class="single-product">' +
                                    '<div class="product-img">' +
                                        '<a href="single-product.html">' +
                                            '<img width="300px" height="300px" src="'+ item.img +'" alt="Kennes Product Image">' +
                                        '</a>' +
                                    '</div>' +
                                    '<div class="product-content">' +
                                        '<div class="product-desc_info">' +
                                            '<div class="price-box">' +
                                            (( item.price_sale > 0 && item.price_sale < item.price ) ? (
                                            '<span class="new-price">'+ new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(item.price_sale) + '₫</span>' ): "")+
                                            '<span class="old-price">'+ new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(item.price) + '₫</span>' +
                                            '</div>' +
                                            '<h6 class="product-name"><a href="single-product.html">'+ item.title + '</a></h6>' +
                                            '<div class="rating-box">' +
                                                '<ul>' +
                                                    '<li><i class="ion-ios-star"></i></li>' +
                                                    '<li><i class="ion-ios-star"></i></li>' +
                                                    '<li><i class="ion-ios-star"></i></li>' +
                                                    '<li class="silver-color"><i class="ion-ios-star-half"></i></li>' +
                                                    '<li class="silver-color"><i class="ion-ios-star-outline"></i>' +
                                                   ' </li>' +
                                                '</ul>' +
                                            '</div>' +
                                            '<div class="product-short_desc">' +
                                                '<p>'+ item.content + '</p>' +
                                            '</div>' +
                                        '</div>'+
                                        '<div class="add-actions">'+
                                            '<ul>'+
                                                '<li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>'+
                                                '</li>'+
                                                '<li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>'+
                                                '</li>'+
                                                '<li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>'+
                                                '</li>'+
                                                '<li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>'+
                                                '</li>'+
                                            '</ul>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    });
                }
                
                $('.shop-product-wrap').html(items)
            }
        })
    }

    $(document).on('click', '.ion-ios-search', function() {
        var data = {
            'data' : $('.search-item').val()
        };
        search(data);
    })

    function search(data) {
        $.ajax({
            url: '/search/',
            data : data,
            success : function(response) {
                alert(ok)
            }
        })
    }
})