@extends('front.layouts.app')

@section('content')
<div id="background-container">
    <img alt="" src="{{asset('front/upload/background.jpg')}}">
</div>
<!-- End Background -->
<!-- Container -->
<div id="container" class="container">
    <!-- End Top line -->
    <!-- Header
		    ================================================== -->
    @include('front.layouts.header')
    <!-- End Header -->
    <!-- content
			================================================== -->
    <div id="content">
        <div class="inner-content">
            @if (\Session::has('success'))
            <li class="alert alert-success">{{\Session::get('success')}}</li>
            @endif
            <!-- slider
					================================================== -->
            <!-- Content sections
					================================================== -->
            <div class="content-sections">
                <!-- services-box -->
                <div class="services-box">
                    </head>

                    <body>

                        @if(session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                        </div>
                        @endif

                        @if(session()->has('flash_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('flash_message')}}
                        </div>
                        @endif

                        @if($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                        @endforeach
                        @endif

                        <span>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Button trigger modal -->
                                    <button style="float: right;" type="button" class="btn btn-primary float-right"
                                        data-toggle="modal" data-target="#exampleModalCenter">
                                        Add Service
                                    </button>
                                    <br><br>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="{{route('add.service')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Add Service
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Title</label>
                                                            <input type="text" class="form-control" name="title"
                                                                placeholder="Enter Title">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Description</label>
                                                            <input type="text" class="form-control" name="description"
                                                                placeholder="Enter Description">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Image</label>
                                                            <input type="file" class="form-control" name="image">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Charges</label>
                                                            <input type="number" class="form-control" name="charges"
                                                                placeholder="Enter Charges">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary"
                                                            value="Save changes">
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                </div>
                </span>
            </div>

          
            @foreach ($services as $service)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('/front/images/services/'.$service->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$service->title}}</h5>
                    <p class="card-text">{{$service->description}}</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
            @endforeach


        </div>


        <!-- recent-works-box -->
        <!-- End content sections -->
        <!-- footer
					================================================== -->

        <!-- End footer -->
    </div>
    <!-- End innercontent -->
</div>
<!-- End content -->
</div>
<!-- End Container -->
<!--
	##############################
	 - ACTIVATE THE BANNER HERE -
	##############################
	-->
@endsection
@include('front.layouts.datatable')


<script type="text/javascript">
    $(document).ready(function () {
        //alert('here');
        $('#example').DataTable();
    });
</script>
@section('script')


<script type="text/javascript">
    var tpj = jQuery;
    tpj.noConflict();

    tpj(document).ready(function () {

        if (tpj.fn.cssOriginal != undefined)
            tpj.fn.css = tpj.fn.cssOriginal;

        var api = tpj('.fullwidthbanner').revolution({
            delay: 8000,
            startwidth: 830,
            startheight: 505,

            onHoverStop: "off", // Stop Banner Timet at Hover on Slide on/off

            thumbWidth: 100, // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
            thumbHeight: 50,
            thumbAmount: 3,

            hideThumbs: 0,
            navigationType: "bullet", // bullet, thumb, none
            navigationArrows: "solo", // nexttobullets, solo (old name verticalcentered), none

            navigationStyle: "round", // round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


            navigationHAlign: "right", // Vertical Align top,center,bottom
            navigationVAlign: "top", // Horizontal Align left,center,right
            navigationHOffset: -42,
            navigationVOffset: 0,

            soloArrowLeftHalign: "right",
            soloArrowLeftValign: "bottom",
            soloArrowLeftHOffset: -42,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: "right",
            soloArrowRightValign: "bottom",
            soloArrowRightHOffset: -42,
            soloArrowRightVOffset: 43,

            touchenabled: "on", // Enable Swipe Function : on/off


            stopAtSlide: -
                1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
            stopAfterLoops: -
                1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

            hideCaptionAtLimit: 0, // It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
            hideAllCaptionAtLilmit: 0, // Hide all The Captions if Width of Browser is less then this value
            hideSliderAtLimit: 0, // Hide the whole slider, and stop also functions if Width of Browser is less than this value


            fullWidth: "on",

            shadow: 1 //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

        });
    });
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function () {
        readURL(this);
    });
</script>
<script>
    function openPage(pageName, elmnt, color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#switchprofile').on('change', function (e) {

            e.preventDefault();

            var switch_id = $('#switchprofile').val();

            $.ajax({

                type: 'POST',

                url: "{{ route('user.switch.profile') }}",

                data: {
                    switch_id: switch_id,
                },

                success: function (data) {

                    alert('profile switched successfully');
                    window.location.reload();

                }

            });

        });
    });

    openPage('Profile', this, 'gray');
</script>

@endsection
