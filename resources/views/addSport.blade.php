@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(0,0,0,0.5);">
                    <div class="card-header text-white">{{ __('Добавления вида сорта') }}</div>

                    <div class="card-body">
                        <form action="{{route('admin.addSport')}}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end text-white">Название</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autofocus required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end text-white">Описание</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end text-white">Фото</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('photo') is-invalid @enderror" name="image" autofocus required>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
