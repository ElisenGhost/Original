@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="container justify-content-center d-flex">
            <div class="col-md-8 mb-3 d-flex flex-row gap-4 flex-wrap">
                <div class="card col-md-4">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if(isset(Auth::user()->photo))
                                <img src="{{ asset(Auth::user()->photo) }}"  class="rounded mx-auto d-block" width="250">
                            @else
                                <h4>Нет фото</h4>
                            @endif
                            <div class="mt-1">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p class="text-secondary mb-1">
                                    @if(Auth::user()->role_id == 2)
                                        Пользователь
                                    @elseif(Auth::user()->role_id == 1)
                                        Администатор
                                    @elseif(Auth::user()->role_id == 3)
                                        Тренер по плаванию
                                    @elseif(Auth::user()->role_id == 4)
                                        Тренер по залу
                                    @endif
                                </p>
                                <a class="btn btn-primary text-white" id="editInfoButton" href="{{route('home.editphotopage')}}" >Изменить фото</a>
                                <p></p>
                                <a class="btn btn-outline-primary col-sm" href="{{route('messages')}}">Сообщения</a>
                                @if (Auth::user()->role_id == 1)
                                    <a class="btn btn-outline-primary col-sm" href="{{route('admin')}}">Пользователи</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Имя</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->Full_name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Дата рождения</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->date_of_born }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Телефон</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->phone }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Город</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" >
                                    {{ Auth::user()->country }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="btn btn-info text-white" id="editInfoButton" href="{{route('home.editpage')}}" >Изменить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
