@extends('root')


@section('browserTitle')
Home
@stop


@section('css')
<style>

    .slide-minion {
        float: right;
    }

    .jump-minion, .slide-minion {
        height: 80px;
    }

    .card img {
        height: 70px;
        float: right;
        margin-right: 40px;
    }

    .card {
        width: 400px;
    }

    .card button {
        margin-left: 60px;
    }

    html,
    body,
    header,
    .view {
        height: 100%;
    }

    /* Navigation*/

    @media only screen and (max-width: 768px) {
        .navbar {
            background-color: #3F729B;
        }
    }

    /*Intro*/

    .view {
        background: url("/assets/images/minons-background.jpg");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    @media (max-width: 768px) {
        .full-bg-img,
        .view {
            height: auto;
            position: relative;
        }
    }

    .description {
        padding-top: 30%;
        padding-bottom: 3rem;
        color: #fff
    }

    @media (max-width: 992px) {
        .description {
            padding-top: 7rem;
            text-align: center;
        }
    }


</style>
@stop


@section('outsideContainer')


<!--Mask-->
<div class="view hm-black-strong">
    <div class="full-bg-img flex-center">
        <div class="container">


            <!--First column-->
            <div class="col-lg-6">
                <div class="description">


                    @include('errormessage')


                    <img src="/assets/images/minon-jumping.png"
                         class="wow jump-minion animated bounce infinite" data-wow-delay="0.6s" alt="jumping-minion">
                    <img class="animated slide-minion slideInRight"
                         src="http://data.whicdn.com/images/66557146/large.png" alt="minion-slides-in">

                    <h2 class="h2-responsive wow fadeInLeft">Sign up right now! </h2>
                    <hr class="hr-dark wow fadeInLeft">
                    <p class="wow fadeInLeft" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit. Rem repellendus quasi fuga nesciunt dolorum
                                                                    nulla magnam veniam sapiente, fugiat! Commodi sequi
                                                                    non animi ea dolor molestiae, quisquam iste,
                                                                    maiores. Nulla.</p>
                    <br>
                    <a class="btn btn-white-outline btn-lg wow fadeInLeft" data-wow-delay="0.7s">Learn more</a>

                </div>
            </div>
            <!--/.First column-->


            <!--Second column-->
            <div class="col-lg-6">
                <!--Form-->
                <div class="card wow fadeInRight">
                    <div class="card-block">
                        <!--Header-->
                        <div class="text-xs-center">
                            <h3><i class="fa fa-user"></i> Register:</h3>
                            <hr>
                        </div>


                        <form id="registerForm" name="registerForm" action="/register" method="post"
                              class="form-horizontal"
                              novalidate>

                            <!--Body-->
                            <div class="md-form">
                                <i class="fa fa-user prefix"></i>
                                <input type="text" id="first_name" name="first_name" class="form-control required">
                                <label for="first_name">Your name</label>
                            </div>
                            <div class="md-form">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="text" id="email" name="email" class="form-control required email">
                                <label for="email">Your email</label>
                            </div>

                            <div class="md-form">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="password" name="password" class="form-control" required>
                                <label for="password">Your password</label>
                            </div>
                            <div class="md-form">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="verify_password" name="verify_password" class="form-control">
                                <label for="verify_password">Verify password</label>
                            </div>

                            <div class="text-xs-center">
                                <div>
                                    <button type="submit" class="btn btn-success btn-lg">Sign up</button>
                                    <img src="/assets/images/minon-dave-form.jpg" class="minion-form"
                                         data-wow-delay="0.6s" alt="minon-dave">
                                </div>
                                <hr>
                                <fieldset class="form-group">
                                    <input type="checkbox" id="checkbox1">
                                    <label for="checkbox1">Subscribe me to the newsletter</label>
                                </fieldset>
                            </div>
                        </form>


                    </div>
                </div>
                <!--/.Form-->
            </div>
            <!--/Second column-->
        </div>
    </div>
</div>
<!--/.Mask-->


@stop


@section('content')


@stop


@section('bottomjs')
<script>

    // MDBOOTSTRAP ANIMATIONS bounce ect
    new WOW().init();


    $(document).ready(function () {




        $('#registerForm').validate({
            rules: {
                verify_password: {
                    required: true,
                    equalTo: "#password"
                }
            }
        });




    });


</script>
@stop
