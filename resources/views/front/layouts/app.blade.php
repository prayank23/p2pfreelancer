<!doctype html>
<html lang="en" class="no-js">

<head>
    <title>CRM</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}" type="text/css" media="screen">
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/fullwidth.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/settings.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/magnific-popup.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/font-awesome.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/index.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}" media="screen">
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    
    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="{{asset('front/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/jquery.migrate.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/retina-1.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/plugins-scroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/script.js')}}"></script>
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

@yield('content')
@yield('script')


@if(\Request::segment(3))
 <!-- The Modal -->
 <?php $user = \App\User::find(\Request::segment(3)); ?>
 <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Send Message</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="contact-form" action="{{route('user.message.send',['user'=>$user->id])}}"
                                        method="POST">
                                        @csrf
                                        <div class="textarea-input">
                                            <textarea name="message" id="comment2" placeholder="Message"></textarea>
                                            <span><i class="fa fa-comment"></i></span>
                                        </div>
                                        <input type="submit" value="Send Query">
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>

@endif


</body>

</html>
