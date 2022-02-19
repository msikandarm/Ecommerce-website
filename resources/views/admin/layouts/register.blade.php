<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
    <meta name="author" content="">

    <title>Eshop</title>

    @include('admin.layouts.partials.css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('register') }}">
                            <fieldset>
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" type="name" id="name" value="{{ old('name') }}" required autocomplete="name"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" id="email" value="{{ old('email') }}" required autocomplete="email"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="password" placeholder="Password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm"placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('admin.layouts.partials.scripts')

</body>

</html>
