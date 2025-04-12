@extends('app')

@section('main')

<div class="bg-base m-4 p-4 rounded-lg">
<h1 class="text-3xl font-bold text-center mb-4">Войти</h1>
@if (session('status'))
    <div class="bg-green-100 text-green-700 rounded-lg p-3 mb-4">
        <p class="text-xl font-bold">Успех</p>
        <p>{{ session('status') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 text-red-700 rounded-lg p-3 mb-4">
        <p class="text-xl font-bold">Ошибка</p>
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('login') }}" method="POST">
@csrf
<div class="mb-5">
    <label class="block mb-2 text-sm font-medium ">Введите почту:</label>
    <input type="text" name="email" value="{{old('email')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " 
        placeholder="Введите почту" required />
</div>

<div class="mb-5">
    <label class="block mb-2 text-sm font-medium ">Введите пароль:</label>
    <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " 
        placeholder="Введите пароль" required />
</div>

<input type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="Войти">

</form>
<br>
<a href="/auth/register" class="underline text-blue-500 hover:text-blue-700 ">У вас нету профиля? Зарегистрируйтесь!</a>
<br>
<!-- <a href="{{route('password.request')}}" class="underline text-blue-500 hover:text-blue-700 ">Забыл пароль</a> -->

</div>
@endsection 

@section('title')
Вход
@endsection


@section('descr')

@endsection

@section('og_img')
{{asset('/og.png')}}
@endsection

@section('head')
<meta name="robots" content="all">
@endsection