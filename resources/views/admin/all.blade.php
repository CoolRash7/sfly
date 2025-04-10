@extends('app')

@php
use Carbon\Carbon;
@endphp

@section('main')
<div class="max-w-screen-xl mx-auto">

@if (session('status'))
<div role="alert" class="alert mb-4">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
  </svg>
  <p>{{ session('status') }}</p>
</div>

@endif

@if ($errors->any())
  <div role="alert" class="alert alert-error">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>

@endif



<h1 class="block font-bold text-3xl text-center mb-4">Мои объявления</h1>

<a class="btn btn-sm mb-4"  href="{{route('admin.add')}}" >Добавить объявления</a>

@if (isset($services))
<div class="grid gap-3 grid-cols-3 md:grid-cols-4 md:gap-4 xl:grid-cols-5 2xl:grid-cols-6">
  @foreach($services as $temp)
  <a href="{{route('admin.edit', ['id'=>$temp->id] ) }}" wire:navigate
      class=" group relative max-w-[300px]"
      title="{{$temp->title}}">

      @php
      $imgUrl = (!empty($temp->photo1)) ? asset('/storage/'.$temp->photo1) : asset('none-image.jpg');
      @endphp
      <div class=" overflow-hidden rounded-lg aspect-square group-hover:shadow-xl bg-cover bg-center bg-[url({{$imgUrl}})]"></div>
      <h2 class=" text-xs md:text-sm">{{$temp->title}}</h2>
      <div class="text-md font-semibold">{{$temp->price}} ₽</div>
      <div class=" text-xs text-gray-400">{{Carbon::parse($temp->created_at)->diffForHumans() }}</div>
  </a>
  @endforeach
</div>
@else
    <p>Ваших объявлений отсутствуют</p>
@endif




</div>
@endsection

@section('title')
Все игры
@endsection

@section('head')
<meta name="robots" content="none">
@endsection