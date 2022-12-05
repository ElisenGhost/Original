@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(0,0,0,0.5);">
                    <div class="card-header text-white">{{ __('Изменение роли') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.changerole', ['user' => $user->id]) }}">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="row mb-3">
                                <label for="role_id" class="col-md-4 col-form-label text-md-end text-white">Выберите роль:</label>

                                <div class="col-sm mt-5">
                                    @foreach($roles as $role)
                                        <div class="d-flex mb-3">
                                            <input type="radio" class="col-sm-1 me-2" name="role_id" value="{{$role->id}}" @if($role->id == $user->role_id) checked @endif>
                                            <label for="2" class="text-white h6">{{$role->name}}</label>
                                        </div>
                                    @endforeach
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
