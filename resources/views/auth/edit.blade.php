@extends('app')

@section('main')
<script type="module" src="https://unpkg.com/cally"></script>


<a class="btn btn-xs mb-4" href="{{route('lk')}}">Вернуться</a>
<h1 class="text-3xl font-bold text-center mb-4">Редактировать профиль "{{$user->name}}"</h1>

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



<form action="" method="POST" enctype="multipart/form-data" class="mx-10">
@csrf

<fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Имя<span class="text-error">*</span></legend>
  <input name="name" type="text" class="input w-full" value="{{old('name') ? old('name') : $user->name}}" placeholder="Введите имя" required />
</fieldset>

<fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Фамилия</legend>
  <input name="fam" type="text" class="input w-full" value="{{old('fam') ? old('fam') : $user->fam}}" placeholder="Введите фамилию"  />
</fieldset>

<fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Отчество</legend>
  <input name="otch" type="text" class="input w-full" value="{{old('otch') ? old('otch') : $user->otch}}" placeholder="Введите отчество" />
</fieldset>

<fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Пол</legend>
  <select name="pol" class="select w-full">
    <option {{$user["pol"] == '' ? 'selected' : '' }}></option>
    <option {{$user["pol"] == 'Мужской' ? 'selected' : '' }}>Мужской</option>
    <option {{$user["pol"] == 'Женский' ? 'selected' : '' }}>Женский</option>
  </select>
</fieldset>

<fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Дата рождения</legend>
  <input name="birthday" type="date" class="input w-full" value="{{old('birthday') ? old('birthday') : $user->birthday}}" placeholder="Введите отчество" />
</fieldset>

<fieldset class="fieldset">
  <legend class="fieldset-legend">Аватар</legend>
  <img class="max-w-[400px] rounded-lg" src="{{asset('/storage/'.$user->avatar)}} " >
  <input name="avatar" type="file" class="file-input" />
  <label class="fieldset-label">Макс. размер 2 МБ</label>
</fieldset>


<p class="my-4 text-xs"><span class="text-error">*</span> - обязательные поля</p>
<button class="btn btn-primary">Внести изменения</button>
</form>




@endsection

@section('title')
Редактировать объявления
@endsection

@section('head')
<meta name="robots" content="none">
@endsection