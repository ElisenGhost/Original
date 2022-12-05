@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
        <div class="d-flex flex-column justify-content-between" style="height: 300px; width: auto">
            <div class="d-flex align-items-center justify-content-around text-center">
                @foreach ($trainers as $trainer)
                    <div>
                        <a href="{{route('usershow', ["id" => $trainer->id])}}" class="text-decoration-none text-black">
                            @if(isset($trainer->photo))
                                <img src="{{ asset($trainer->photo) }}"  class="rounded mx-auto d-block" width="100">
                            @else
                                <h4>Нет фото</h4>
                            @endif
                            <div class="h3"> {{$trainer->name}} </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
