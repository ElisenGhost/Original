@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
        <div class="d-flex flex-column justify-content-between" style="height: 300px; width: auto">
            <div class="d-flex align-items-center justify-content-around text-center">
                @foreach ($users as $user)
                    <div>
                        <a href="{{route('usershow', ["id" => $user->id])}}" class="text-decoration-none text-black">
                            @if(isset($user->photo))
                                <img src="{{ asset($user->photo) }}"  class="rounded mx-auto d-block" width="150">
                            @else
                                <h4>Нет фото</h4>
                            @endif
                            <div class="h3"> {{$user->name}} </div>
                        </a>
                        <a class="btn btn-outline-primary" href="{{route('chat', ["recipient" => $user->id])}}">Отправить сообщение</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
