<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="host" content="{{URL::to('/')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('/public/assets/')}}/images/favicon.png">
    <title>@yield('title') - Data Entry Agent - DNP Designblow</title>
    
    @include('agent1.includes.style')
    @yield('addStyle')

</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        @include('agent1.includes.header')
        
        @include('agent1.includes.sidebar')

        <div class="page-wrapper">
            
            @yield('content')

        </div>
    </div>

    

    <div class="modal fade" id="leadDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row" id="leadDetailModalBody">
                    
                </div>
            </div>
        </div>
    </div>

    @include('agent1.includes.script')
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    @yield('addScript')
   
</body>

</html>
