@extends('root')


@section('browserTitle')
Search-Movies
@stop


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
        margin-top: 60px;

    }

    .outer-div {
        margin-top: 50px;
        height: 300px;
        border: 2px solid rgba(0, 128, 0, 0);
        width: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/images/posters2.jpg');
        background-size: cover;

    }

    .md-form {
        margin: 20px auto;
        width: 380px;
        background: rgba(255, 255, 255, 0.95);
        height: 120px;
        padding: 20px;
        border-radius: 5px;
    }

    .md-form input, .md-form label, .md-form i  {
        margin-top: 20px;
    }


</style>
@stop


@section('outsideContainer')
<div class="outer-div">
    <div class="inner-div">
         <h1>Find Movies</h1>


         <div class="md-form">
             <i class="fa fa-search  prefix"></i>
             <label for="movie-search"> ..Search for a movie</label>
             <input type="email" id="movie-search" class="form-control">
         </div>



    </div>
</div>
@stop


@section('content')
<div class="row-margin-bottom">
    <ul id="myList">
        <li id="movie-name"></li>
    </ul>
</div>
<div id="footer-margin-top"></div>
@stop

@section('bottomjs')

<script>

    $(document).ready(function () {
        var url = 'http://api.themoviedb.org/3/',
            searchMode = 'search/movie',
            apiKey = '?api_key=' + '{{ getenv('TMDB_API_KEY') }}';

        var resultArray;


        $('#movie-search').keyup(function () {
            var input = $('#movie-search').val(),
                movieName = encodeURI(input);

            if (input.length > 3) {

                $("#myList").empty();


                $.ajax({
                    url: url + searchMode + apiKey + '&query=' + movieName,
                    dataType: 'jsonp',
                    success: function (data) {
                        console.log(data.results);
                        resultArray = data.results;


                        $.each(resultArray,
                            function (index, value) {


                                $("#myList").append(
                                    // TODO:
                                    // append movie-item from movie-item

                                    // value.poster_path
                                    // value.title
                                    // value.overview
                                    //  value.id
                                    // index

                                    "<li class='movie-item'>" +
                                    "<div class='thumbnail'>" +

                                    "<div class='col-xs-4 col-sm-6 col-md-4 imagePoster-holder'>" +
                                    "<img id='poster-image' src='http://image.tmdb.org/t/p/w500/" + value.poster_path + "' alt=''>" +
                                    "</div>" +


                                    "<div class='col-xs-8 col-sm-6 col-md-8'>" +
                                    "<div class='row'>" +

                                    "<div class='right-side-card'>" +
                                    "<div class='first-card-row row'>" +
                                    "<h>" + value.title +

                                    "</h>" +
                                    value.overview.substring(0, 350) +

                                    "</div>" +

                                    "<div id='yt-container' class='bottom-left col-xs-4 row'>" +
                                    "<div class='video-wrapper'>" +
                                    "<a class='js-play-video btn btn-lg  center-in-div' data-movie-id='" + value.id + "'>" +
                                    "<i class='fa fa-play-circle center-in-div' aria-hidden='true'>" +
                                    "</i>" +
                                    "</a>" +
                                    "</div>" +


                                    "</div>" +
                                    "<div class='bottom-card-part'>" +

                                    "<p id='price'> " + "Price: " +

                                    (value.vote_average * 18).toFixed(0) +
                                    ":-" +

                                    "</p>" +
                                    "<button class='js-save btn btn-success'  data-movie-index='" + index + "'><i class='fa fa-shopping-cart'></i>  Add to Cart </button>" +

                                    "</div>" +

                                    "</div>" +

                                    "</div>" +
                                    "</div>" +
                                    "</div>" +
                                    "</li>");
                            });


                        $(this).change();


                    },
                    error: function (request, status, error) {
                        alert(status + ", " + error);
                    }
                });
            }
        });


        $("#myList")
            .on("click",
                ".js-play-video",
                function () {

                    var movieId = $(this).attr("data-movie-id");

                    var button = $(this);

                    $.ajax({
                        url: url + 'movie/' + movieId + '/videos' + apiKey,
                        dataType: 'jsonp',
                        success: function (json) {

                            var videoKey = "";

                            if (json.results[0] && json.results[0].hasOwnProperty("key") && json.results[0].key !== null) {
                                videoKey = json.results[0].key;
                                console.log(json.results[0].key);
                            }

                            button.parent("div").closest("#yt-container").append(
                                "<iframe id='player' class='bottom-left' type='text/html' width='330' height='200' " +
                                " src='http://www.youtube.com/embed/" + videoKey + "?autoplay=1' frameborder='0' allowfullscreen>" +
                                "</iframe>"
                            );

                            button.parent("div").remove();
                        }
                    });

                    movieId = "";
                    $(this).change();

                });


        $("#myList")
            .on("click",
                ".js-save",
                function () {

                    console.log("Button pressed");

                    var index = $(this).attr("data-movie-index");
                    var movie = resultArray[index];
                    console.log(resultArray[index]);


                    $.ajax({
                        type: "POST",
                        url: '/add-to-cart',
                        data: {"movie_id": movie.id}
                    })
                        .done(function () {

                            toastr.success(movie.title + ' is now added to your shopping cart')
                        })
                        .fail(function () {
                            console.log("FAIL");
                            toastr.error("Something went wrong :( please try again")

                        });


                });
    });


</script>


@stop