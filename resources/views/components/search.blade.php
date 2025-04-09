<form action="{{route('search')}}"class="bg-blue-800 p-5 rounded-lg flex flex-row gap-2">
    <div class=" w-full">
        <label class="input w-full mb-4">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
            <input name="q" type="search" class="grow" placeholder="Поиск" value="{{request('q')}}"/>
        </label>
        <div class="w-full flex flex-col md:flex-row gap-2">
            <select name="category" class="select w-full">
                <option value=""  {{ request('category') == '' ? 'selected' : '' }}>Категория</option>
                <option value="stroitelstvo_i_remont" {{ request('category') == 'stroitelstvo_i_remont' ? 'selected' : '' }}>Строительство и ремонт</option>
                <option value="santehniki" {{ request('category') == 'santehniki' ? 'selected' : '' }}>Сантехники</option>
                <option value="elektriki" {{ request('category') == 'elektriki' ? 'selected' : '' }}>Электрики</option>
                <option value="remont_ustanovka_tehniki" {{ request('category') == 'remont_ustanovka_tehniki' ? 'selected' : '' }}>Ремонт, установка техники</option>
                <option value="gruzchiki" {{ request('category') == 'gruzchiki' ? 'selected' : '' }}>Грузчики</option>
                <option value="spectehnika" {{ request('category') == 'spectehnika' ? 'selected' : '' }}>Спецтехника</option>
                <option value="transportirovka" {{ request('category') == 'transportirovka' ? 'selected' : '' }}>Транспортировка</option>
                <option value="avtoservis" {{ request('category') == 'avtoservis' ? 'selected' : '' }}>Автосервис</option>
                <option value="buhgalteriya_i_finansy" {{ request('category') == 'buhgalteriya_i_finansy' ? 'selected' : '' }}>Бухгалтерия и финансы</option>
                <option value="detskie_sady_nyani_sidelki" {{ request('category') == 'detskie_sady_nyani_sidelki' ? 'selected' : '' }}>Детские сады, няни, сиделки</option>
                <option value="krasota_i_zdorove" {{ request('category') == 'krasota_i_zdorove' ? 'selected' : '' }}>Красота и здоровье</option>
                <option value="kursy_seminary_treningi" {{ request('category') == 'kursy_seminary_treningi' ? 'selected' : '' }}>Курсы, семинары, тренинги</option>
                <option value="master_na_chas" {{ request('category') == 'master_na_chas' ? 'selected' : '' }}>Мастер на час</option>
                <option value="mebel_remont_i_izgotovlenie" {{ request('category') == 'mebel_remont_i_izgotovlenie' ? 'selected' : '' }}>Мебель, ремонт и изготовление</option>
                <option value="obuchenie_repetitorstvo" {{ request('category') == 'obuchenie_repetitorstvo' ? 'selected' : '' }}>Обучение, репетиторство</option>
                <option value="poshiv_remont_odezhdy_obuvi" {{ request('category') == 'poshiv_remont_odezhdy_obuvi' ? 'selected' : '' }}>Пошив, ремонт одежды, обуви</option>
                <option value="prazdniki_i_meropriyatiya" {{ request('category') == 'prazdniki_i_meropriyatiya' ? 'selected' : '' }}>Праздники и мероприятия</option>
                <option value="rabota_s_tekstom_perevody" {{ request('category') == 'rabota_s_tekstom_perevody' ? 'selected' : '' }}>Работа с текстом, переводы</option>
                <option value="reklama_i_poligrafiya" {{ request('category') == 'reklama_i_poligrafiya' ? 'selected' : '' }}>Реклама и полиграфия</option>
                <option value="remont_komputerov_mobilnyh_ustroistv" {{ request('category') == 'santremont_komputerov_mobilnyh_ustroistvehniki' ? 'selected' : '' }}>Ремонт компьютеров, мобильных устройств</option>
                <option value="slesari" {{ request('category') == 'slesari' ? 'selected' : '' }}>Слесари</option>
                <option value="sozdanie_saitov_podderzhka_po" {{ request('category') == 'sozdanie_saitov_podderzhka_po' ? 'selected' : '' }}>Создание сайтов, поддержка ПО</option>
                <option value="uborka_pomeshenii_territorii" {{ request('category') == 'uborka_pomeshenii_territorii' ? 'selected' : '' }}>Уборка помещений, территорий</option>
                <option value="foto_i_videosemka" {{ request('category') == 'foto_i_videosemka' ? 'selected' : '' }}>Фото- и видеосъемка</option>
                <option value="uridicheskie_uslugi" {{ request('category') == 'uridicheskie_uslugi' ? 'selected' : '' }}>Юридические услуги</option>
                <option value="drugoe" {{ request('category') == 'drugoe' ? 'selected' : '' }}>Другое</option>
            </select>

            <select name="rubric" class="select w-full">
                <option value="" {{ request('rubric') == '' ? 'selected' : '' }}>Рубрика</option>
                <option value="okazyvau_uslugi" {{ request('rubric') == 'okazyvau_uslugi' ? 'selected' : '' }}>Оказываю услуги</option>
                <option value="vospolzuus_uslugami" {{ request('rubric') == 'vospolzuus_uslugami' ? 'selected' : '' }}>Воспользуюсь услугами</option>
            </select>
        </div>
    </div>
    <button class="btn">Поиск</button>

</form>