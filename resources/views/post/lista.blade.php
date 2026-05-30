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
                    @auth
                    <th scope="col" class="border border-gray-300 px-4 py-2">Akcja</th>                        
                    @endauth
                </tr>
            </thead>
            @isset($posty)
            {{-- @php($lp = 1) --}}
            @php($lp=$posty->firstItem())
                @forelse ($posty as $post)
                    <tbody>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2" scope="row">{{ $lp++ }}</th>
                            <td class="border border-gray-300 px-4 py-2"><a href="{{route('post.show',$post->id)}}">{{$post->tytul}}</a></td>
                            <td class="border border-gray-300 px-4 py-2">{{ $post->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $post->created_at->locale('pl')->setTimezone('Europe/Warsaw')->translatedFormat('j F Y H:i:s') }}</td>
                            @auth
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex items-center gap-x-2">
                                <a href="{{route('post.edit', $post->id)}}" >
                                <button type="button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">E</button>
                                </a>
                                <form action="{{route('post.destroy', $post->id)}}" method="post" onsubmit="return confirm('Czy na pewno chcesz usnunąć ten post?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">X</button>
                                </form>
                                </div>
                            </td> 
                            @endauth
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
        @isset($posty)
<div class="my-2">{{$posty->onEachSide(1)->links()}}</div>
    
@endisset
    </div>
@endsection