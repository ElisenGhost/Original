@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
        <div class="d-flex flex-column justify-content-between" style="height: 300px; width: auto">
            <div class="d-flex align-items-center justify-content-around text-center">
                @if(Auth::user()->role_id == 1)
                    @foreach ($users as $user)
                        <a href="{{route('usershow', ["id" => $user->id])}}" class="text-decoration-none text-black">
                            @if(isset($user->photo))
                                <img src="{{ asset($user->photo) }}"  class="rounded mx-auto d-block" width="150">
                            @else
                                <h4>Нет фото</h4>
                            @endif
                            <div class="h3 me-2-1"> {{$user->name}}
                                @if (Auth::user()->name == $user->name)
                                    (Вы)
                                @endif
                            </div>
                                <p class="text-secondary mb-1">
                                    @if($user->role_id == 2)
                                        Пользователь
                                    @elseif($user->role_id == 1)
                                        Администатор
                                    @elseif($user->role_id == 3)
                                        Тренер по плаванию
                                    @elseif($user->role_id == 4)
                                        Тренер по залу
                                    @endif
                                </p>
                        </a>
                    @endforeach
                @else

                @endif
            </div>
        </div>
    </div>

@endsection
