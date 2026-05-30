@extends('layout.template')
@section('tytul', 'Edycja postu')
@section('podstrona', 'Formularz edycji posta')
@section('tresc')
@isset($post)
<form action="{{route('post.update', $post->id)}}" method="post" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 max00 font-bold mb-2 ">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="tytul" class="block text-gray-700 font-bold mb-2">Tytuł</label>
        <input type="text" name="tytul" id="tytul" placeholder="Podaj tytuł postu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="@if(old('tytul') !== null){{old('tytul')}}@else{{$post->tytul}}@endif" required >
        @error('tytul')
            <div class="text-red-400">{{$message}} </div>
        @enderror
    </div>
    <div class="mb-2">
        <label for="tresc" class="block text-gray-700 font-bold mb-2">Treść</label>
        <textarea name="tresc" id="tresc" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required >@if(old('tresc') !== null){{old('tresc')}}@else{{$post->tresc}}@endif</textarea>
        @error('tresc')
            <div class="text-red-400">{{$message}} </div>
        @enderror
    </div>
    <div class="flex items-center gap-x-2">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Zmień post</button>
        <a href="{{route('post.index')}}" >
            <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Powrót do listy</button>
        </a>
    </div>
</form>
@endisset
@endsection
