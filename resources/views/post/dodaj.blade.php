@extends('layout.layout')
@section('tytul','W04 - Dodanie posta')
@section('podtytul','Formularz dodania posta')
@section('tresc')
<div class="w-full ">
    <form action="{{route('post.store')}}" method="post" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 max00 font-bold mb-2 ">
    @csrf
    <div class="mb-2">
        <label for="tytul" class="block text-gray-700 font-bold mb-2">Tytuł</label>
        <input type="text" name="tytul" id="tytul" placeholder="Podaj tytuł postu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{old('tytul')}}" required>
        @error('tytul')
            <div class="text-red-400">{{$message}} </div>
        @enderror
    </div>
    <div class="mb-2">
        <label for="tresc" class="block text-gray-700 font-bold mb-2">Treść</label>
        <textarea name="tresc" id="tresc" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{old('tresc')}}</textarea>
    </div>
    @error('tresc')
            <div class="text-red-400">{{$message}} </div>
        @enderror
    <div class="flex items-center gap-x-2">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Dodaj post</button>
        <a href="{{route('post.index')}}" >
            <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Powrót do listy</button>
        </a>
    </div>
</form>
</div>

@endsection
