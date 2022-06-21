


@extends('admin.layout')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            
<style>
container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border:none;
  background: #DCDCDC;
  font-family: "Franklin Ghotics Medium", Times, serif;
      font-size : 18px;

}



input[type=text]:focus, input[type=password]:focus {
  background-color: #C7C6C1;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
.label{
      font-family: "Franklin Ghotics Medium", Times, serif;
      font-size : 18px;
     }



/* Add a blue text color to links */
a {
  color: dodgerblue;
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
      cursor : pointer;
}
.title{
    color: #009879;
    font: normal small-caps normal 30px/1.4 Georgia;

}
#spac { text-indent: 2em; }
select {
            width: 50%;
            padding: 10px 15px;
            border: 1px 
            border-color: #009879;
            border-radius: 4px;
            background-color:white;
         }
         .hidden {
    display: none;
}


</style>
<link href="./css/input.css" rel="stylesheet">
</head>

<div class="container" id="spac" > 
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 class="title">Add Project</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('add-project') }}" method="POST" enctype="multipart/form-data" id="numberOfItems">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="label" for="">Project Title :&nbsp;&nbsp;</label>
                            <input type="text" name="name"  id="number" class="form-control">
                            <span id="error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="">Discription :&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                            
                          
                            <input type="text"  name="content" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for=""> Automic proposition :</label>
                            <input type="text" name="auto_prop" id="id1" class="form-control"  style="width: 450px;" > <button type="button" class="button" onclick ='getvar()'><i class='fa fa-plus' style='color: white'></i></button><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <input type="hidden" name="auto_prop2" id="id2" class="form-control"  style="width: 450px;"  ><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="hidden" name="auto_prop3" id="id3" class="form-control" style="width: 450px;" ><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="hidden" name="auto_prop4" id="id4" class="form-control"   style="width: 450px;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="hidden" name="auto_prop5" id="id5"  class="form-control" style="width: 450px;">
                        </div>
                        <script>
       
       var inputF = document.getElementById("id1");
       var inputF2 = document.getElementById("id2");
       var inputF3 = document.getElementById("id3");
       var inputF4 = document.getElementById("id4");
       var inputF5 = document.getElementById("id5");
     
       
       function  getvar() {
        if(inputF2.value == ""){
        inputF2.value = inputF.value;
        inputF2.type = "text";
        inputF.value='';
       }else if(inputF3.value == ""){
        inputF3.value = inputF.value;
        inputF3.type = "text";
        inputF.value='';
       }else if(inputF4.value == ""){
        inputF4.value = inputF.value;
        inputF4.type = "text";
        inputF.value='';
    }else if(inputF5.value == ""){
        inputF5.value = inputF.value;
        inputF5.type = "text";
        inputF.value='';
    }else{
        alert("cant add more parametrs");
    }
      

        }

    </script>
                       
                        <div >
                            <button type="submit" class="button">Save Project</button>
            
                        </div>
                       
                    </form>
     
                </div>
            </div>
        </div>
    </div>
</div>



</html>
@stop