$(function() {
    $('.addToCart').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id)
        let url = 'cart_controller.php'
        $.ajax({
            url: url,
            type: 'GET',
            data: {cart: 'add', id: id},
            dataType: 'json',
            success: function (res) {
                // console.log(res);
            },
            error: function (){
                // alert("Для того чтобы добавить товар в корзину, войдите или зарегистрируйтесь");
            }
        });
    });

    $('#orderBtn').on('click', function (e) {
        e.preventDefault();
        let url = 'cart_controller.php'
        $.ajax({
            url: url,
            type: 'GET',
            data: {cart: 'order'},
            success: function () {
                window.location.reload();
            }
        });
    });

    $('#deleteBtn').on('click', function (e) {
        e.preventDefault()
        let url = 'cart_controller.php'
        $.ajax({
            url: url,
            type: 'GET',
            data: {cart: 'delete'},
            success: function () {
                window.location.reload();
            },
            error: function (){
                alert("Error");
            }
        });
    });
});
