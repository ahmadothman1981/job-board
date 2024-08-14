<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       
        <title>Laravel Job Board</title>

       
    </head>
    <body  class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90%" >
      
      <nav class="flex mb-8 text-lg font-medium text-slate-500 justify-between">
        <ul class="flex space-x-4">
          <li><a href="{{route('jobs.index')}}">Home</a></li>
        </ul>
        <ul class="flex space-x-4">
          @auth
          <li><a href="{{route('my-job-applications.index')}}">{{auth()->user()->name??'Guest'}} : Applications</a></li>
      <li>
          <form action="{{route('auth.destroy')}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Logout</button>
          </form>
      </li>
          @else
          <li><a href="{{route('auth.create')}}">Signin</a></li>
          @endauth
        </ul>
      </nav>

      @if(session('success'))
  <div role="alert" class="my-8 rounded-md boarder-l-4 boarder-green-300 bg-green-100 p-4 text-green-700 opaccity-75">
    <p class="font-bold">Success!</p>
     <p>{{session('success')}}</p>
  </div>

      @endif

      
      @if(session('error'))
  <div role="alert" class="my-8 rounded-md boarder-l-4 boarder-red-300 bg-red-100 p-4 text-red-700 opaccity-75">
    <p class="font-bold">Error!</p>
     <p>{{session('error')}}</p>
  </div>

      @endif
      {{ $slot }}
    </body>
</html>
