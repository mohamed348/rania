@extends('admin.layout')
@section('content')
<style>
container {
  padding: 16px;
}



/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}




/* Add a blue text color to links */
a {
  color: dodgerblue;
}
input[type=text], input[type=password] {
  width: 20%;
  padding: 15px;
  margin: 5px 0 15px 0;
  display: inline-block;
  border:none;
  background: #DCDCDC;
  font-family: "Franklin Ghotics Medium", Times, serif;
font-size : 16px;
}
textarea[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border:none;
  background: #DCDCDC;
  height:100px;
  vertical-align: middle;
  overflow: auto;
  resize: none;
  font-family: "Franklin Ghotics Medium", Times, serif;
      font-size : 18px;
}
label textarea{
        vertical-align: ;
    }


.button {
  background-color: #009879; /* Green */
  border: none;
  color: white;
  padding: 11px 19px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  border-radius: 12px;
  font-family: "Franklin Ghotics Medium", Times, serif;
      font-size : 18px;
      cursor:pointer;
  
}
.rad {
  -webkit-appearance: none;
    background-color:white ;
    border: 2px solid #009879;
    border-radius: 10px;
    width: 100%;
    display: inline-block;
    position: relative;
    width: 15px;
    height: 15px;
    font-family: "Franklin Ghotics Medium", Times, serif;
      font-size : 18px;

}
.rad:checked{
background: #009879;
    border: 2px solid #e1e1e1;}
.title{
    color: #009879;
    font: normal small-caps normal 30px/1.4 Georgia;
}

.label{
      font-family: "Franklin Ghotics Medium", Times, serif;
font-size : 18px;
     }
#spac { text-indent: 2em; }
select {
            width: 10%;
            padding: 10px 15px;
            border: 1px 
            border-color: #009879;
            border-radius: 4px;
            background-color:white;
         }
         .idd{
          width: 25%;
            padding: 10px 15px;
            border: 1px 
            border-color: #009879;
            border-radius: 4px;
            background-color:white;
         }
         hr { height: 10px;
border: 1;
box-shadow: inset 0 9px 9px -3px rgba(11, 99, 180, 0.2);
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-ms-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px;}
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
 </style>


    

<div class="container" id="spac" > 
        
                <div class="card-header">
                    <h4 class="title">Parameter Substitution </h4>
                    
                </div>
        
                <br>
                     
            @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                 
                        @csrf
                        
                        <form >
                        <input type="hidden" name="projectid" value="{{ $project->id}}">
                        
                        <div class="card-header">
                              <label  class ="label" for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Formula : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <textarea  type="text"  name="postId2" value="{{$formal}}" class="form-control" readOnly>{{$formal}}</textarea>
                        <label class="label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Parameter : &nbsp;&nbsp;&nbsp; </label>
                        <select name='prmtr_pqrs' id='prmtr_pqrs'>
                          @foreach($array as $arr)
                      <option >{{$arr}}</option>

                      @endforeach
                           </select>
                          
                           </div>
                          
                           &nbsp;&nbsp;&nbsp;&nbsp;<input class="rad" style="font-family= Franklin Ghotics Medium, Times, serif;font-size : 18px;"  type="radio" name="bool" value=" choice"  onclick="Run3()"  checked>  Simple Parameter
                       
                        <br>

                       
                        
                        <input type="hidden" name="postId1" value="{{$informal}}">
                       
                        <label class="label" for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;automic proposition: &nbsp;&nbsp;</label>
                        <input type="text" name="simple" id="12" class="f" placeholder=""  list="datalist_id">
                        <datalist id="datalist_id">
                        @foreach($proposition as $item)
            <option value="{{ $item->auto_prop}}" />
            @endforeach
        </datalist>
                      

                      
                           <br>
                           <BR>
                           <hr>
                          
                           &nbsp;&nbsp;&nbsp;&nbsp;<input class="rad" type="radio" name="bool" onclick="Run()" id="moh1" value="two " >  Boolean Expression
                           <script>
    
     
                           function Run(){
     
                            //document.getElementById('giv_prop').removeAttribute ("disabled");
                            document.getElementById('select1').removeAttribute ("disabled");
                            document.getElementById('id1').removeAttribute ("disabled");
                            document.getElementById('12').setAttribute("disabled","disabled");
    }
    function Run2(){
     
     document.getElementById('giv_prop').removeAttribute ("disabled");
     document.getElementById('select1').setAttribute("disabled","disabled");
     document.getElementById('id1').setAttribute("disabled","disabled");
     document.getElementById('12').setAttribute("disabled","disabled");
}
function Run3(){
     
     document.getElementById('giv_prop').setAttribute("disabled","disabled");
     document.getElementById('select1').setAttribute("disabled","disabled");
     document.getElementById('id1').setAttribute("disabled","disabled");
     document.getElementById('12').removeAttribute ("disabled");
}
</script>

     </script>
                           <div class="form-group mb-3">
                        <label class="label" for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;connector : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                     <select id="select1" disabled="disabled"  onclick="gfg_Run()">
                     <option value="not">¬</option>
                     <option value="and"> ∧ </option>
                     <option value="or">∨</option>
                     <option value="Implication">→</option>
                     <option value="Iff or If and only if">⇔</option>
                           </select>
                          
                           
                            <label class="label" for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;boolean expression :&nbsp;&nbsp;</label>
                            <input type="text" name="baliz"  id='id1' disabled="disabled"  />
                        
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           
        
                        <br>
                        @if(!empty($successMsg))
  <div class="alert alert-success"> {{ $successMsg }}</div>
@endif
                        <script>
       
       var inputF = document.getElementById("id1");
       
       var value = select.options[select.selectedIndex].value;
       
       function gfg_Run() {
           selectElement = document.querySelector('#select1');
           
       output = selectElement.value;
       if (output == 'and'){
           inputF.value = '(a∧b)';
       }
       if (output == ''){
           inputF.value = '';
       }
       if (output == 'or'){
           inputF.value = '(a∨b)';
       }
       if (output == 'not'){
           inputF.value = '(¬a)';
       }
       if (output == 'Implication'){
           inputF.value = '(a→b)';
       }
       if (output == 'Iff or If and only if'){
           inputF.value = '(a⇔b)';
       }
   
   }
 
   
    
   
   
   
   
   

  
    </script>
    </div>
    <div>
                        
                        <BR>
                           <hr>
                           &nbsp;&nbsp;&nbsp;&nbsp;<input class="rad" type="radio" name="bool" value="three "  onclick="Run2()"  >  Given Properties
                           
                      
                         &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                     <select name="id_prop" class="idd" id="giv_prop" disabled="disabled">
                     <option value="">--Select Property--</option>
                     @foreach ($property as $item)
                     <option value="{{ $item->formula}}">{{ $item->formula}}</option>
                     @endforeach
                           </select>
                           
                        <br>
                        <br>

                            
                        <button   type="submit" class="button"  method="get" formaction="/{{$project->id}}/okprmtr">Save Parameter </button>                                                                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
                        <button   type="submit" class="button"  method="get" formaction="/{{$project->id}}/oksub">Ok </button>
                        
                      </form>
                      <button type="submit" class="button" method="get" formaction="/{{$project->id}}/add-prop">Cancel </button>
  
                            
                             





@stop
<script>
  function Runs(){
    
    connector  = document.getElementById('select1');
    boolean_expression = document.getElementById('id1');
    boolean_expression.setAttribute('disabled');
    connector.setAttribute('disabled');

  }

</script>