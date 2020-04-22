<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TAGCODE');
    </script>
    <!-- End Google Tag Manager -->
    <title>CRM Forget-Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('front/assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('front/assets/fonts/flaticon/font/flaticon.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('front/images/logo-01.png')}}" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('front/assets/css/skins/default.css')}}">

</head>

<body id="top">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TAGCODE" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="page_loader"></div>

    <!-- Login 2 start -->
    <div class="login-3 tab-box">
        <div class="container-fluid">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            <div class="row">
                <div class="col-lg-7 col-md-12 col-pad-0 form-section">
                    <div class="login-inner-form">
                        <div class="details">
                            <a href="#">
                                <img src="{{asset('front/images/logo-01.png')}}" alt="logo">
                            </a>
                            <h3>Recover your password</h3>
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="input-text" @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                <div class="form-group">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-md btn-theme btn-block">Reset</button>
                                </div>
                                <p class="none-2">Already a member?<a href="{{route('login')}}"> Login here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-pad-0 bg-img none-992">
                    <div class="informeson">
                        <div class="btn-section">
                            <a href="{{route('login')}}" class="link-btn">Login</a>
                            <a href="{{route('register')}}" class="link-btn">Register</a>
                        </div>
                        <h3>We make spectacular</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy.</p>
                        <div class="social-box">
                            <ul class="social-list clearfix">
                                <li><a href="#" class="facebook-color"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-color"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="google-color"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="linkedin-color"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login 2 end -->

    <!-- External JS libraries -->
    <script src="{{asset('front/assets/js/jquery-2.2.0.min.js')}}"></script>
    <script src="{{asset('front/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <!-- Custom JS Script -->

</body>


</html>
