@extends('root')
@section('browserTitle')
    Home
@stop


@section('css')
    <style>

        .row-margin-top {
        }

        .total-price-div {
            margin-bottom: 50px;
        }

        .inner-div h1 {
            text-align: center;
            font-weight: bold;
            font-size: 60px;
            color: white;
            margin-top: 110px;

        }

        .outer-div {
            margin-top: 50px;
            height: 300px;
            border: 2px solid rgba(0, 128, 0, 0);
            width: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/images/posters2.jpg');
            background-size: cover;

        }

        tbody tr, thead {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            background-color: white;
        }

        .img-candy-outer {
            width: 300px;
        }

        .img-candy {
            height: 200px;
        }


        .view img {
            height: 200px;
            margin: 0 auto;
        }


    </style>
@stop



@section('outsideContainer')
    <div class="outer-div">
        <div class="inner-div">
            <h1>Shopping Cart</h1>
        </div>
    </div>

@stop


@section('content')

    <div class="row row-margin-top">


        <!--Movies table-->
        <div class="table-responsive movie">
            <table class="table product-table">
                <!--Table head-->
                <thead>
                <tr>
                    <th></th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>QTY</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
                </thead>


                <!--/Table head-->

                <!--Table body-->
                <tbody>

                </tbody>
                <!--/Table body-->
            </table>
        </div>


        @if(isset($emptySession))
            <h1>The Shopping Cart is Empty</h1>
        @elseif(\Rsubscribe\auth\LoggedIn::user() && !isset($items))
            <h1>The Shopping Cart is Empty</h1>
        @endif





    <!--Candy table-->
        <div class="table-responsive candy">

            @if(isset($startPriceFromStore))
                <input id="startPrice" type="hidden" value="{{$startPriceFromStore}}">
            @endif
            <table class="table product-table">

                <!--Table body-->
                <tbody>
                @if(isset($items))
                    @foreach($items as $item)
                        <tr>
                            <th scope='row'>
                                <div class="view img-candy-outer">
                                    <img src=" {{ $item->image}}" alt="" class='img-candy img-fluid cart-poster'>
                                </div>
                            </th>

                            <td>
                                <h5><strong> {{ $item->name}} </strong></h5>
                            </td>

                            <td><span class='price'> {{ $item->price}} </span>:-
                            </td>


                            <td>
                                <div class='btn-group cart-up-down' data-toggle='buttons'>

                                    <button type='button' value='-' class='qtyminus btn btn-primary'
                                            data-field="{{$item->id}}">-
                                    </button>

                                    <button type='button' value='+' class='qtyplus btn btn-primary'
                                            data-field="{{$item->id}}">+
                                    </button>

                                    <input type='text'
                                           name="{{$item->id}}" value='1'
                                           class='qty'/>
                                </div>
                            </td>


                            <td>
                                <span class='amount'>{{$item->price}}</span>:-

                            </td>

                            <td>
                                <button type='button' class='btn btn-sm remove-item js-delete' data-toggle='tooltip'
                                        data-placement='top' title='Remove item' data-category-id="1"
                                        data-movie-id="{{$item->id}}">X
                                </button>
                            </td>
                        </tr>

                    @endforeach
                @endif
                </tbody>
                <!--/Table body-->
            </table>

        </div>
        <!--/Shopping Cart table-->


        <div class="total-price-div">
            <p class="total-price-text">Total: <span id="totalPrice"></span>:-</p>
            <button class="btn btn-success">Checkout</button>
        </div>


    </div>








@stop


@section('bottomjs')


    <script>

        $(document)
                .ready(function () {


                    var totalCost = "";

                    // get hidden field price
                    var storePrice = $('.candy #startPrice').val();


                    // Get price from store and add it to start value cost
                    // items from movie will be added from ajax call
                    if (storePrice != null) {
                        totalCost = (+storePrice);
                    }

                    $("#totalPrice").text(totalCost);


                    // Get the field name  eg: 2
                    //$("#totalPrice").text(newvalue);


                    // This button will increment the value
                    $('.table').on('click', '.qtyplus', function () {


                        // Get the field name  eg: 2
                        var fieldId = $(this).attr('data-field');


                        // Get its current qty value from +/- eg: 10 qty
                        var quantity = parseInt($('input[name=' + fieldId + ']').val());


                        // td>span  <--  td>div>button  <-- THIS TODO:
                        var price = $(this).parent('div').parent('td').prev('td').children('span').text();


                        // TEMP FIX for calc to be one before
                        var plusone = quantity + 1;

                        // Calculate price
                        var newvalue = price * plusone;


                        totalCost += (+price);
                        $("#totalPrice").text(totalCost);


                        //  td>div>button --> td>span
                        // Set new amout price
                        $(this).parent('div').parent('td').next('td').children('.amount').text(newvalue);


                        // Get the field name  eg: 2
                        // $("#totalPrice").text(newvalue);


                        // If is not undefined
                        if (!isNaN(quantity)) {
                            // Increment only if value is < 20
                            if (quantity < 20) {
                                $('input[name=' + fieldId + ']').val(quantity + 1);
                                $('.qtyminus').val("-").removeAttr('style');
                            }
                        } else {
                            // Otherwise put a 0 there
                            $('input[name=' + fieldId + ']').val(1);
                        }
                    });


                    // This button will increment the value
                    $('.table').on('click', '.qtyminus', function () {


                        // Get the field name
                        var fieldId = $(this).attr('data-field');
                        // Get its current value


                        var quantity = parseInt($('input[name=' + fieldId + ']').val());
                        // If it isn't undefined or its greater than 0


                        // If more then one, decrement the amount
                        if (quantity > 1) {
                            // td>span  <--  td>div>button
                            var price = $(this).parent('div').parent('td').prev('td').children('span').text();


                            // plus one to the price
                            var plusone = quantity - 1;


                            // Calculate price
                            var newvalue = price * plusone;


                            totalCost -= (+price);
                            $("#totalPrice").text(totalCost);


                            //  td>div>button --> td>span
                            // Set new amout price
                            $(this).parent('div').parent('td').next('td').children('.amount').text(newvalue);
                        }


                        if (!isNaN(quantity) && quantity > 1) {
                            // Decrement one only if value is > 1
                            $('input[name=' + fieldId + ']').val(quantity - 1);
                            $('.qtyplus').val("+").removeAttr('style');
                        } else {
                            // Otherwise put a 0 there
                            $('input[name=' + fieldId + ']').val(1);
                            $('.qtyminus').val("-").css('color', '#aaa');
                            $('.qtyminus').val("-").css('cursor', 'not-allowed');
                        }
                    });


                    var resultArray = [];


                    $.ajax({
                        url: "/get-cart-json",
                        dataType: 'json',
                        success: function (data) {

                            // resultArray = data;

                            // Quick fix TODO: FIX THIS...
                            var test = data;
                            for (var i = 0; i < test.length; i++) {
                                if (data[i].movie_id > 100) {
                                    resultArray.push(test[i]);
                                }
                            }

                            for (var i = 0; i < resultArray.length; i++) {
                                // If not logged in returns an array of id not json
                                var movie_id = resultArray[i].movie_id;


                                var apiKey = '?api_key=f69ba07e4a1b973692f4cee03a9a6ebe';
                                $.ajax({
                                    url: 'http://api.themoviedb.org/3/movie/' + movie_id + apiKey,
                                    dataType: 'jsonp',
                                    success: function (data) {

                                        // get the price of the movie (fictional)
                                        var amountOfQty = (data.vote_average * 18).toFixed(0);
                                        totalCost = (+amountOfQty) + (+totalCost);

                                        // Get price total from the "store" items
                                        // will be done after ready jquery


                                        // Total price on start up of view
                                        $("#totalPrice").text(totalCost);


                                        $(".movie tbody").append(
                                                "<tr>" +

                                                "<th scope='row'>" +
                                                "<img src='http://image.tmdb.org/t/p/w500/" + data.poster_path + "' alt='' class='img-fluid cart-poster'>" +
                                                "</th>" +

                                                "<td>" +
                                                "<h5><strong>" + data.title + "</strong></h5>" +
                                                "</td>" +

                                                "<td><span class='price'>" + (data.vote_average * 18).toFixed(0) + "</span>" + ":-" +
                                                "</td>" +


                                                "<td>" +
                                                "<div class='btn-group cart-up-down' data-toggle='buttons'>" +
                                                "<button type='button' value='-' class='qtyminus btn btn-primary' data-field='" + i + "'>-</button>" +
                                                "<button type='button' value='+' class='qtyplus btn btn-primary' data-field='" + i + "'>+</button>" +
                                                "<input type='text' name='" + i + "' value='1' class='qty'/>" +
                                                "</div>" +
                                                "</td>" +


                                                "<td>" +
                                                "<span class='amount'>" + amountOfQty + "</span>" + ":-" +
                                                "</td>" +


                                                "<td>" +
                                                "<button type='button' class='btn btn-sm remove-item js-delete' data-toggle='tooltip' data-placement='top' title='Remove item'" +
                                                "data-movie-id='" + data.id + "'   data-category-id='0'>X</button>" +
                                                "</td>" +


                                                "</tr>"
                                        );


                                        i++;


                                    }

                                });

                            }


                        }

                    });


                    $(".table").on('click', '.js-delete', function () {
                        var deleteButton = $(this);
                        var fieldId = $(this).attr('data-movie-id');
                        var fieldCategory = $(this).attr('data-category-id');


                        console.log(fieldCategory);

                        var price = $(this).parent('td').prev('td').children('.amount').text();

                        totalCost -= (+price);
                        $("#totalPrice").text(totalCost);


                        $.ajax({
                            type: "POST",
                            url: '/delete-cart-item',
                            data: {
                                "movie_id": fieldId,
                                "category_id": fieldCategory
                            },
                            success: function () {
                                deleteButton.parents("tr").remove();

                            }
                        })
                                .done(function () {
                                    console.log("DONE");
                                    toastr.error('The Movie Is Now Deleted');
                                })
                                .fail(function () {
                                    console.log("FAIL");
                                });


                    });


                    // CANDYYYYYYY
                    // CANDYYYYYYY
                    // CANDYYYYYYY

                    /*

                     $.ajax({
                     url: "/get-store-json",
                     dataType: 'json',
                     success: function (data) {

                     console.log('FROM CANDY SHOP');
                     console.log(data);


                     for (var i = 0; i < data.length; i++) {


                     $(".candy tbody").append(
                     "<tr>" +

                     "<th scope='row'>" +
                     "<img src='" +  data[i].image + "' alt='' class='img-fluid cart-poster'>" +
                     "</th>" +

                     "<td>" +
                     "<h5><strong>" + data[i].name + "</strong></h5>" +
                     "</td>" +

                     "<td><span class='price'>" + data[i].price + "</span>" + ":-" +
                     "</td>" +


                     "<td>" +
                     "<div class='btn-group cart-up-down' data-toggle='buttons'>" +
                     "<button type='button' value='-' class='qtyminus btn btn-primary' field='" + i + 100 + "'>-</button>" +
                     "<button type='button' value='+' class='qtyplus btn btn-primary' field='" + i + 100 + "'>+</button>" +
                     "<input type='text' name='" + i + 100 + "' value='1' class='qty' !important onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>" +
                     "</div>" +
                     "</td>" +


                     "<td>" +
                     "<span class='amount'>" + "</span>" + ":-" +
                     "</td>" +


                     "<td>" +
                     "<button type='button' class='btn btn-sm remove-item js-delete' data-toggle='tooltip' data-placement='top' title='Remove item'" +
                     "data-movie-id='" + data[i].id + "'>X</button>" +
                     "</td>" +


                     "</tr>"
                     );


                     }


                     }
                     });

                     */


                });
    </script>

@stop