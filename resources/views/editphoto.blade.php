@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(0,0,0,0.5);">
                    <div class="card-header text-white">{{ __('Изменение профиля') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('home.editphoto') }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="d-flex gap-4 align-items-center justify-content-center">
                        <label class="form">
                            <i class="material-icons">attach_file</i>
                            <span class="form_title">Загрузить картинку</span>
                            <input name="image" type="file" class="ms-4"  id="imgInp">
                        </label>
                        @if(isset(Auth::user()->photo))
                            <img id="blah" class="image_edit" src="{{ asset(Auth::user()->photo) }}">
                        @else
                            <img id="blah" class="image_edit" src="#" alt="Нет фото">
                        @endif


                        <button type="submit" class="btn btn-primary">
                            {{ __('Изменить') }}
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
