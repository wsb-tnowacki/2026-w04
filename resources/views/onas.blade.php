@extends('layout.layout')
@section('tytul', 'WSB - O nas')
@section('podtytul', 'Strona informacyjna')
@section('tresc')
    <div>
        Treść strony onas <br>
        <ol>
            @isset($zadania)
                @foreach ($zadania as $zadanie)
                    <li>{{ $zadanie}}</li>
                @endforeach  
            @endisset
        </ol>
    </div>
@endsection