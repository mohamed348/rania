@extends('admin.layout')
@section('content')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
<style>
.title{
    color:#1c3b71;
    font-size: 17px;
}
#spac { text-indent: 2em; }

</style>
</head>
<div class="card"id = "spac">
 <h5 id = "spac"> you can create a new project</h5>
 <br>

                <div class="card-header">
                    <h4 class="title" id = "spac">Ontology Based Assistant :</h4>
                </div>
                <p> Write the natural language property specification in the field " Informal Specification " then press the " Generate Formal Specification " . </p>
                <p> In the field " Formal Specification " , a parametric formula will be generated . this formula can continue up to 4 parameters : P , Q , R , S .</p>
                <p> Click on the button " Substitute Parameters " then select the automic proposal corresponding to each parameter and press " OK " .</p>
                <p> Once the substitution is made , the final formula will be displayed in the field " Formal Specification ". Click on the button " OK " to add to </p><p>the list of properties .</p>
                
                <br>
                <div class="card-header">
                    <h4 class="title" id = "spac">Pattern Based Assistant :</h4>
                    </div>
                    <p>Choose the pattern class and select the pattern name and scope then press the " Generate Formula " button .</p>
                    <p>A specification of the natural language property will be displayed in the " Informal Description " . and in the field "Formula" , a parametric formula will be generated
                        .  this formula can continue up to 4 parameters : P , Q , R , S .</p> 
                    <p> Click on the button " Substitute Parameters "  . the substitution will be made by parameter (the parameter will be indicated above the window "Parameter Substitution" ).</p>
                    <p> - If the parameter is simple select the corresponding autonomy proposal press okay there substitution of the parameter will be performed</p>
</div>

</html>
@stop