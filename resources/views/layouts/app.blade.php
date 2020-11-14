<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : 'null' }}">
    <!-- CSRF Token -->
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'Laravel') }}</title>

   
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- Styles -->
    
    <meta name="_token" content="{{ csrf_token() }}" />
   <!-- <link href="public\css\pannellum.css" rel="stylesheet">
     <link rel="stylesheet"  href="public\css\custom.css">
       <link rel="stylesheet"  href="public\css\quries.css">
      <link rel="stylesheet"  href="public\css\app.css"> -->
      <link href="{{ asset('public/css/pannellum.css') }}" rel="stylesheet">
     
      
     <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
      <link href="{{ asset('public/css/quries.css') }}" rel="stylesheet">
      <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

      
       
       
       

         <!-- Scripts -->
    <!--     <script src="public\js\app.js" ></script>  -->
    
    <script src="{{ asset('public/js/jquery.min.js') }}" ></script>  
    <script src="{{ asset('public/js/bootstrap.min.js') }}" ></script>  
    
    
    
    
         
   
  
    
   
    
        
        
   
    
</head>
<body>
    <div id="app">
        @include('inc.nav')
        <div class="container-fluid padding-cancel">
            @include('inc.messages')
             @yield('content')
             
        </div>
    

        
    </div>
    
     
  
    
    <script src="{{ asset('public/js/pannellum.js') }}" ></script>
    <script src="{{ asset('public/js/libpannellum.js') }}" ></script>
    <script src="{{ asset('public/js/createtour.js') }}" ></script>
    <script src="{{ asset('public/js/previewTour.js') }}" ></script>
    <script src="{{ asset('public/js/visitSite.js') }}" ></script>
    <script src="{{ asset('public/js/home.js') }}" ></script>

    <!--
    <script src="public\js\hostel-entry.js"></script>

    <script src="public\js\bootstrap.min.js"></script>
    <script src="public\js\jquery.min.js"></script>
 <script src="public\js\custom.js" defer></script>
<script src="public\js\pannellum.js"></script>
<script src="public\js\libpannellum.js"></script>
<script src="public\js\createtour.js"></script> 
<script src="public\js\previewTour.js"></script>
<script src="public\js\visitSite.js"></script>
<script src="public\js\home.js"></script> -->


</body>



</html>
