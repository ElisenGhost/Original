@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(0,0,0,0.5);">
                    <div class="card-header text-white">{{ __('Изменение профиля') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('home.edit') }}">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="row mb-3">
                                <label for="Full_name" class="col-md-4 col-form-label text-md-end text-white">{{ __('ФИО') }}</label>

                                <div class="col-md-6">
                                    <input id="Full_name" type="text" class="form-control @error('Full_name') is-invalid @enderror" name="Full_name" autofocus value="{{ Auth()->user()->Full_name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end text-white">{{ __('email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autofocus value="{{ Auth()->user()->email }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date_of_born" class="col-md-4 col-form-label text-md-end text-white">{{ __('Дата рождения') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_born" type="date" class="form-control @error('date_of_born') is-invalid @enderror" name="date_of_born" autofocus value="{{ Auth()->user()->date_of_born }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end text-white">{{ __('Телефон') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ Auth()->user()->phone }}" name="phone" placeholder="+7 (900) 123-45-67" pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="country" class="col-md-4 col-form-label text-md-end text-white">{{ __('Город') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" list="country-list" class="form-control @error('country') is-invalid @enderror" name="country" autofocus value="{{ Auth()->user()->country }}">
                                    <datalist id="country-list">
                                        <option value="Москва">
                                    </datalist>
                                </div>
                            </div>

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Изменить') }}
                                    </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
