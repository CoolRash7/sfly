@extends('app')

@section('main')


<x-search/>
<div class="flex flex-row gap-1">
    @if (!empty($icon)) <img src="{{asset($icon)}}" width='35' height='35'> @endif
    <h1 class="my-5 text-2xl font-bold ">{{$title}}</h1>
</div>
<x-services-list :services="$services"/>
@endsection