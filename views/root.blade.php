<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>
        @yield('browserTitle')
    </title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="/assets/css/mdb.min.css" rel="stylesheet">


    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">



    <!-- Your custom styles (optional) -->
    <link href="/assets/style.css" rel="stylesheet">



    @yield('css')

</head>


<body>


@include('topnav')



@yield('outsideContainer')



<div class="container">

    <div class="row">
        @include('errormessage')
    </div>

    <div class="row">
        <div class="col-md-12 push-down">
            @yield('content')
        </div>
    </div>


</div>







<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="/assets/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>


<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/assets/js/tether.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="/assets/js/mdb.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    $(document).ready(function () {
        $(".nav a").on("click", function(){
            $(".nav").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
    });
</script>




@yield('bottomjs')






<!--Footer-->
<footer class="page-footer blue center-on-small-only">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-3">
            </div>
            <!--/.First column-->


            <!--Second column-->
            <div class="col-md-6"></div>
            <!--/.Second column-->

            <!--Third column-->
            <div class="col-md-3">
                <h5 class="title">Payment</h5>
                <ul class="social-footer-links">
                    <li><a href=""><i class="fa fa-cc-mastercard "></i></a></li>
                    <li><a href=""><i class="fa fa-cc-visa "></i></a></li>
                    <li><a href=""><i class="fa fa-paypal  "></i></a></li>
                    <li><a href=""><i class="fa  fa-btc  "></i></a></li>
                </ul>
            </div>
            <!--/.Third column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2016 Copyright: <a href="http://www.rasmusjosefsson.se"> Rasmusjosefsson.se </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

</body>



</html>