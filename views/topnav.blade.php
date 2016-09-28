<!--Navbar orange-->

<nav class="navbar navbar-fixed-top navbar-dark warning-color-dark">

    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx23"><i
            class="fa fa-bars"></i></button>

    <div class="container">

        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx23">
            <!--Navbar Brand-->

            <!--Links-->
            <ul class="nav navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/movies"><i class="fa fa-film"></i> Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/search-movies"><i class="fa fa-search"></i> Search Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/store"><i class="fa fa-map-pin"></i> Store</a>
                </li>


            </ul>
            <!--/Links-->

            <!--Links-->
            <ul class="nav navbar-nav nav-flex-icons">


                <li class="nav-item shopping-cart-li">
                    <a class="nav-link" href="/shopping-cart"><i class="fa fa-shopping-cart"></i> Go to Checkout</a>
                </li>





                @if(Rsubscribe\auth\LoggedIn::user())
                <li>
                    <a class="nav-link" href="/logout"><i class="fa fa-lock"></i> Logout</a>
                </li>
                @else
                <li>
                    <a class="nav-link" href="/login"><i class="fa fa-lock"></i> Login</a>
                </li>


                <li class="nav-item" >
                    <a class="nav-link" href="/home"><i class="fa fa-user-plus"></i> Register <span class="sr-only">(current)</span></a>
                </li>
                @endif








                <li class="nav-item avatar dropdown">


                    <div class="dropdown-menu dropdown-warning"
                         data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

            </ul>
            <!--Links-->
        </div>
        <!--/.Collapse content-->

    </div>

</nav>
<!--/.Navbar orange-->





