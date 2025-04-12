@extends('app')

@section('main')
<div class="rounded-lg bg-base-200 mx-4 md:mx-10 p-3 mb-4 drop-shadow-lg">
@php
    $imgUrl = (!empty(auth()->user()->avatar)) ? asset('/storage/'.auth()->user()->avatar) : asset('none-user.jpg');
    $fio = auth()->user()->fam.' '.auth()->user()->name.' '.auth()->user()->otch;
    $birthday_formatted = \Carbon\Carbon::parse(auth()->user()->birthday)->isoFormat('D MMMM YYYY');
@endphp

<h1 class="block font-bold text-3xl text-center mb-4">Личный профиль</h1>

<div class="flex flex-col md:flex-row gap-3">

    <div class="mx-auto md:mx-0 overflow-hidden rounded-full aspect-square  w-full max-w-[120px] bg-cover bg-center bg-[url({{$imgUrl}})]"></div>
    <div>
        <p>ФИО: {{$fio}}</p>
        <p>Пол: {{auth()->user()->pol}}</p>
        <p>Дата рождения: {{$birthday_formatted}}</p>
        <p>Почта: {{auth()->user()->email}}</p>
    </div>
</div>

<!-- <p>Статус: {{auth()->user()->status}}</p> -->
<br>
@if (auth()->user()->status != 'user')
<a class='btn bg-blue-800 text-white w-full mb-4 mt-4' href="{{route('lk.edit')}}">Редактировать профиль</a>
<a class='btn bg-blue-800 text-white w-full mb-4 ' href="{{route('admin.all')}}">Мои объявления</a>

@endif
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