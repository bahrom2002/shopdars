
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
});
