@extends('root')


@section('browserTitle')
Home
@stop

@section('css')
<style>

    .row-margin-top {
        margin-bottom: 570px;
        margin-top: 50px;
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



    .nav-tabs {

        border: 0;
        padding: .7rem;
        margin: 0 auto;
        margin-bottom: -20px;
        position: relative;
        width: 980px;
        box-shadow: 0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);
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


    .waves-effect {
        position: relative;
        cursor: pointer;
        overflow: hidden;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        z-index: 1;
    }



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




</style>
@stop


@section('outsideContainer')
<div class="outer-div">
    <div class="inner-div">
        <h1>Popular Movies</h1>

        <div class="genres">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-pills pills-default" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"  href="#panel31" role="tab" data-genre-id="0">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="28">Action</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel33" role="tab" data-genre-id="18">Drama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel31" role="tab" data-genre-id="27">Horror</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="35">Comedy</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="12">Adventure</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="16">Animation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="80">Crime</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="99">Documentary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="10751">Family</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="14">Fantasy</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="36">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="10402">Music</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="9648">Mystery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="10749">Romance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="878">Science Fiction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="53">Thriller</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="10752">War</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab" data-genre-id="37">Western</a>
                </li>

            </ul>
        </div>

    </div>
</div>





@stop


@section('content')
    <div class="row-margin-top">





        <div class="container row">
            <div class="find-movies">
                <ul class="myList smooth-scroll" id="posts">
                    <li id="top-li-element"></li>
                    <li id="movie-name"></li>
                </ul>
            </div>
        </div>








</div>



@stop





@section('bottomjs')

<script>



    $(document)
        .ready(function () {

            var pageNr = 1;

            var url = 'http://api.themoviedb.org/3/',
                searchMode = 'discover/movie',
                searchGenre = '&with_genres=',
                popularityDesc = '&popularity.desc',
                apiKey = '?api_key=' + '{{ getenv('TMDB_API_KEY') }}';


            var resultArray;
            var selectedGenre = 0;

            // first time only
            getMovies();


            // Get movies
            function getMovies() {


                var searchQuery;

                if (selectedGenre == 0) {
                    searchQuery = popularityDesc;
                } else {
                    searchQuery = searchGenre + selectedGenre + popularityDesc;
                }

                $.ajax({
                    url: url + searchMode + apiKey + searchQuery + "&page=" + pageNr,
                    dataType: 'jsonp',
                    success: function (data) {
                        console.log(data.results);
                        resultArray = data.results;

                        $.each(resultArray,
                            function (index, value) {


                                $(".myList").append(
                                    "<li class='movie-item'>" +
                                    "<div class='thumbnail'>" +

                                    "<div class='col-xs-4 col-sm-6 col-md-4 imagePoster-holder'>" +
                                    "<img id='poster-image' src='http://image.tmdb.org/t/p/w500/" + value.poster_path + "' alt=''>" +
                                    "</div>" +


                                    "<div class='col-xs-8 col-sm-6 col-md-8'>" +
                                    "<div class='row'>" +

                                    "<div class='right-side-card'>" +
                                    "<div class='first-card-row row'>" +
                                    "<h1>" + value.title +

                                    "</h1>" +
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


            // Generes of movies with dropdown (my old )
            $(".dropdown-menu li")
                .on('click',
                    function () {
                        $(".dropdown-toggle").text($(this).text());

                        $(".myList").empty();
                        console.log($(this).text());

                        var id = $(this).find("a").attr("data-genre-id");
                        selectedGenre = id;
                        console.log(id);

                        pageNr = 1;
                        getMovies();
                    });


            // Generes of movies with tabs
            $(".nav-tabs li")
                .on('click',
                    function () {

                        // Resets the view of movies
                        $(".myList").empty();

                        var id = $(this).find("a").attr("data-genre-id");
                        selectedGenre = id;
                        console.log(id);

                        pageNr = 1;
                        getMovies();
                    });







            // Fetch youtube video and play
            $(".myList")
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


            // Save movie to database
            $(".myList")
                .on("click",
                    ".js-save",
                    function () {


                        console.log("Button pressed");

                        var index = $(this).attr("data-movie-index");
                        var movie = resultArray[index];
                       // console.log(resultArray[index]);


                        // Save to Db

                        console.log("SAVING TO DB");
                        console.log(movie);

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






                        /*
                        $.ajax({
                            url: "/api/movies",
                            method: "POST",
                            data: newMovie
                        })
                            .done(function () {
                                toastr.success('Movie Added to Your Watchlist');
                                console.log("DONE");

                            })
                            .fail(function () {
                                toastr.error('Something went wrong');
                                console.log("FAIL");
                            });

                        */






                    });








            var win = $(window);

            // Each time the user scrolls
            win.scroll(function () {
                // End of the document reached?
                if ($(document).height() - win.height() == win.scrollTop()) {
                    $('#loading').show();

                    pageNr++;

                    getMovies();

                }
            });








        });


</script>


@stop