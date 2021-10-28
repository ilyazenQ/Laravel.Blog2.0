<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
   <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
   <title>Document</title>
</head>
<body>


<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
   <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('admin.index') }}">ADMIN</a>
   <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
   <div class="navbar-nav">
     <div class="nav-item text-nowrap">
       <a class="nav-link px-3" href="#">Sign out</a>
     </div>
   </div>
 </header>
 
 @yield('content')
 
<script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>