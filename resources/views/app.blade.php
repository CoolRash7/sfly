<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="{{asset('favicon.svg')}}" type="image/svg">
    <link rel="icon" href="{{asset('favicon.svg')}}" type="image/icon-x">
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">

    @yield('head')
</head>
<body>


    <x-navbar/>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <main class="drawer-content  w-full p-4  h-full ">
        
        @yield('main')
        </main>
        <x-sidebar/>
    </div>
    <x-footer/>

    @yield('script')
</body>
</html>