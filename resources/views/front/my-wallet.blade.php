@extends('front.layouts.app')

@section('content')
<!-- Background -->
<div id="background-container">
    <img alt="" src="{{asset('front/upload/background.jpg')}}">
</div>
<!-- End Background -->
<!-- Container -->
<div id="container" class="container">
    <!-- End Top line -->
    <!-- Header
            ================================================== -->
    <header class="clearfix">
        <div class="header-logo">
            <a class="logo" href="#"><img alt="" src="{{asset('front/images/logo-01.png')}}" width="100%"></a>
        </div>
        <!-- <a class="elemadded responsive-link" href="#">Menu</a>
            <div class="navbar-vertical">
                <ul class="main-menu">
                    <li><a href="profile.html"><span>Support</span></a>
                    </li>
                    <li><a class="active" href="get-support.html"><span>Get Support?</span></a>
                    </li>
                </ul>
            </div> -->
    </header>
    <!-- End Header -->
    <!-- content
            ================================================== -->

    <div id="content">
        <div class="inner-content">
            <!-- slider
                    ================================================== -->
            <!-- Content sections
                    ================================================== -->
            <div class="content-sections">
                @if (isset($message))
                <p>{{$message}}</p>
                @endif

                @if (session('success'))
                <p>{{session('success')}}</p>
                @endif

                <!-- services-box -->
                <div class="services-box">
                    <h1>Total Anount</h1>
                    <h3>$ 100</h3>
                    <br>
                </div>
                
                <a href="{{route('coingate')}}" class="btn btn-primary">Add payment in wallet</a>
            </div>
        </div>
    </div>





    <!-- hireme modal -->

    <!-- Modal -->
    <div class="modal fade" id="hireme" tabindex="-1" role="dialog" aria-labelledby="hireme" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('hire.consultant')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="hireme">Hire Me</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="consultant_id" id="consultant_id">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Enter Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Enter Charges</label>
                            <input type="number" class="form-control" name="charges">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" id="hirenow" class="btn btn-primary" value="Hire">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- hireme modal ends  -->

    <script>
        $('.hiremeButton').on('click', function () {
            let event = $(this);
            let consultant_id = event[0].id;
            $('#consultant_id').val(consultant_id);
        });
    </script>
    @endsection