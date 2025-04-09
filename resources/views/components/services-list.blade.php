@php
use Carbon\Carbon;
@endphp

@isset($services)
<div class="grid gap-3 grid-cols-3 md:grid-cols-4 md:gap-4 xl:grid-cols-5 2xl:grid-cols-6">
@foreach ($services as $temp)



<a href="{{route('service.temp', ['id'=>$temp->id] ) }}" 
    class=" group relative max-w-[300px] "
    title="{{$temp->title}}">

    @php
    $imgUrl = (!empty($temp->photo1)) ? asset('/storage/'.$temp->photo1) : asset('none-image.jpg');
    @endphp

    <div class=" overflow-hidden rounded-lg aspect-square group-hover:shadow-xl bg-cover bg-center bg-[url({{$imgUrl}})]"></div>
    <h2 class="text-sm">{{$temp->title}}</h2>
    <div class="text-md font-semibold">{{$temp->price}} ₽</div>
    <div class=" text-xs text-gray-400">{{Carbon::parse($temp->created_at)->diffForHumans() }}</div>

</a>


@endforeach
</div>
@endisset