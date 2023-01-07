<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="host" content="{{URL::to('/')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('/public/assets/')}}/images/favicon.png">
    <title>@yield('title') - Calling Agent  - DNP LeadManager</title>
    
    @include('agent2.includes.style')
    @yield('addStyle')

</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        @include('agent2.includes.header')
        
        @include('agent2.includes.sidebar')

        <div class="page-wrapper">
            
            @yield('content')

        </div>
    </div>

    

    @include('agent2.includes.modal')

    @include('agent2.includes.script')
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    @yield('addScript')
   
</body>

</html>
