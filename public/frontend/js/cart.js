
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

    console.log(session_id);

    fetch(`/cart_quantity?session_id=${session_id}`)
            .then(res => res.json())
            .then((data) => {
                $('#cartQuantity').html(data)
            })

    const session_ids = document.getElementsByName("session_id")
    session_ids.forEach(element => {
        element.value = session_id
    });

    $('#updateCart').click(function () {
        // console.log($("[name=session_id]").attr('value'));

        const carts = document.getElementsByName("cart_id");
        // console.log($("[name=_token]").attr("value"));
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
        // e.preventDefault();
        localStorage.removeItem('session_id');
    });

    // function getCartQuantity() {
    //     console.log("test");
    //     $.ajax({
    //         method: "GET",
    //         url: "/cart_quantity",
    //         data: {
    //             session_id: session_id,
    //         },
    //         dataType: "dataType",
    //         success: function (response) {
    //             console.log(response);
    //         }
    //     });
    // }
    // const cartDeletes = document.getElementsByName('cartDelete');

    // for (let i = 0; i < cartDeletes.length; i++) {
    //     $(cartDeletes[i]).click(function (e) {
    //         $.ajax({
    //             method: "POST",
    //             url: "/cart_delete",
    //             data: {
    //                 cart_id : $(cartDeletes[i]).attr('data-id'),
    //                 session_id: session_id,
    //                 _token: $('[name=_token]').attr('value'),
    //             },
    //             dataType: "dataType",
    //             success: function (response) {
    //                 console.log(response);
    //                 location.reload();
    //             }
    //         });
    //     })
    // }
})

