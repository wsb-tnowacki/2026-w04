@extends('layout.layout')
@section('tytul', 'Szczegóły postu')
@section('podstrona', 'Szczegóły postu')
@section('tresc')
@isset($post)
    <div class="mb-2">
        <label for="tytul" class="block text-gray-700 font-bold mb-2">Tytuł</label>
        <input type="text" name="tytul" id="tytul" placeholder="Podaj tytuł postu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$post->tytul}}" required disabled>
    </div>
    <div class="mb-2">
        <label for="autor" class="block text-gray-700 font-bold mb-2">Autor</label>
        <div id="autor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            {{$post->user->name}}
        </div>
    </div>
    <div class="mb-2">
        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
        <div id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            {{$post->user->email}}
        </div>
    </div>
    <div class="mb-2">
        <label for="data" class="block text-gray-700 font-bold mb-2">Daty:</label>
        <div class=" appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">Data utworzenia: <b>{{$post->created_at->locale('pl')->setTimezone('Europe/Warsaw')->translatedFormat('j F Y H:i:s')}}</b> <br>Data edycji: <b>{{$post->updated_at->locale('pl')->setTimezone('Europe/Warsaw')->translatedFormat('j F Y H:i:s')}}</div>
    </div>
    <div class="mb-2">
        <label for="tresc" class="block text-gray-700 font-bold mb-2">Treść</label>
        <textarea name="tresc" id="tresc" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>{{$post->tresc}}</textarea>
    </div>
    <div class="flex items-center gap-x-2">

        <a href="{{route('post.index')}}" >
            <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Powrót do listy</button>
        </a>
        @auth
        <a href="{{route('post.edit', $post->id)}}" >
            <button type="button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Edytuj post</button>
        </a>
        <form action="{{route('post.destroy', $post->id)}}" method="post" onsubmit="return confirm('Czy na pewno chcesz usnunąć ten post?')">
            @method('DELETE')
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Usuń post</button>
        </form>     
        @endauth
               
    </div>    
@endisset
@endsection
