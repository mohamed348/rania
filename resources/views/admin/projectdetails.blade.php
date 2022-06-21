@extends('admin.layout')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
    <link href="./css/admin.css" rel="stylesheet"> 
    <link href="./css/mycss.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            </head>
    <style>
    .title{
    color: #4b51f7;
    font-size: 20px;
}
body {
    font-family: 'Nunito', sans-serif;
}
.styled-table {
border-collapse: collapse;
margin: 25px 20px;
font-size: 0.93em;
font-family: sans-serif;
min-width: 400px;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
text-indent: 2em;
text-align: left;
}
.styled-table thead tr {
background-color: #009879;
color: #ffffff;
text-align: left;
}
.styled-table td{   font-family: "Constantia",  Times, serif ,25px/1.4;text-align: left;
}
.styled-table th{  font: normal small-caps normal 25px/1.4 Georgia;
  color :#4F77AA;text-align: left;
}
.styled-table th,
.styled-table td {
padding: 16px 10px;
height: px;
text-align: left;


}
.styled-table tbody tr {
border-bottom: 1px solid #dddddd;
text-align: left;

}



.styled-table tbody tr:nth-of-type(even) {
background-color: #f3f3f3;text-align: left;

}

.styled-table tbody tr:last-of-type {
border-bottom: 2px solid #4b51f7;
text-align: left;

}



#spac { text-indent: 2em; }



*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebar{
  position: fixed;
  height: 100%;
  width: 240px;
  background: #081D45;
  transition: all 0.5s ease;
}
.sidebar.active{
  width: 60px;
}
.sidebar .logo-details{
  height: 80px;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 28px;
  font-weight: 500;
  color: #fff;
  min-width: 60px;
  text-align: center
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 24px;
  font-weight: 500;
}
.sidebar .nav-links{
  margin-top: 10px;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  height: 50px;
}
.sidebar .nav-links li a{
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li a.active{
  background: #18366d;
}
.sidebar .nav-links li a:hover{
  background: #081D45;
}
.sidebar .nav-links li i{
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: #fff;
}
.sidebar .nav-links li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
}
.sidebar .nav-links .log_out{
  position: absolute;
  bottom: 0;
  width: 100%;
}
.home-section{
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section{
  width: calc(100% - 60px);
  left: 60px;
}
.home-section nav{
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section nav{
  left: 60px;
  width: calc(100% - 60px);
}
.home-section nav .sidebar-button{
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: 500;
}
nav .sidebar-button i{
  font-size: 35px;
  margin-right: 10px;
}
.home-section nav .search-box{
  position: relative;
  height: 50px;
  max-width: 550px;
  width: 100%;
  margin: 0 20px;
}
nav .search-box input{
  height: 100%;
  width: 100%;
  outline: none;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}
nav .search-box .bx-search{
  position: absolute;
  height: 40px;
  width: 40px;
  background: #2697FF;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 4px;
  line-height: 40px;
  text-align: center;
  color: #fff;
  font-size: 22px;
  transition: all 0.4 ease;
}
.home-section nav .profile-details{
  display: flex;
  align-items: center;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  height: 50px;
  min-width: 190px;
  padding: 0 15px 0 2px;
}
nav .profile-details img{
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}
nav .profile-details .admin_name{
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin: 0 10px;
  white-space: nowrap;
}
nav .profile-details i{
  font-size: 25px;
  color: #333;
}
.home-section .home-content{
  position: relative;
  padding-top: 104px;
}
.home-content .overview-boxes{
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 20px;
  margin-bottom: 26px;
}
.overview-boxes .box{
  display: flex;
  align-items: center;
  justify-content: center;
  width: calc(100% / 4 - 15px);
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.overview-boxes .box-topic{
  font-size: 20px;
  font-weight: 500;
}
.home-content .box .number{
  display: inline-block;
  font-size: 35px;
  margin-top: -6px;
  font-weight: 500;
}
.home-content .box .indicator{
  display: flex;
  align-items: center;
}
.home-content .box .indicator i{
  height: 20px;
  width: 20px;
  background: #8FDACB;
  line-height: 20px;
  text-align: center;
  border-radius: 50%;
  color: #fff;
  font-size: 20px;
  margin-right: 5px;
}
.box .indicator i.down{
  background: #e87d88;
}
.home-content .box .indicator .text{
  font-size: 12px;
}
.home-content .box .cart{
  display: inline-block;
  font-size: 32px;
  height: 50px;
  width: 50px;
  background: #cce5ff;
  line-height: 50px;
  text-align: center;
  color: #66b0ff;
  border-radius: 12px;
  margin: -15px 0 0 6px;
}
.home-content .box .cart.two{
   color: #2BD47D;
   background: #C0F2D8;
 }
.home-content .box .cart.three{
   color: #ffc233;
   background: #ffe8b3;
 }
.home-content .box .cart.four{
   color: #e05260;
   background: #f7d4d7;
 }
.home-content .total-order{
  font-size: 20px;
  font-weight: 500;
}
.home-content .sales-boxes{
  display: flex;
  justify-content: space-between;
  /* padding: 0 20px; */
}

/* left box */
.home-content .sales-boxes .recent-sales{
  width: 65%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.home-content .sales-boxes .sales-details{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sales-boxes .box .title{
  font-size: 24px;
  font-weight: 500;
  /* margin-bottom: 10px; */
}
.sales-boxes .sales-details li.topic{
  font-size: 20px;
  font-weight: 500;
}
.sales-boxes .sales-details li{
  list-style: none;
  margin: 8px 0;
}
.sales-boxes .sales-details li a{
  font-size: 18px;
  color: #333;
  font-size: 400;
  text-decoration: none;
}
.sales-boxes .box .button{
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
.sales-boxes .box .button a{
  color: #fff;
  background: #0A2558;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}
.sales-boxes .box .button a:hover{
  background:  #0d3073;
}

/* Right box */
.home-content .sales-boxes .top-sales{
  width: 35%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 0;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.sales-boxes .top-sales li{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 10px 0;
}
.sales-boxes .top-sales li a img{
  height: 40px;
  width: 40px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 10px;
  background: #333;
}
.sales-boxes .top-sales li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sales-boxes .top-sales li .product,
.price{
  font-size: 17px;
  font-weight: 400;
  color: #333;
}
/* Responsive Media Query */
@media (max-width: 1240px) {
  .sidebar{
    width: 60px;
  }
  .sidebar.active{
    width: 220px;
  }
  .home-section{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section{
    /* width: calc(100% - 220px); */
    overflow: hidden;
    left: 220px;
  }
  .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section nav{
    width: calc(100% - 220px);
    left: 220px;
  }
}
@media (max-width: 1150px) {
  .home-content .sales-boxes{
    flex-direction: column;
  }
  .home-content .sales-boxes .box{
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
  }
  .home-content .sales-boxes .top-sales{
    margin: 0;
  }
}
@media (max-width: 1000px) {
  .overview-boxes .box{
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {
  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i{
    display: none;
  }
  .home-section nav .profile-details{
    height: 50px;
    min-width: 40px;
  }
  .home-content .sales-boxes .sales-details{
    width: 560px;
  }
}
@media (max-width: 550px) {
  .overview-boxes .box{
    width: 100%;
    margin-bottom: 15px;
  }
  .sidebar.active ~ .home-section nav .profile-details{
    display: none;
  }
}

.button {
background-color:  ; /* Green */
border: none;
color: #4b51f7;
padding: 3px 2px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 14px;
border-radius: 12px;
cursor:pointer;
}
.buttond {
background-color: ; /* Green */
border: none;
color: #E3242B;
padding: 3px 2px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 14px;
border-radius: 12px;
cursor:pointer;
font-family: "Franklin Ghotics Medium", Times, serif;
}
.h3{
  font: normal small-caps normal 16px/1.4 Georgia;
  color: #4b51f7;
}
#spac { text-indent: 2em; 
  font-family: "Ink Free", Times, serif;}
.button1 {
  background-color: #4F77AA; /* Green */
  border: none;
  color: white;
  padding: 20px 19px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 17px;
  border-radius: 12px;
  text-align: center;
  cursor:pointer;
  font-family: "Franklin Ghotics Medium", Times, serif;
      font-size : 18px;
   }
.button1:hover {
  background-color:#4b51f7; /* Green */
  color: white;
}
.h2{
  font: normal small-caps normal 30px/1.4 Georgia;
  color :#4F77AA;}
  
</style>
       
    </head>
    
                        @csrf
                        <script >
                        
                       </script>
    <div id="spac">

        
    <div>
  

        <h2 class="h2">Properties list of {{ $project->name}} project </h2>
        
       
        <br>

        
        
        
        <form method="get" action="/{{ $project->id}}/add-prop"> 
        
        
        

        <button type="submit" class="button1" action='/{{ $project->id}}/add-prop'  > <i class='fa fa-plus-square' style='color: white' ></i> Add property</button>
        </form>
                      </div>

                
              
               <table class="styled-table ">
       <thread>
       
        <tr>

        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" > Formula</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> Comment</th>

        </tr>
       </thread>
       <tbody class="bg-white divide-y divide-gray-200">
       
       
 @foreach( $groupTwo as $item ) 
       @if($item->id_project == $project->id)

      
       <tr>
       <td class="px-6 py-4 text-sm whitespace-no-wrap" hidden> {{ $item->id}} </td>
        <td class="px-6 py-4 text-sm whitespace-no-wrap" style="text-align: left"> {{ $item->formula}}</td>
        <td class="px-6 py-4 text-sm whitespace-no-wrap"> {{ $item->remark}}</td>
        <td class="px-6 py-4 text-right text-sm:px-6">
        <form method="get" action="/{{ $item->id}}/edit-property"> 
            <button class="button"  style='color: #009879'><i class='fa fa-edit' style='color:#009879'></i> Edit</button>
        </form>
        </td>
        
        <td class="px-6 py-4 text-right text-sm:px-6">
        <form method="get" action="/{{ $item->id}}/{{ $project->id}}/delete">
            @csrf
            @method('DELETE')
            <button class="buttond" onclick="return myFunction()" ><i class='fa fa-trash'  color= '#E3242B' style='color: red'></i> Delete</button>
             <script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this Property !?!?"))
      event.preventDefault();
  }
 </script>
        </form>
        </td>
       
                </tr>
               
                @endif
                @endforeach
                
       </tbody>
    </table>
  
   

              
                </div>
       
                </html>
@stop