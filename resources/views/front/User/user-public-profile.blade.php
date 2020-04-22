@extends('front.layouts.app')

@section('content')
<style>
    /* Style tab links */

    .tablink {
        background-color: #FF5851;
        color: white;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 41%;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */

    .tabcontent {
        color: #2C2E2F;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
        margin-top: -1px;
        padding: 10px;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .wrapper {
        width: 100%;
        height: auto;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 2px 8px 0px silver;
    }

    .text-1 {
        font-size: 21px;
        color: gray;
        font-weight: bold;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }

    .text-2 {
        font-size: 19px;
        font-weight: normal;
        text-align: center;
        display: block;
        font-family: 'Open Sans', sans-serif;
    }

    .text-3 {
        font-size: 17px;
        font-weight: normal;
        text-align: justify;
        font-family: 'Open Sans', sans-serif;
    }
</style>
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
    <!-- <header class="clearfix">
        <div class="header-logo">
            <a class="logo" href="#"><img alt="" src="{{asset('front/images/logo-01.png')}}" width="100%"></a>
        </div> <a class="elemadded responsive-link" href="#">Menu</a> -->
        <!-- <div class="navbar-vertical">
                <ul class="main-menu">
                    <li><a class="active" href="profile.html"><span>Support</span></a>
                    </li>
                    <li><a href="get-support.html"><span>Get Support?</span></a>
                    </li>
                </ul>
            </div> -->
    <!-- </header> -->

    @include('front.layouts.user-sidebar')
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
                <!-- services-box -->
                <div class="services-box">

                    <!-- <center> -->
                    <!-- <button class="tablink" onclick="openPage('Edit', this, 'gray')">Edit Profile</button>
								<button class="tablink" onclick="openPage('Profile', this, 'gray')">Profile</button>
							</center> -->
                    <!-- 		<div id="Edit" class="tabcontent"> -->
                    <!-- Button to Open the Modal -->

                    <div class="wrapper">

                        <div class="container">

                            <br>
                            <!-- <button type="button" class="btn btn-default bttn-1" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-plus"></i>
                                </button> -->

                            <!-- The Modal -->
                            <!-- <div class="modal fade" id="myModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content"> -->

                            <!-- Modal Header -->
                            <!-- <div class="modal-header">
                                                <h4 class="modal-title">Edit Profile</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div> -->

                            <!-- Modal body -->
                            <!-- <div class="modal-body">

                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                                                    </div>
                                                </div>
                                                <form id="contact-form" class="contact-work-form2">
                                                    <div class="text-input">
                                                        <div class="float-input">
                                                            <input name="name" type="text" placeholder="First Name"> <span><i class="fa fa-user"></i></span>
                                                        </div>
                                                        <div class="float-input2">
                                                            <input name="mail" type="text" placeholder="Last Name"> <span><i class="fa fa-user"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="text-input">
                                                        <div class="float-input">
                                                            <input name="mail" id="mail2" type="text" placeholder="E-mail"> <span><i class="fa fa-envelope"></i></span>
                                                        </div>
                                                        <div class="float-input2">
                                                            <input name="name" type="text" placeholder="Phone No#"> <span><i class="fa fa-phone"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="textarea-input">
                                                        <textarea name="comment" placeholder="Skills"></textarea> <span><i class="fa fa-tasks"></i></span>
                                                    </div>
                                                    <div class="textarea-input">
                                                        <textarea name="comment" placeholder="Experience"></textarea> <span><i class="fa fa-comment"></i></span>
                                                    </div>
                                                    <div class="msg2 message"></div>
                                                    <input type="submit" data-dismiss="modal" class="submit_contact main-form" value="Close">
                                                    <input type="submit" name="mailing-submit" class="submit_contact main-form" value="Submit">
                                                </form>
                                            </div>
                                        </div>

                                    </div> -->

                            <!-- Modal footer -->
                            <!--         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> -->

                            <!-- </div> -->
                        </div>

                        <div class="avatar-upload">
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{asset('front/images/users/'.$user->avatar)}});">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="text-1">User Name</p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="text-2">{{$user->getName()}}</p>
                                </div>
                            </div>


                            <br>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="text-1">Skills</p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="text-2">{{$user->getSkills()}}</p>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="text-1">Experience</p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="text-3">{{$user->getExperience()}}</p>
                                </div>
                            </div>
                            <br>

                          
                        </div>

                    </div>

                </div>
                <!-- 					<div id="Profile" class="tabcontent"> -->
                <!-- 		<div class="wrapper">	 -->

                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
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
    @endsection
