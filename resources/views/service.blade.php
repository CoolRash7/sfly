@extends('app')

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<link rel="stylesheet" href="{{asset('b/baguetteBox.min.css')}}">
<script src="{{asset('b/baguetteBox.min.js')}}" async></script>

<style>
  .swiper-slide2 {
      background-size: cover;
      background-position: center;
    }
</style>
@endsection

@php
  use Carbon\Carbon;
  $photo1_path = (!empty($temp->photo1)) ? asset('/storage/'.$temp->photo1) :  asset('none-image.jpg');
@endphp

@section('main')

<x-search/>
<h1 class="text-2xl font-bold mt-5">{{$temp->title}}</h1>
<span class="text-sm text-gray-500">{{Carbon::parse($temp->created_at)->diffForHumans() }}</span>

<!-- Slider main container -->
<div class="swiper h-[500px] rounded-lg">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper gallery ">
    <!-- Slides -->

    <a class="swiper-slide bg-cover bg-center bg-zinc-600 bg-blend-multiply bg-[url({{ $photo1_path }})]" href="{{ $photo1_path }}" data-caption="">
        <img class="mx-auto h-full" src="{{ $photo1_path }}" title="Картинка 1" alt="Картинка 1">
    </a>
    @if (!empty($temp->photo2))
    <a class="swiper-slide bg-cover bg-center bg-zinc-600 bg-blend-multiply bg-[url({{ asset('/storage/'.$temp->photo2) }})]" href="{{ asset('/storage/'.$temp->photo2) }}" data-caption="">
        <img class="mx-auto h-full" src="{{ asset('/storage/'.$temp->photo2) }}" title="Картинка 2" alt="Картинка 2">
    </a>
    @endif


  </div>

  <div class="swiper-pagination"></div>

  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>

@if (!empty($temp->price))
<div class="text-2xl font-bold my-5">{{$temp->price}} ₽</div>
@else
<div class="text-2xl font-bold my-5">Цена не указана</div>
@endif

<div class="font-semibold">Описание</div>
<p>
@if (!empty($temp->descr))  
{{$temp->descr}}
@else
Описание отсутствует
@endif
</p>


<div class="flex flex-row gap-2">
  <a href="tel:{{$temp->contact}}" class="bg-success text-2xl font-bold text-white my-3 p-3 rounded-lg">{{$temp->contact}}</a>
  @isset($temp->whatsapp)
  <a href="https://wa.me/{{$temp->contact}}" class="bg-success text-2xl font-bold text-white my-3 p-3 rounded-lg cursor-pointer">Написать в WhatsApp</a>
  @endisset
</div>
<div class="my-5 text-sm italic">Пользователь: {{$username}}</div>
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style mt-5">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_telegram"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_vk"></a>
<a class="a2a_button_copy_link"></a>
</div>
<script defer src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->

@endsection

@section('script')
<script>
window.addEventListener('load', function() {
  baguetteBox.run('.gallery');
});


const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
</script>
@endsection