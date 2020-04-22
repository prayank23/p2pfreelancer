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
                        @if(isset($details))
                        
                        <div class="wrapper">
                            <br>
                            <center>
                                <h3 class="texting">Search Profiles</h3>
                            </center>
                            <div class="cards-6 section-gray">
                                <div class="container">
                                    <div class="row">
                                        @foreach ($details as $detail)
                                        <div class="col-md-4">
                                            <div class="card card-profile">
                                                <div class="card-image">
                                                    <a href="{{route('user.profile',['user'=>$detail->id])}}"> <img class="img"
                                                            src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg">
                                                        <div class="card-caption"> {{$detail->first_name}} @if($detail->last_name && $detail->last_name!==$detail->first_name){{$detail->last_name}}@endif</div>
                                                    </a>
                                                </div>
                                                <div class="table">
                                                    <h6 class="category text-danger">{{$detail->skills}}</h6>
                                                    <p class="card-description"> {{str_limit($detail->experience,140)}}</p>
                                                    <div class="ftr"> <a href="#" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a> <a href="#" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a> <a href="#" class="btn btn-just-icon btn-simple btn-instagram"><i class="fa fa-instagram"></i></a> </div>
                                                    <button id="{{$detail->id}}" class="btn btn-danger hiremeButton" data-toggle="modal" data-target="#hireme" style="width: 100%;">Hire Me</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        {{-- <div class="col-md-4">
                                            <div class="card card-profile">
                                                <div class="card-image">
                                                    <a href="profile.html"> <img class="img"
                                                            src="https://www.thecargoagency.com/images/img-feature-avatar-miki.jpg">
                                                        <div class="card-caption"> Jason Andrew </div>
                                                    </a>
                                                </div>
                                                <div class="table">
                                                    <h6 class="category text-success">Graphic Designer</h6>
                                                    <p class="card-description"> Don't be scared of the truth because we
                                                        need to restart the human foundation in truth And I love you
                                                        like Kanye loves Kanye I love Rick Owens’ bed design but the
                                                        back is... </p>
                                                    <div class="ftr"> <a href="#"
                                                            class="btn btn-just-icon btn-simple btn-twitter"><i
                                                                class="fa fa-twitter"></i></a> <a href="#"
                                                            class="btn btn-just-icon btn-simple btn-dribbble"><i
                                                                class="fa fa-dribbble"></i></a> <a href="#"
                                                            class="btn btn-just-icon btn-simple btn-instagram"><i
                                                                class="fa fa-instagram"></i></a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-profile">
                                                <div class="card-image">
                                                    <a href="profile.html"> <img class="img"
                                                            src="https://www.thecargoagency.com/images/img-feature-avatar-kacey.jpg">
                                                        <div class="card-caption"> Elanor Aline</div>
                                                    </a>
                                                </div>
                                                <div class="table">
                                                    <h6 class="category text-info">Front End Developer</h6>
                                                    <p class="card-description"> Don't be scared of the truth because we
                                                        need to restart the human foundation in truth And I love you
                                                        like Kanye loves Kanye I love Rick Owens’ bed design but the
                                                        back is... </p>
                                                    <div class="ftr"> <a href="#"
                                                            class="btn btn-just-icon btn-simple btn-twitter"><i
                                                                class="fa fa-twitter"></i></a> <a href="#"
                                                            class="btn btn-just-icon btn-simple btn-dribbble"><i
                                                                class="fa fa-dribbble"></i></a> <a href="#"
                                                            class="btn btn-just-icon btn-simple btn-instagram"><i
                                                                class="fa fa-instagram"></i></a> </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3><b>Enter your Query:</b></h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <form id="contact-form" action="{{route('user.query.submit.toadmin')}}" method="POST">
                                                @csrf
                                                <div class="textarea-input">
                                                    <textarea name="query" id="comment2"
                                                        placeholder="Query"></textarea>
                                                    <span><i class="fa fa-comment"></i></span>
                                                </div>
                                                <input type="submit" name="mailing-submit"
                                                    class="main-form" value="Send Query">
                                            </form>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
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
        $('.hiremeButton').on('click',function(){
            let event = $(this);
            let consultant_id = event[0].id;
            $('#consultant_id').val(consultant_id);
        });
    </script>
@endsection