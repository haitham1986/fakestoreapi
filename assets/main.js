$(document).ready(function() {
    $.ajax({
        type: 'GET',
        dataType: "json",
        url: 'https://fakestoreapi.com/products',
        success: function (data, status, xhr) {
            $('#main-products-loop').html('');
            $.each(data,function (i,item) {
                $('#main-products-loop').append(
                    '<div class="col-md-3 product-card" data-sort="'+i+'">' +
                    '<div class="card text-center mb-3">' +
                    '<img src="'+item.image+'" class="card-img-top" alt="'+item.title+'">' +
                    '<div class="card-body">' +
                    '<h6 class="card-title">'+item.title+'</h6>'+
                    '<h5 class="price">$'+item.price+'</h5>'+
                    '<a href="#" class="btn btn-primary product-show-details" ' +
                        'data-category="'+item.category+'"' +
                        'data-rating="'+item.rating.rate+'"' +
                        'data-image="'+item.image+'"' +
                        'data-title="'+item.title+'"' +
                        'data-price="'+item.price+'"' +
                        'data-id="'+item.id+'"' +
                        ' data-toggle="modal" data-target=".bd-example-modal-lg">Details</a>'+
                    '</div>'+
                    '</div>' +
                    '</div>'
                );
                sessionStorage.setItem('orders'[i],JSON.stringify(item));
            })
        }
    });
    $(document).on('click','.product-show-details',function (e){
        e.preventDefault();
        let product_id = $(this).data('id');
        let category= $(this).data('category');
        let rating= $(this).data('rating');
        let image= $(this).data('image');
        let title= $(this).data('title');
        let price= $(this).data('price');
        $('.bd-example-modal-lg').modal('show');
        $('.modal-title').html(title);
        $('.modal-category').html(category);
        $('.modal-rating').html(rating);
        $('.modal-price').html('$'+price);
        $('.modal-image').attr('src',image);
    })
    $(document).on('click','.close',function (e){
        e.preventDefault();
        $('.bd-example-modal-lg').modal('hide');
    });
    $(document).on('click','.product-card',function (e){
        e.preventDefault();
        let current = $(this).data('sort');
        let product = sessionStorage.getItem('orders'[current]);
        sessionStorage.setItem('sorted'[current],JSON.stringify(product));
        let sortedProducts = sessionStorage.getItem('sorted');
        alert('sorted');
        $(this).addClass('sorted');

    });
});