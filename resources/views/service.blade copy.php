@extends('app')

@section('main')

<x-search/>
<h1 class="text-2xl font-bold mt-5">Название товара</h1>
<span class="text-sm text-gray-500">вчера, 22:25</span>
<img src="{{asset('none-image.jpg')}}">
<div class="text-2xl font-bold my-5">123 руб.</div>
<div class="text-lg font-semibold">Описание</div>
<p>Продаю очень крутые услуги для потенциальных клиентов!</p>

<div class="my-5">Пользователь</div>
<span class="bg-success text-2xl font-bold text-white my-3 p-3 rounded-lg">896322211122</span>
<a href="" class="bg-success text-2xl font-bold text-white my-3 p-3 rounded-lg cursor-pointer">Написать в WhatsApp</a>

@endsection