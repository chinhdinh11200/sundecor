
$(document).ready(function() {

    function genSession() {
        let session = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
          });
        return session;
    }
    if(localStorage.getItem('session_id')){
        var session_id = localStorage.getItem('session_id')
    }else {
        var session_id = genSession();
        localStorage.setItem('session_id', session_id);
    }

    if($('#cartQuantity').text() == 0) {
        fetch(`/cart_quantity?session_id=${session_id}`)
        .then((res) => res.json())
        .then((data) => {
            $('#cartQuantity').html(data);
        })
    }

    const session_ids = document.getElementsByName("session_id")
    session_ids.forEach(element => {
        element.value = session_id
    });

    $('#updateCart').click(function () {
        const carts = document.getElementsByName("cart_id");
        const cartUpdate = [];
        carts.forEach(cart => {
            const cart_id = cart.value;
            const quantity = document.getElementById(`quantity${cart.value}`).value;
            cartUpdate.push({
                quantity,
                cart_id
            })
        });
        console.log(cartUpdate);
        $.ajax({
            method: "post",
            url: "/cart_update",
            data: {
                _token: $("[name=_token]").attr("value"),
                session_id,
                cartUpdate
            },
            success: function (response) {
                location.reload();
            }
        });
    });


    $('#order').click(function (e) {
        localStorage.removeItem('session_id');
    });

})

