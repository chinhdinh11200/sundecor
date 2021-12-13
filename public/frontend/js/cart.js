
$(document).ready(function() {
    function genSession() {
        let session = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
          });
        return session;
    }

    var session_id = localStorage.getItem('session_id') ? localStorage.getItem('session_id') : genSession();

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
        $.ajax({
            method: "post",
            url: "/cart_update",
            data: {
                _token: $("[name=_token]").attr("value"),
                session_id,
                cartUpdate
            },
            success: function (response) {
                // location.reload();
            }
        });
    });


    // $('#order').click(function (e) {
    //     e.preventDefault();
    //     // console.log($("[name=session_id]"));

    //     const carts = document.getElementsByName("cart_id");
    //     console.log($("[name=_token]").attr("value"));
    //     const bills = [];
    //     carts.forEach(cart => {
    //         const cart_id = cart.value;
    //         const quantity = document.getElementById(`quantity${cart.value}`).value;
    //         bills.push({
    //             quantity,
    //             cart_id
    //         })
    //     });

    //     console.log(bills);

    //     $.ajax({
    //         method: "post",
    //         url: "/bill_update",
    //         data: {
    //             _token: $("[name=_token]").attr("value"),
    //             session_id,
    //             bills
    //         },
    //         success: function (response) {
    //             // location.reload();
    //         }
    //     });

    // });
})

