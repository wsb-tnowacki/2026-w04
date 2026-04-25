@extends('layout.layout')
@section('tytul','W04 - Lista postów')
@section('podtytul','Lista postów')
@section('tresc')
<div class="w-full ">
        {{-- @dump($posty) --}}
        @auth
        <div class="m-3">
            <a href="{{route('post.create')}}" class="mb-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Dodaj post</button>
            </a>
        </div>      
        @endauth
        <table class="table-fixed border border-gray-300 divide-y divide-gray-200 w-full rounded-lg">
            <thead>
                <tr>
                    <th scope="col" class="border border-gray-300 px-4 py-2">Lp</th>
                    <th scope="col" class="border border-gray-300 px-4 py-2">Tytuł</th>
                    <th scope="col" class="border border-gray-300 px-4 py-2">Autor</th>
                    <th scope="col" class="border border-gray-300 px-4 py-2">Data utworzenia</th>
                </tr>
            </thead>
            @isset($posty)
                @forelse ($posty as $post)
                    <tbody>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2" scope="row">{{ $post['id'] }}</th>
                            <td class="border border-gray-300 px-4 py-2">{{$post->tytul}}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $post->autor }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $post->created_at->locale('pl')->setTimezone('Europe/Warsaw')->translatedFormat('j F Y H:i:s') }}</td>
                        </tr>
                    </tbody>
                @empty
                <tbody>
                     <th  class="border border-gray-300 px-4 py-2 text-center" scope="row" colspan="4"> Nie ma żadnych postów</th>
                </tbody>
                @endforelse
            @else
                <tbody>
                     <th  class="border border-gray-300 px-4 py-2 text-center" scope="row" colspan="4"> Nie ma żadnych postów brak definicji postów</th>
                </tbody>

            @endisset
        </table>
        
    </div>

@endsection
