<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function serviceTemp(int $id) {   
        $temp = Service::where('id', $id)->first();
        $username = User::where('id', $temp->user_id)->first()->name ?? 'Пользователь удален';
        return view('service', compact('temp', 'username'));
    }

    public function search(Request $request) {

        $q = $request->input('q');
        $category = $request->input('category');
        $rubric = $request->input('rubric');

        // if (empty($q))
        //     return route('home');

        $title = 'Поиск по запросу: '.$q;

        $query = Service::query();

        if (!empty($category))
            $query->where('category', $category);

        if (!empty($rubric))
            $query->where('rubric', $rubric);

        if (!empty($q)) {
            $_q = '%'.$q.'%';
            $query->whereLike('title', $_q)->orWhereLike('descr', $_q);
        }

        $services = $query->orderByDesc('id')->get();

        return view('home', compact('services', 'title') );
    }

    //Домашняя страница
    public function home() {
        $services = Service::orderByDesc('id')->get();
        $title="Добро пожаловать в Service Fly";
        $icon='favicon.svg';
        return view('home', compact('services', 'title', 'icon') );
    }

    //категории
    public function stroitelstvo_i_remont() {
        $services = Service::where('category', 'stroitelstvo_i_remont')->orderByDesc('id')->get();
        $title = 'Строительство и ремонт';
        $icon='icon/BuildingConstruction.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function santehniki() {
        $services = Service::where('category', 'santehniki')->orderByDesc('id')->get();
        $title = 'Сантехники';
        $icon = 'icon/WarpPipe.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function elektriki() {
        $services = Service::where('category', 'elektriki')->orderByDesc('id')->get();
        $title = 'Электрики';
        $icon = 'icon/Lightbulb.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function remont_ustanovka_tehniki() {
        $services = Service::where('category', 'remont_ustanovka_tehniki')->orderByDesc('id')->get();
        $title = 'Ремонт, установка техники';
        $icon = 'icon/Settings.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function gruzchiki() {
        $services = Service::where('category', 'gruzchiki')->orderByDesc('id')->get();
        $title = 'Грузчики';
        $icon = 'icon/Box.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function spectehnika() {
        $services = Service::where('category', 'spectehnika')->orderByDesc('id')->get();
        $title = 'Спецтехника';
        $icon = 'icon/Tractor.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function transportirovka() {
        $services = Service::where('category', 'transportirovka')->orderByDesc('id')->get();
        $title = 'Транспортировка';
        $icon = 'icon/Deliverytruck.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function avtoservis() {
        $services = Service::where('category', 'avtoservis')->orderByDesc('id')->get();
        $title = 'Автосервис';
        $icon = 'icon/auto.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function buhgalteriya_i_finansy() {
        $services = Service::where('category', 'buhgalteriya_i_finansy')->orderByDesc('id')->get();
        $title = 'Бухгалтерия и финансы';
        $icon = 'icon/calc.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function detskie_sady_nyani_sidelki() {
        $services = Service::where('category', 'detskie_sady_nyani_sidelki')->orderByDesc('id')->get();
        $title = 'Детские сады, няни, сиделки';
        $icon = 'icon/BabyLightSkinTone.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function krasota_i_zdorove() {
        $services = Service::where('category', 'krasota_i_zdorove')->orderByDesc('id')->get();
        $title = 'Красота и здоровье';
        $icon = 'icon/HeartSuit.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function kursy_seminary_treningi() {
        $services = Service::where('category', 'kursy_seminary_treningi')->orderByDesc('id')->get();
        $title = 'Курсы, семинары, тренинги';
        $icon = 'icon/Graduationcap-2.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function master_na_chas() {
        $services = Service::where('category', 'master_na_chas')->orderByDesc('id')->get();
        $title = 'Мастер на час';
        $icon = 'icon/worker.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function mebel_remont_i_izgotovlenie() {
        $services = Service::where('category', 'mebel_remont_i_izgotovlenie')->orderByDesc('id')->get();
        $title = 'Мебель, ремонт и изготовление';
        $icon = 'icon/CouchAndLamp.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function obuchenie_repetitorstvo() {
        $services = Service::where('category', 'obuchenie_repetitorstvo')->orderByDesc('id')->get();
        $title = 'Обучение, репетиторство';
        $icon = 'icon/Teacher.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function poshiv_remont_odezhdy_obuvi() {
        $services = Service::where('category', 'poshiv_remont_odezhdy_obuvi')->orderByDesc('id')->get();
        $title = 'Пошив, ремонт одежды, обуви';
        $icon = 'icon/WomansClothes.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function prazdniki_i_meropriyatiya() {
        $services = Service::where('category', 'prazdniki_i_meropriyatiya')->orderByDesc('id')->get();
        $title = 'Праздники и мероприятия';
        $icon = 'icon/BirthdayCake.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function rabota_s_tekstom_perevody() {
        $services = Service::where('category', 'rabota_s_tekstom_perevody')->orderByDesc('id')->get();
        $title = 'Работа с текстом, переводы';
        $icon = 'icon/BookmarkTabs.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function reklama_i_poligrafiya() {
        $services = Service::where('category', 'reklama_i_poligrafiya')->orderByDesc('id')->get();
        $title = 'Реклама и полиграфия';
        $icon = 'icon/Print.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function remont_komputerov_mobilnyh_ustroistv() {
        $services = Service::where('category', 'remont_komputerov_mobilnyh_ustroistv')->orderByDesc('id')->get();
        $title = 'Ремонт компьютеров, мобильных устройств';
        $icon = 'icon/MobilePhone.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function slesari() {
        $services = Service::where('category', 'slesari')->orderByDesc('id')->get();
        $title = 'Слесари';
        $icon = 'icon/FactoryWorker.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function sozdanie_saitov_podderzhka_po() {
        $services = Service::where('category', 'sozdanie_saitov_podderzhka_po')->orderByDesc('id')->get();
        $title = 'Создание сайтов, поддержка ПО';
        $icon = 'icon/UserInterface.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function uborka_pomeshenii_territorii() {
        $services = Service::where('category', 'uborka_pomeshenii_territorii')->orderByDesc('id')->get();
        $title = 'Уборка помещений, территорий';
        $icon = 'icon/ClearOutlined.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function foto_i_videosemka() {
        $services = Service::where('category', 'foto_i_videosemka')->orderByDesc('id')->get();
        $title = 'Фото- и видеосъемка';
        $icon = 'icon/CamcorderPro.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function uridicheskie_uslugi() {
        $services = Service::where('category', 'uridicheskie_uslugi')->orderByDesc('id')->get();
        $title = 'Юридические услуги';
        $icon = 'icon/BalanceScale.svg';
        return view('home', compact('services', 'title', 'icon'));
    }

    public function drugoe() {
        $services = Service::where('category', 'drugoe')->orderByDesc('id')->get();
        $title = 'Другое';
        $icon = 'icon/Folder.svg';
        return view('home', compact('services', 'title', 'icon'));
    }


}
