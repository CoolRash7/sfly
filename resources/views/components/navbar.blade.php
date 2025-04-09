<nav class="navbar bg-base-100/60  z-1 backdrop-blur-xs ">
  <div class="flex-none">
  <label for="my-drawer-2" class="drawer-button btn btn-square btn-ghost lg:hidden">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path> </svg>
  </label>

  </div>
  <div class="flex-1">
    <a href="/" class="btn btn-ghost text-xl">
        <img src="{{asset('favicon.svg')}}" height='25' width='25'>
        <div>Service Fly</div>
    </a>
  </div>
  <div class="flex-none">

  @auth<a href="{{route('lk')}}" class="btn btn-sm">{{Auth::user()->name}}</a>@endauth
  @guest<a href="{{route('login')}}" class="btn btn-sm">Войти</a>@endguest
  </div>
</nav>