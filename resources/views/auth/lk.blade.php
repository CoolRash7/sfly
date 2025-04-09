@extends('app')

@section('main')
<div class="rounded-lg bg-base-200 mx-4 md:mx-10 p-3 mb-4 drop-shadow-lg">

<h1 class="block font-bold text-3xl text-center">Профиль {{auth()->user()->name}}</h1>

<p>Имя: {{auth()->user()->name}}</p>
<p>Почта: {{auth()->user()->email}}</p>
<!-- <p>Статус: {{auth()->user()->status}}</p> -->
<br>
@if (auth()->user()->status != 'user')
<a class='btn bg-blue-800 text-white w-full mb-4 mt-4' href="{{route('admin.all')}}">Мои объявления</a>

@endif
@auth

@endauth
<br>
<a class="text-red-400 hover:text-red-500 underline" href="{{route('logout')}}">Выйти из аккаунта</a>
</div>
@endsection

@section('title')
Профиль {{auth()->user()->name}}
@endsection

@section('head')
<meta name="robots" content="none">
@endsection