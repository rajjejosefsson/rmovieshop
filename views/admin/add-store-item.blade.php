@extends('root')


@section('browserTitle')
    Home
@stop


@section('css')
    <style>

        .row-margin-bottom {
            margin-bottom: 370px;
            margin-top: 120px;
        }

        .view img {
            height: 200px;
            margin: 0 auto;
        }

        .card .card-footer {
            font-size: 1.3rem;
            background-color: transparent;
        }

        .card {
            width: 300px;

        }

        .card-preview {
            margin-left: 60px;
        }

        .table-responsive {
            margin-top: 60px;
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

        .card-footer button {
            width: 150px;
        }

        .view img,
        .img-candy-outer img {
            height: 200px;
            margin: 0 auto;
        }

        .select-wrapper {
            margin-left: 40px;
        }

        .select-wrapper select {
            width: 290px;
            max-width: 290px;
        }

        button, input, select, textarea {
            margin: 0;

        }

        .icon-div {

        }

        .image-td {
            overflow: hidden;
            word-wrap: break-word;
            max-width: 350px;
        }

        .js-save {
            background: #00C851;
        }

        .js-cancel {
            background: #F80;

        }

        .js-edit {
            background: #33b5e5;
        }

        td button {
            width: 70px;
            height: 30px;

        }

        td textarea,
        td select:not([disabled]) {
            border: 2px solid #00d100;
            border-radius: 5px;
        }


        .form-control:disabled, .form-control[readonly] {
            border-color: rgba(224, 224, 224, 0.79);
            color: rgba(224, 224, 224, 0.79);
        }



        select.form-control:not([size]):not([multiple]) {
            height: 45px;
        }

        .description-td textarea {
            width: 180px;
            height: 200px;
        }

        .name-td textarea {
            width: 140px;
        }

        .name-td p {
            font-weight: bold;
        }


        .price-td textarea {
            width: 40px;
            height: 40px;
        }

        .category-td {
            width: 120px;
        }


        .mainForm {
            background: white;
            padding: 20px;
        }

    </style>
@stop


@section('outsideContainer')

@stop


@section('content')

    <div class="row-margin-bottom">


        <!--Naked Form-->
        <div class="col-md-4 mainForm" style="float: left">

            <!--Header-->
            <h3><i class="fa fa-plus"></i> Add new item</h3>
            <hr class="m-t-2 m-b-2">

            <!--Body-->
            <br>

            <form name="itemForm" id="itemForm" action="/admin/add-item" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}">

                <!--Body-->
                <div class="md-form">
                    <i class="fa  fa-header prefix"></i>
                    <input type="text" id="name" name="name" class="form-control required">
                    <label for="name">Item Title</label>
                </div>


                <div class="md-form">
                    <i class="fa fa-money prefix"></i>
                    <input type="text" id="form2" name="price" class="form-control required">
                    <label for="form2">Item Price</label>
                </div>

                <div class="md-form">

                    <div class="icon-div">
                        <i class="fa fa-tag prefix"></i>
                    </div>


                    <div class="select-wrapper">
                        <select class="form-control required" name="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ ucfirst($category->category_type)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="md-form">
                    <i class="fa fa-image prefix"></i>
                    <input type="text" id="imageURL" name="imageURL" class="form-control imageURL required">
                    <label for="imageURL">Item image URL</label>
                </div>


                <div class="md-form">
                    <i class="fa fa-pencil prefix"></i>
                    <textarea id="description" name="description" class="md-textarea required"></textarea>
                    <label for="description">Description</label>
                </div>


                <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i> Add Item</button>
            </form>

        </div>
        <!--Naked Form-->


        <div class="card-preview col-md-4">

            <h1>Preview</h1>


            <div class="card">

                <!--Card image-->
                <div class="view overlay hm-white-slight z-depth-1">
                    <img id="demo-image"
                         src="https://celiac.org/wp/wp-content/uploads/2015/12/general-candy-list.jpg"
                         class="img-fluid" alt="">
                    <a>
                        <div class="mask"></div>
                    </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block text-xs-center">
                    <!--Title-->
                    <h4 class="card-title"><strong><a href="" id="demo-title">Title </a></strong></h4>

                    <!--Description-->
                    <p class="card-text" id="demo-description"> Description </p>

                    <!--Card footer-->
                    <div class="card-footer">

                        <button class="btn btn-success">

                            <span class="pull-left">
                                  <i class="fa fa-shopping-cart"></i>
                            </span>


                            <span class="right" id="demo-price">xx</span> $


                        </button>

                    </div>

                </div>
                <!--/.Card content-->

            </div>

        </div>
    </div>





    <div class="row">


        <div class="col-md-12">


            <!--Shopping Cart table-->
            <div class="table-responsive">
                <table class="table product-table">
                    <!--Table head-->
                    <thead>
                    <tr>
                        <th>Img</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Info</th>
                        <th>Price</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <!--/Table head-->

                    <!--Table body-->
                    <tbody>

                    @foreach($DBitems as $item)


                        <tr>

                            <td class="image-td">
                                <div class="img-candy-outer">
                                    <img src=" {{ $item->image}}" alt="" class='img-candy img-fluid cart-poster'>
                                </div>
                                <p hidden class="imageURL">{{$item->image}}</p>
                            </td>


                            <td class="name-td">
                                <p>{{ $item->name}} </p>
                            </td>

                            <td class="category-td">
                                <select disabled class="form-control required" id="category-select" name="category">
                                    @foreach($categories as $category)
                                        @if($category->id == $item->category_id)
                                            <option selected
                                                    value="{{$category->id}}">{{ ucfirst($category->category_type)}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{ ucfirst($category->category_type)}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>


                            <td class="description-td">
                                <p>{{ $item->description}}</p>
                            </td>


                            <td class="price-td">
                                <p> {{$item->price}}<span>:-</span></p>
                            </td>


                            <td>
                                <button type='button' class='btn btn-sm js-edit' data-toggle='tooltip'
                                        data-placement='top' data-item-id="{{$item->id}}" title='Edit item'>Edit
                                </button>

                                <button hidden type='button' class='btn btn-sm btn-warning js-cancel'
                                        data-toggle='tooltip'
                                        data-placement='top' title='Edit item'>Cancel
                                </button>
                            </td>

                            <td>
                                <button type='button' class='btn btn-sm btn-danger js-delete' data-toggle='tooltip'
                                        data-placement='top' title='Remove item' data-item-id="{{$item->id}}">Delete
                                </button>
                            </td>
                        </tr>


                    @endforeach
                </table>
            </div>
        </div>
    </div>







    <!-- Just a simple example by Rajjejosefsson-->

    <form action="/upload" enctype="multipart/form-data" method="POST" class="upload-test">
        <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}">
        <div class="row">
            <div class="col-md-12">
                <input type="file" name="image"/>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>

@stop


@section('bottomjs')
    <script>

        $(document).ready(function () {

            $('#itemForm').validate({
                rules: {
                    name: {
                        required: true
                    },
                    price: {
                        required: true,
                        number: true
                    },
                    description: {
                        required: true
                    },
                    image: {
                        required: true,
                        extension: "(png, jpg, jpeg, gif"
                    }
                }
            });


            $("form").on('keyup', '#name', function () {
                $('#demo-title').text($(this).val());
            });


            $("form").on('keyup', '#form2', function () {
                $('#demo-price').text($(this).val());
            });


            $("form").on('keyup', '#description', function () {
                $('#demo-description').text($(this).val());
            });


            $("form").on('keyup', '.imageURL', function () {
                var imageUrl = $(this).val();
                $('#demo-image').attr('src', imageUrl);
            });


            // Change Image of table item
            $(".image-td").on('keyup', 'textarea', function () {
                var newUrl = $(this).val();
                var imageElement = $(this).prev('div').children('img');
                imageElement.attr('src', newUrl);
            });


            // Edit Table item
            $("td").on('click', '.js-edit', function () {

                $(this).text('Save');
                $(this).addClass('js-save');
                $(this).removeClass('js-edit');
                // Get the canel button
                $(this).siblings('button').prop('hidden', false);
                $(this).parent('td').parent('tr').find('.image-td').children('p').prop('hidden', false);


                $(this).parent('td').parent('tr').find('.category-td').children('select').prop('disabled', false);

                // p -> textarea
                var tr = $(this).parent('td').parent('tr').find('td p').replaceWith(function () {
                    return $("<textarea />").append($(this).contents());
                });
            });


            // Cancel Tabel Edit
            $("td").on('click', '.js-cancel', function () {

                $(this).siblings('button').removeClass('js-save');
                $(this).siblings('button').addClass('js-edit');
                $(this).siblings('button').text('Edit');

                $(this).parent('td').parent('tr').find('.category-td').children('select').prop('disabled', true);
                $(this).prop('hidden', true);


                // textarea -> p
                var tr = $(this).parent('td').parent('tr').find('td textarea').replaceWith(function () {
                    return $("<p/>").append($(this).contents());
                });

                $(this).parent('td').parent('tr').find('.image-td').children('p').prop('hidden', true);

            });


            // Delete Table Item
            $("td").on('click', '.js-delete', function () {


                var item_id = $(this).attr('data-item-id');

                // Promt User if sure to delete
                var wantToDelete = window.confirm("Are you sure?");



                if (wantToDelete) {
                    $(this).parent('td').parent('tr').remove();

                    $.ajax({
                        type: "POST",
                        url: '/delete-item',
                        data: {
                            "item_id": item_id
                        }
                    })
                            .done(function () {
                                toastr.success('Item Deleted')
                            })
                            .fail(function () {
                                toastr.error("Something went wrong :( please try again")
                            });
                }


            });


            // Save Table Changes
            $("td").on('click', '.js-save', function () {

                $(this).text('Edit');
                $(this).removeClass('js-save');
                $(this).addClass('js-edit');
                $(this).parent('td').parent('tr').find('.category-td').children('select').prop('disabled', true);
                $(this).siblings('button').prop('hidden', true);
                $(this).parent('td').parent('tr').find('.image-td').children('p').prop('hidden', true);


                var name = $(this).parent('td').parent('tr').find('.name-td').children('textarea').val();
                var category_id = $(this).parent('td').parent('tr').find('.category-td').children('select').val();
                var price = $(this).parent('td').parent('tr').find('.price-td').children('textarea').val();
                var description = $(this).parent('td').parent('tr').find('.description-td').children('textarea').val();
                var img = $(this).parent('td').parent('tr').find('.image-td').children('p').val();
                var item_id = $(this).attr('data-item-id');
                var image = $(this).parent('td').parent('tr').find('.img-candy').attr('src');


                $.ajax({
                    type: "POST",
                    url: '/update-item',
                    data: {
                        "name": name,
                        "price": price,
                        "description": description,
                        "image": image,
                        "category_id": category_id,
                        "item_id": item_id
                    }
                })
                        .done(function () {


                            // textarea -> p
                            var tr = $(this).parent('td').parent('tr').find('td textarea').replaceWith(function () {
                                return $("<p/>").append($(this).contents());
                            });

                            toastr.success('Item updated')
                        })
                        .fail(function () {
                            toastr.error("Something went wrong :( please try again")
                        });
            });
        });


    </script>
@stop
