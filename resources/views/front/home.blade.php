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
    @include('front.layouts.header')
    <!-- End Header -->
    <!-- content
            ================================================== -->

    <div id="content">
        <div class="inner-content">
            @if (session()->has('success'))
            {{session('success')}}
            @endif

            @if (session()->has('error'))
            {{session('error')}}
            @endif
            <!-- slider
                    ================================================== -->
            <!-- Content sections
                    ================================================== -->

            <div class="content-sections">
                <!-- services-box -->
                <div class="services-box">

                    <div class="wrapper">

                        <div class="container">
                            <br>
                            <div class="search-widget widget">
                                <form id="search">
                                    <input type="search" id="query" placeholder="Search here..." />
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script>
        $(document).ready(function () {
            $('#search').on('submit', function () {
                event.preventDefault();
                let query = $('#query').val();
                query = query.trim();
                str = query.replace(/\s+/g, '-');

                let url = "{{ route('search.view', ':query') }}";
                url = url.replace(':query', 'query='+query);

                window.location.href = url;
                // window.location.href = '/search?query=' + str;
            });
        });
    </script>
    @endsection
