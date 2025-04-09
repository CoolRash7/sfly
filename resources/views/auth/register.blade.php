@extends('app')

@section('head')
    <meta name="robots" content="all">
    <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
@endsection

@section('main')

<div class="bg-base-100 m-4 p-4 rounded-lg">
<h1 class="text-3xl font-bold text-center mb-4">Регистрация</h1>

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


<form  action="{{ route('register') }}" method="post">
@csrf

<div class="mb-5">
    <label class="block mb-2 text-sm font-medium ">Введите имя:</label>
    <input type="text" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Введите ваше логин" required />
</div>

<div class="mb-5">
    <label class="block mb-2 text-sm font-medium ">Введите email:</label>
    <input type="email" name="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Введите вашу почту"  />
</div>

<div class="mb-5">
    <label class="block mb-2 text-sm font-medium">Введите пароль:</label>
    <input type="password" name="password" value="{{ old('password') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Введите ваш пароль"  />
</div>

<!-- ya capcha -->
<div 
  style="height: 100px"
  id="captcha-container"
  class="smart-captcha mb-4"
  data-sitekey="ysc1_kAVftkm7kaqvX67beImw7a4WB3KZLbu2uYmZhuxV2317f2b3"
></div>
<!-- END ya capcha -->


<input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="Зарегистрироваться">


</form>

</div>
@endsection

@section('title')
Регистрация | iBeats
@endsection


@section('descr')

@endsection


@section('og_img')
{{asset('/og.png')}}
@endsection
