

@extends('admin.layout')
@section('content')
<head>
<link href="./css/mycss.css" rel="stylesheet"> 
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            </head>

<div class="flex items-center justify-end px-4 py-3 text-right sm:px-6" id="spac"> 
<a href='add-property' class="title"><i class='fa fa-plus-square' style='color: #4b51f7' ></i> Create new property</a>

    </div>
    <table class="styled-table">
       <thread>
        <tr>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> Id</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> Id Project</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> Formula</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"> Remark</th>
       

        </tr>
       </thread>
       <tbody class="bg-white divide-y divide-gray-200">
           @if ($property->count())
           @foreach ($property as $item)
       <tr>
       <td class="px-6 py-4 text-sm whitespace-no-wrap"> {{ $item->id}} </td>
       <td class="px-6 py-4 text-sm whitespace-no-wrap"> {{ $item->id_project}} </td>
        <td class="px-6 py-4 text-sm whitespace-no-wrap"> {{ $item->formula}} </td>
        <td class="px-6 py-4 text-sm whitespace-no-wrap"> {{ $item->remark}}</td>
        <td class="px-6 py-4 text-right text-sm:px-6">
        <form method="get" action="/{{ $item->id}}/edit-property"> 
            <button class="button"><i class='fa fa-edit' style='color: #4b51f7'></i> Edit</button>
        </form>
        </td>
        
        <td class="px-6 py-4 text-right text-sm:px-6">
        <form method="post" action="/properties/{{ $item->id}}">
            @csrf
            @method('DELETE')
            <button class="button"><i class='fa fa-trash' style='color: #4b51f7'></i> Delete</button>
        </form>
        </td>
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
@stop