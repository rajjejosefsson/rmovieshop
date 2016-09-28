@extends('root')

@section('browserTitle')
    Login
@stop


@section('css')
    <style>


        .row-margin-bottom {
            margin-top: 100px;
            margin-bottom: 320px;
        }


    </style>
@stop


@section('content')
    <div class="row row-margin-bottom">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">

            <h1>Login</h1>
            @include('errormessage')

            <hr>

            <form name="loginForm" id="loginForm" action="/login" method="post" class="form-horizontal">

                <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}">


                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control email required" id="email" name="email"
                               placeholder="user@example.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control required" id="password" name="password"
                               placeholder="Password">
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-2">

        </div>

    </div>

@stop


@section('bottomjs')

    <script>
        /*
         $(document).ready(function () {
         $('#loginForm').validate();
         });
         */

    </script>

@stop
