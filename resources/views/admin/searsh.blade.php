@extends('admin.layout')

@section('content')


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            

    <link href="./css/mycss.css" rel="stylesheet">

    <style>
    styled-table td{   font-family: "Constantia",  Times, serif ,25px/1.4;}
.styled-table th{  font: normal small-caps normal 25px/1.4 Georgia;
  color :#4F77AA;}
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
</style>
    </head>

    <table class="styled-table" id="spac">
       <thread >
        <tr >

        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> Title </th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> Discription</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">  </th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> </th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> </th>
        </tr>
       </thread>
       <tbody class="bg-white divide-y divide-gray-200">
           @if ($project->count())
           @foreach ($project as $item)
       <tr>
       <td class="px-6 py-4 text-sm whitespace-no-wrap" hidden> {{ $item->id}} </td>
        <td class="px-6 py-4 text-sm whitespace-no-wrap"> {{ $item->name}} </td>
        <td class="px-6 py-4 text-sm whitespace-no-wrap"> {{ $item->content}}</td>
        
        <td class="px-6 py-4 text-right text-sm:px-6">
        <form method="get" action="/{{ $item->id}}/edit-project"> 
            <button class="button" style='color: #009879'><i class='fa fa-edit' style='color: #009879'></i> Edit</button>
        </form>
        </td>
        <td class="px-6 py-4 text-right text-sm:px-6">
        <form method="get" action="/{{ $item->id}}/details"> 
            <button class="button"><i class='fa fa-exclamation-circle' style='color: #4b51f7'></i> Details</button>
        </form>
        
        </td>
        <td class="px-6 py-4 text-right text-sm:px-6">
        <form method="post" action="/projects/{{ $item->id}}">
            @csrf
            @method('DELETE')
            <button class="buttond" onclick="return myFunction()"  color= '#E3242B'><i class='fa fa-trash'  color= '#E3242B' style='color: red'></i> Delete</button>
            <script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this Project !?!?"))
      event.preventDefault();
  }onclick="return myFunction()"
 </script>
        </form>
        
        
                </tr>
        @endforeach
        @else
        <tr>
        <td class="px-6 py-4 text-sm whitespace-no-wrap"> No Results Found</td>
        </tr>
        @endif
       </tbody>
    </table>
</div>


        </html>
        @stop
