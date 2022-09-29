<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png/ico" href="{{ asset('img/FACAD_icon.ico') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facade - @yield('titulo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
         .btn-facade {
            background-image: linear-gradient(to right, #ECE9E6 0%, #FFFFFF  51%, #ECE9E6  100%);
            transition: 0.5s;
            background-size: 200% auto;        
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
          }

          .btn-facade:hover {
            background-position: right center;
            color: #F24FFF;
            text-decoration: none;
          }
         
    </style>
    @livewireStyles
</head>
<body>
 <header class="p-5 border-b bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">
            <a href="/" title="">
                <img src="{{ asset('img/facade_logo.png') }}" width="200" height="200" alt="logo">
            </a>
        </h1>
        @auth
        <nav class="flex gap-2 items-center">
            <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer btn-facade" href="{{ route('posts.create') }}" title="">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg> 
              Crear
          </a>
          <a class="font-bold text-gray-600 text-sm"  href="{{ route('post.index', auth()->user()->username) }}">
            Hola: <span class="font-normal">{{ auth()->user()->username }}</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
               Cerrar Sesión
           </button>
       </form>   
   </nav>
   @endauth
   @guest
   <nav class="flex gap-2 items-center">
    <a class="font-bold uppercase text-gray-600 text-sm"  href="{{ route('login') }}">
        Login
    </a>
    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">
       Crear Cuenta
   </a>
</nav>
@endguest
</div>
</header>
<main class="container mx-auto mt-10">
    <h2 class="font-black text-center text-3xl mb-10">
        @yield('titulo')
    </h2>
    @yield('contenido')
</main>
<footer class="text-center p-5 text-gray-600 font-bold uppercase mt-10">
 Facade - Todos los derechos reservados {{ now()->year }} 

 <p class="text-gray-100 text-center text-sm">José Martínez - Laravel 9</p>
</footer>

@livewireScripts
</body>
</html>