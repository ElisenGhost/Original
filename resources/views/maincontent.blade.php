@extends('layouts.app')

@section('content')
    <div class="container_slider_css">
        <img class="photo_slider_css" src="img/gym1.jpg" alt="">
        <img class="photo_slider_css" src="img/gym2.jpg" alt="">
        <img class="photo_slider_css" src="img/gym3.jpg" alt="">
        <img class="photo_slider_css" src="img/gym4.jpg" alt="">
    </div>

        <div class="text1">start changing now, together with BODYMANIA!</div>
        <button class="btn_main"  type="submit">Записаться на занятие</button>

    <content class="container-fluid">
        <div class="text2">УСЛУГИ</div>
        @foreach ($sports as $sport)
            <div>
                <img src="{{ $sport->photo }}"  class="rounded mx-auto d-block" width="150">
                {{$sport->title}}

            </div>
        @endforeach
        <div class="container-fluid">
            <div class="comm">ВЫБИРАЯ BODYMANIA, ВЫ ПОЛУЧАЕТЕ ЛУЧШЕЕ ДЛЯ СЕБЯ И СВОЕГО ЗДОРОВЬЯ</div>
        </div>
    </content>
@endsection
