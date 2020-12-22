$( document ).ready(function() {



    $(document).on('change', '.option-click', function(){
        id = $(this).val();
        
        getOption(id);
    })
    function getOption(id) {
        var option = '';
        $.ajax({
            url :'/manage/option/'+ id,
            success: function(response) {
                if( response.messages == "success") {
                    $.each(response.data, function(key, value) {
                        option += '<div class="form-group col-md-8">' +
                        value.title +
                        '</div>' +
                        '<div class="form-group col-md-2">'+
                            '<a href="/manage/option/delete/'+ value.id +'?option='+ response.position +'">Xoá</a>'+
                        '</div>'+
                        '<div class="form-group col-md-2">'+
                            '<a href="/manage/option/edit/'+ value.id +'?option='+ response.position +'">Sửa</a>'+
                        '</div>';
                    })
                    $('.list-option').html(option);
                }
            }
        })
    }
    $(document).on('change', '.form-control', function(){
        var id = $(this).val();
        category(id);
    })

    function category(id) {
        var childrent_category = '';
        $.ajax({
            url:'/manage/danh-muc/api/'+ id,
            success: function(response ) {
                if( response.messages == 'success') {
                    childrent_category += '<div class="form-group col-md-8">'+
                    response.data.title +
                    '</div>'+
                    '<div class="form-group col-md-2">'+
                        '<a href="/manage/danh-muc/edit/show/'+ response.data.id +'">Edit</a>'+
                    '</div>'+
                    '<div class="form-group col-md-2">'+
                        '<a href="/manage/danh-muc/delete/'+ response.data.id +'">Delete</a>'+
                    '</div>';
                    $.each( response.data.childrent, function(key, value) {
                        childrent_category += '<div class="form-group col-md-8">'+
                            value.title +
                            '</div>'+
                            '<div class="form-group col-md-2">'+
                                '<a href="/manage/danh-muc/edit/show/'+ value.id +'">Edit</a>'+
                            '</div>'+
                            '<div class="form-group col-md-2">'+
                                '<a href="/manage/danh-muc/delete/'+ value.id +'">Delete</a>'+
                            '</div>'
                    });
                    
                $('.category_childrent').html(childrent_category);
                }
            }
        })
    }


    //click api category childrent
    $(document).on('change', '.parent-category', function(){
        var id = $(this).val();
        chidlrent_category(id)
    })

    function chidlrent_category(id) {
        var chilrent = '';
        $.ajax({
            url: '/manage/danh-muc/api/'+ id,
            success: function(response) {
                if( response.messages == "success") {
                    $.each(response.data.childrent, function(key, value){
                        chilrent += '<option value="'+value.id +'">'+value.title +'</option>';
                    })
                    $('.childrent-category').html(chilrent);
                }
            }
        })
    }
    $(document).on('click', '.parent-category', function() {
        if( document.getElementById('parent-category').checked ) {
            $( ".childrent-category" ).prop( "disabled", true );
        }
        else {
            $( ".childrent-category" ).prop( "disabled", false );
        }
    }) 
    if( document.getElementById('parent-category').checked ) {
        $( ".childrent-category" ).prop( "disabled", true );
    }
});