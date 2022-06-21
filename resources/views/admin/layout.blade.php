<head> <link href="./css/admin.css" rel="stylesheet"> </head>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php 
function set_active($path, $active = 'active') {

  return call_user_func_array('Request::is', (array)$path) ? $active : '';

}
?>
  <div class="sidebar">
    <div class="">
      <i class=''></i>
      <span class="">...</span>
      
    </div>
      
      <ul class="nav-links">
        
        <li>
          <a class="{{!Route::currentRouteNamed('help') ? 'active' : '' }}"  href="{{ url('/projects') }}" >
            <i class='bx bx-box' ></i>
            <span class="links_name">Projects</span>
          </a>
        </li>
       
        <li >
          <a class="{{Route::currentRouteNamed('help') ? 'active' : '' }}" href="/help" >
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Guide</span>
          </a>
        </li>
        
      
      </ul>
  </div>
  <section class="home-section">
  <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
      <form action="{{route('sss')}}" method="get">
        <input type="text" name ="search"  placeholder="Search by project name...">
        <button type="submit" ><i class='bx bx-search' ></i>  </button>
        </form>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Kraouchi_Roubache</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      

@if(Session::has('error'))
<script>
toastr.options = {
"debug": false,
"positionClass": "my-toastr-position",
"onclick": null,
"fadeIn": 300,
"fadeOut": 1000,
"timeOut": 5000,
"extendedTimeOut": 1000,

};

    toastr.error("{!! Session::get('error')[0] !!}");
</script>
@elseif(Session::has('delete'))
    <script>
toastr.options = {
"debug": false,
"positionClass": "my-toastr-position",
"onclick": null,
"fadeIn": 300,
"fadeOut": 1000,
"timeOut": 5000,
"extendedTimeOut": 1000,

};
    toastr.error("{!! Session::get('delete')[0] !!}");
</script>
@elseif(Session::has('success'))
    <script>
toastr.options = {
"debug": false,
"positionClass": "my-toastr-position",
"onclick": null,
"fadeIn": 300,
"fadeOut": 1000,
"timeOut": 5000,
"extendedTimeOut": 1000,

};
    toastr.success("{!! Session::get('success')[0] !!}");
</script>
@elseif(Session::has('exp'))
    <script>
toastr.options = {
"debug": false,
"positionClass": "my-toastr-position",
"onclick": null,
"fadeIn": 300,
"fadeOut": 1000,
"timeOut": 5000,
"extendedTimeOut": 1000,

};
    toastr.error("{!! Session::get('exp')[0] !!}");
</script>
@elseif(Session::has('info'))
<script>
  toastr.options = {
  "debug": false,
  "positionClass": "my-toastr-position",
  "onclick": null,
  "fadeIn": 300,
  "fadeOut": 1000,
  "timeOut": 5000,
  "extendedTimeOut": 1000,
  
  };
      toastr.info("{!! Session::get('info')[0] !!}");
  </script>
@endif

    <div class="home-content">

  @yield('content')
  </div>
  </section>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
  
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

