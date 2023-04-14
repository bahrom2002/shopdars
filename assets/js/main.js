

$(document).ready(function (){
    $(".to-cart").on("click",function (){
        id = $(this).attr("product-id");


        $.ajax({
            url: "add-cart.php",
            type: 'GET',
           // dataType: 'json', //added data type
            data: {
                id: id
            },
            success: function (response) {
                $("#count-cart").html(response)

            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(errorThrown);
            }
        });

      });

    $(".count-number").on("change",function (){
        id = $(this).attr("product-id");
        count = $(this).val();

       $.ajax({
            url: "update-cart.php",
            type: 'GET',
            dataType: 'json', //added data type
            data: {
                id: id,
                count: count,
            },
            success: function(response) {
                console.log(response);
                var cart = JSON.parse(JSON.stringify(response));

                $("#count-cart").html(cart.count);
                $(".count-all").html(cart.count);
                $(".total").html(cart.total);

            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(errorThrown);
            }
        });

    });
});
