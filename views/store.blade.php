@extends('root')


@section('browserTitle')
    Home
@endsection


@section('css')
    <style>

        .row-margin-bottom {
            margin-bottom: 370px;
            margin-top: 20px;
        }

        .inner-div h1 {
            text-align: center;
            font-weight: bold;
            font-size: 60px;
            color: white;
            margin-top: 90px;
        }

        .outer-div {
            margin-top: 50px;
            height: 300px;
            border: 2px solid rgba(0, 128, 0, 0);
            width: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/images/posters2.jpg');
            background-size: cover;

        }

        .nav-tabs {

            border: 0;
            padding: .7rem;
            margin: 40px auto;
            margin-bottom: -20px;
            position: relative;
            width: 390px;
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, .2), 0 6px 20px 0 rgba(0, 0, 0, .19);
            background: rgba(255, 255, 255, 0.95);

        }

        .nav-tabs .nav-item {
            float: left;
            margin-bottom: -1px;
            text-align: center;
        }

        .nav-tabs .nav-link {
            display: block;
            padding: .5em 1em;
            border-top-right-radius: .25rem;
            border-top-left-radius: .25rem;
            border: 0;
            color: #fff;
        }

        a {
            color: #0275d8;
            text-decoration: none;
            cursor: pointer;
        }

        .tabs-3 li {
            width: 32.3%;
        }

        .md-pills .nav-link {
            color: #666;
            text-align: center;
        }

        .md-pills.pills-default .nav-item .nav-link.active {
            background-color: #2BBBAD;
        }

        .md-pills .nav-item .nav-link.active {
            color: #fff;
            border-radius: 2px;
            transition: all .4s;
        }

        /* Extra small devices (portrait phones, less than 544px) */
        @media (max-width: 543px) {

            .inner-div h1 {
                margin-top: 5px;

            }

        }

        /*  Small devices (landscape phones, less than 768px) */
        @media (max-width: 767px) {
            .nav-tabs {

                width: 40%;
            }

            .inner-div h1 {
                margin-top: 4%;
                font-size: 50px;
            }

        }

        /*  Medium devices (tablets, less than 992px) */
        @media (max-width: 991px) {
            .nav-tabs {
                width: 80%;
            }

        }

        /*  Large devices (desktops, less than 1200px) */
        @media (max-width: 1199px) {
            .nav-tabs {
            }
        }

        .col-md-5 {
            float: left;
            width: 30%;
        }

        .view img {
            height: 200px;
            margin: 0 auto;
        }

        .card .card-footer {
            font-size: 1.3rem;
            position: absolute;
            bottom: 10px;
            margin: 0 auto;
            background-color: transparent;
        }

        .card-footer button {
            width: 150px;
        }

        .card {
            height: 400px;
            min-height: 400px;
        }

        .fa-shopping-cart {
            font-size: 18px;
        }

        .price {
            font-size: 18px;
        }


    </style>
@endsection


@section('outsideContainer')
    <div class="outer-div">
        <div class="inner-div">
            <h1>Candy Shop</h1>
        </div>


        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-pills pills-default" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" value="99" href="#panel31" role="tab"
                       data-category-id="all">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" value="4" role="tab"
                       data-category-id="4">Snacks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel33" value="1" role="tab"
                       data-category-id="1">Godis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel31" value="2" role="tab"
                       data-category-id="2">Läsk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" value="3" role="tab"
                       data-category-id="3">Nyttig</a>
                </li>
            </ul>
        </div>
    </div>
@endsection





@section('content')
    <div class="row-margin-bottom">

        <div class="items">

        </div>

    </div>
@endsection





@section('bottomjs')


    <script>

        $(document).ready(function () {


            var categoryType = 'all';
            var firstTime = true;

            getItems();



            $(".items").on('click', '.addItem', function () {
                console.log('asdasd');

                var itemId = $(this).val();
                var itemName = $(this).attr("data-item-name");


                $.ajax({
                    type: "POST",
                    url: '/add-store-item',
                    data: {"item_id": itemId}
                })
                        .done(function () {
                            toastr.success(itemName + ' is now added to your shopping cart');
                            console.log("SUCESS");
                        })
                        .fail(function () {
                            console.log("FAIL");
                        });
            });


            $('.nav-item').on('click', function () {
                getItems(this);
            });



            function getItems(event) {
                $(".items").empty();

                console.log("*****************");


                if(firstTime) {
                    categoryType = 'all';
                    firstTime = false;

                } else {
                    categoryType = $(event).find("a").attr("data-category-id");
                }

                console.log(categoryType);



                $.ajax({
                    url: '/sort-category',
                    type: 'GET',
                    data: {'category_id': categoryType},
                    success: function (response) {


                        items = JSON.parse(response);



                        for (var i = 0; i < items.length; i++) {

                            var item = items[i];


                            $(".items").append(
                                    "<div class='col-md-3'>" +
                                    "<div class='card'>" +

                                    <!--Card image-->
                                    "<div class='view overlay hm-white-slight z-depth-1'>" +
                                    "<img src='" + item.image + "'class='img-fluid' alt=''>" +
                                    "<a>" +
                                    "<div class='mask'></div>" +
                                    "</a>" +
                                    "</div>" +
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    "<div class='card-block text-xs-center'>" +
                                    <!--Category & Title-->
                                    "<h4 class='card-title'><strong><a href=''>" + item.name + "</a></strong></h4>" +

                                    <!--Description-->
                                    "<p class='card-text'>" + item.description + "</p>" +

                                    <!--Card footer-->
                                    "<div class='card-footer'>" +

                                    "<button class='addItem btn btn-success' value='" + item.id + "' data-item-name='" + item.name + "'>" +

                                    "<span class='pull-left'>" +
                                    "<a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>" +
                                    "<i class='fa fa-shopping-cart'></i>" +
                                    "</a>" +
                                    "</span>" +

                                    "<span class='center price'>" + item.price +"$</span>" +
                                    "</button>" +

                                    "</div>" +

                                    "</div>" +
                                    <!--/.Card content-->
                                    "</div>" +

                                    "</div>"
                            );


                        }

                    }
                });

            }

            /*
             $.ajax({
             url: '/sort-category',
             dataType: 'json',
             success: function (data) {

             console.log("FROM GET AJAX");
             console.log(data);
             }
             });

             */


        });


    </script>
@stop
