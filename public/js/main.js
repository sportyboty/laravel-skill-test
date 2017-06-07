$(document).ready(function () {

    const app = document.querySelector('tbody');
    const tableMsg = document.querySelector('#tableMsg');
    const action =  document.querySelector('form');

    const url = action.getAttribute('action');

    const fetch = function () {

        $.get(url, function (response) {

            let statusHTML = '';
            if (response.length === 0) {
                tableMsg.innerText = "There is no product entry";
            }
            else {
                $.each(response, function (index, product) {
                    statusHTML += '<tr>';
                    statusHTML += '<td>' + product.id + '</td>';
                    statusHTML += '<td>' + product.product_name + '</td>';
                    statusHTML += '<td>' + product.quantity_in_stock + '</td>';
                    statusHTML += '<td>' + product.price_per_item + '</td>';
                    statusHTML += '<td>' + product.created_at + '</td>';
                    statusHTML += '<td>' + product.total_value_numbers + '</td>';

                    statusHTML += '<td>' + '<a href="/products/' + product.id + '/edit">' +
                        '<button type="button" class="btn btn-default">Edit</button>' +
                        '</a>' + '</td>';

                    statusHTML += '</tr>';
                });
            }
            app.innerHTML = statusHTML;
        });
    };

    const form = $("#myForm");


    $('#bt').on('click', function (e) {

        e.preventDefault(e);


        $.ajax({

            type: "POST",
            url: url,
            data: form.serialize(),
            success: function (data) {
                console.log(data);

                let success = document.querySelector('#message');
                success.innerText = "You have successfully saved the data";
                // $("#success").val('You have successfully saved the data');
                fetch();
            },
            error: function (data) {
                let error = document.querySelector('#message');
                error.innerText = "Data submission has failed";
            }
        });
    });

    fetch();

});