@extends('admin.layouts.app')

@section('content')
<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    @include('admin.partials.sidebar')
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        @include('admin.partials.header')
        <!-- header area end -->
        <!-- page title area start -->
        @include('admin.partials.breadcrumb')
        <!-- page title area end -->
        <div class="main-content-inner">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}!
                    </div>
                @endforeach
            @endif
            <form action="{{route('admin.post.login.details')}}" method="POST">
            @csrf
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Admin Details</h4>

                            <div class="form-group">
                                <label for="name" class="col-form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{$admin->name}}">
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="col-form-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{$admin->email}}">
                            </div>
                            <p class="alert alert-info">Leave Below fields empty If you Do not want to change your password</p>
                            <div class="form-group">
                                <label for="example-email-input" class="col-form-label">Old Password</label>
                                <input class="form-control" type="password" name="old_password" value="">
                            </div>
                            <div class="form-group">
                                <label for="example-url-input" class="col-form-label">New Password</label>
                                <input class="form-control" type="password" name="password" value="">
                            </div>

                            <div class="form-group">
                                <label for="example-url-input" class="col-form-label">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" value="">
                            </div>


                            <input type="submit" class="btn btn-primary mt-4 pr-4 pl-4" value="Save">

                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    @include('admin.partials.footer')
    <!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->
<div class="offset-area">
    <div class="offset-close"><i class="ti-close"></i></div>
    <ul class="nav offset-menu-tab">
        <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
        <li><a data-toggle="tab" href="#settings">Settings</a></li>
    </ul>
    <div class="offset-content tab-content">
        <div id="activity" class="tab-pane fade in show active">
            <div class="recent-activity">
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-check"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Added</h4>
                        <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>You missed you Password!</h4>
                        <span class="time"><i class="ti-time"></i>09:20 Am</span>
                    </div>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="fa fa-bomb"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Member waiting for you Attention</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="ti-signal"></i>
                    </div>
                    <div class="tm-title">
                        <h4>You Added Kaji Patha few minutes ago</h4>
                        <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Ratul Hamba sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Hello sir , where are you, i am egerly waiting for you.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="fa fa-bomb"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="ti-signal"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
            </div>
        </div>
        <div id="settings" class="tab-pane fade">
            <div class="offset-settings">
                <h4>General Settings</h4>
                <div class="settings-list">
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch1" />
                                <label for="switch1">Toggle</label>
                            </div>
                        </div>
                        <p>Keep it 'On' When you want to get all the notification.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show recent activity</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch2" />
                                <label for="switch2">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show your emails</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch3" />
                                <label for="switch3">Toggle</label>
                            </div>
                        </div>
                        <p>Show email so that easily find you.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show Task statistics</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch4" />
                                <label for="switch4">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch5" />
                                <label for="switch5">Toggle</label>
                            </div>
                        </div>
                        <p>Use checkboxes when looking for yes or no answers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offset area end -->
@endsection
