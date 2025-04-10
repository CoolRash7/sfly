@extends('app')

@section('main')



<a class="btn btn-xs mb-4" href="{{route('admin.all')}}">Вернуться</a>
<h1 class="text-3xl font-bold text-center mb-4">Добавить объявления</h1>

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
<div class="flex flex-col md:flex-row gap-4 mb-4">
  <fieldset class="fieldset w-full">
    <legend class="fieldset-legend">Категория<span class="text-error">*</span></legend>
    <select class="select w-full" name="category" value="{{old('category')}}" required>
      <option value="" disabled selected>Категория</option>
      <option value="stroitelstvo_i_remont" {{ old('category') == 'stroitelstvo_i_remont' ? 'selected' : '' }}>Строительство и ремонт</option>
      <option value="santehniki" {{ old('category') == 'santehniki' ? 'selected' : '' }}>Сантехники</option>
      <option value="elektriki" {{ old('category') == 'elektriki' ? 'selected' : '' }}>Электрики</option>
      <option value="remont_ustanovka_tehniki" {{ old('category') == 'remont_ustanovka_tehniki' ? 'selected' : '' }}>Ремонт, установка техники</option>
      <option value="gruzchiki" {{ old('category') == 'gruzchiki' ? 'selected' : '' }}>Грузчики</option>
      <option value="spectehnika" {{ old('category') == 'spectehnika' ? 'selected' : '' }}>Спецтехника</option>
      <option value="transportirovka" {{ old('category') == 'transportirovka' ? 'selected' : '' }}>Транспортировка</option>
      <option value="avtoservis" {{ old('category') == 'avtoservis' ? 'selected' : '' }}>Автосервис</option>
      <option value="buhgalteriya_i_finansy" {{ old('category') == 'buhgalteriya_i_finansy' ? 'selected' : '' }}>Бухгалтерия и финансы</option>
      <option value="detskie_sady_nyani_sidelki" {{ old('category') == 'detskie_sady_nyani_sidelki' ? 'selected' : '' }}>Детские сады, няни, сиделки</option>
      <option value="krasota_i_zdorove" {{ old('category') == 'krasota_i_zdorove' ? 'selected' : '' }}>Красота и здоровье</option>
      <option value="kursy_seminary_treningi" {{ old('category') == 'kursy_seminary_treningi' ? 'selected' : '' }}>Курсы, семинары, тренинги</option>
      <option value="master_na_chas" {{ old('category') == 'master_na_chas' ? 'selected' : '' }}>Мастер на час</option>
      <option value="mebel_remont_i_izgotovlenie" {{ old('category') == 'mebel_remont_i_izgotovlenie' ? 'selected' : '' }}>Мебель, ремонт и изготовление</option>
      <option value="obuchenie_repetitorstvo" {{ old('category') == 'obuchenie_repetitorstvo' ? 'selected' : '' }}>Обучение, репетиторство</option>
      <option value="poshiv_remont_odezhdy_obuvi" {{ old('category') == 'poshiv_remont_odezhdy_obuvi' ? 'selected' : '' }}>Пошив, ремонт одежды, обуви</option>
      <option value="prazdniki_i_meropriyatiya" {{ old('category') == 'prazdniki_i_meropriyatiya' ? 'selected' : '' }}>Праздники и мероприятия</option>
      <option value="rabota_s_tekstom_perevody" {{ old('category') == 'rabota_s_tekstom_perevody' ? 'selected' : '' }}>Работа с текстом, переводы</option>
      <option value="reklama_i_poligrafiya" {{ old('category') == 'reklama_i_poligrafiya' ? 'selected' : '' }}>Реклама и полиграфия</option>
      <option value="remont_komputerov_mobilnyh_ustroistv" {{ old('category') == 'remont_komputerov_mobilnyh_ustroistv' ? 'selected' : '' }}>Ремонт компьютеров, мобильных устройств</option>
      <option value="slesari" {{ old('category') == 'slesari' ? 'selected' : '' }}>Слесари</option>
      <option value="sozdanie_saitov_podderzhka_po" {{ old('category') == 'sozdanie_saitov_podderzhka_po' ? 'selected' : '' }}>Создание сайтов, поддержка ПО</option>
      <option value="uborka_pomeshenii_territorii" {{ old('category') == 'uborka_pomeshenii_territorii' ? 'selected' : '' }}>Уборка помещений, территорий</option>
      <option value="foto_i_videosemka" {{ old('category') == 'foto_i_videosemka' ? 'selected' : '' }}>Фото- и видеосъемка</option>
      <option value="uridicheskie_uslugi" {{ old('category') == 'uridicheskie_uslugi' ? 'selected' : '' }}>Юридические услуги</option>
      <option value="drugoe" {{ old('category') == 'drugoe' ? 'selected' : '' }}>Другое</option>
    </select>
    <!-- <span class="fieldset-label">Optional</span> -->
  </fieldset>

  <fieldset class="fieldset w-full">
    <legend class="fieldset-legend">Рубрика<span class="text-error">*</span></legend>
    <select class="select w-full" name="rubric" required>
      <option value="" disabled selected>Рубрика</option>
      <option value="okazyvau_uslugi" {{ old('rubric') == 'okazyvau_uslugi' ? 'selected' : '' }}>Оказываю услуги</option>
      <option value="vospolzuus_uslugami" {{ old('rubric') == 'vospolzuus_uslugami' ? 'selected' : '' }}>Воспользуюсь услугами</option>
    </select>
    <!-- <span class="fieldset-label">Optional</span> -->
  </fieldset>
</div>

<fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Заголовок<span class="text-error">*</span></legend>
  <input name="title" type="text" class="input w-full" value="{{old('title')}}" placeholder="Название услуги" required />
  <p class="fieldset-label">Название не должно превышать 50 символов</p>
</fieldset>

<fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Цена (₽)</legend>
  <input name="price" type="number" class="input" placeholder="Укажите цену" />
</fieldset>

<fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Описание</legend>
  <textarea name="descr" class="textarea h-24 w-full" placeholder="Введите описание услуги"></textarea>
  <div class="fieldset-label">До 3000 символов</div>
</fieldset>

<fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Номер телефона (8XXXXXXXXXX)<span class="text-error">*</span></legend>
  <input name="contact" type="tel" class="input" pattern="[0-9]{11}" maxlength="11"  class="input" placeholder="Введите номер телефона" required/>
</fieldset>

<fieldset class="fieldset mb-4 flex flex-row items-center">
    <input name="whatsapp" type="checkbox" checked="checked" value="1" class="checkbox" />
    <span>Есть WhatsApp</span>

</fieldset>

<!-- <fieldset class="fieldset mb-4">
  <legend class="fieldset-legend">Теги</legend>
  <input type="text" class="input w-full" placeholder="Введите теги" />
  <p class="fieldset-label"></p>
</fieldset> -->

<fieldset class="fieldset">
  <legend class="fieldset-legend">Фото 1</legend>
  <input name="photo1" type="file" class="file-input" />
  <label class="fieldset-label">Макс. размер 2 МБ</label>
</fieldset>

<fieldset class="fieldset">
  <legend class="fieldset-legend">Фото 2</legend>
  <input name="photo2" type="file" class="file-input" />
  <label class="fieldset-label">Макс. размер 2 МБ</label>
</fieldset>
<fieldset class="fieldset">
  <legend class="fieldset-legend">Фото 3</legend>
  <input name="photo3" type="file" class="file-input" />
  <label class="fieldset-label">Макс. размер 2 МБ</label>
</fieldset>
<fieldset class="fieldset">
  <legend class="fieldset-legend">Фото 4</legend>
  <input name="photo4" type="file" class="file-input" />
  <label class="fieldset-label">Макс. размер 2 МБ</label>
</fieldset>
<fieldset class="fieldset">
  <legend class="fieldset-legend">Фото 5</legend>
  <input name="photo5" type="file" class="file-input" />
  <label class="fieldset-label">Макс. размер 2 МБ</label>
</fieldset>


<p class="my-4 text-xs"><span class="text-error">*</span> - обязательные поля</p>
<button class="btn btn-primary">Добавить объявления</button>
</form>



@endsection

@section('title')
Добавить объявления
@endsection

@section('head')
<meta name="robots" content="none">
@endsection