@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
        <div class="d-flex flex-column justify-content-between " style="height: 300px; width: auto">
            <div class="d-flex align-items-center justify-content-around  text-center">
                @foreach ($trainers as $trainer)
                    <div>
                        <img src="{{ $trainer->photo }}"  class="rounded mx-auto d-block" width="150">
                        {{$trainer->name}}

                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
