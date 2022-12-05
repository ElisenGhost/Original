@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 110vh;">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">{{ __('Чат') }} c {{ $recipient->name }}</div>

                    <div class="card-body" style="width: 110vh;">
                        <div>
                            @foreach ($messages as $message)
                                @if($message->sender->id == Auth::user()->id)
                                    <div class="alert alert-primary col-sm-2 h5 " role="alert">
                                        {{$message->message}}
                                    </div>
                                @else
                                    <div class="d-flex justify-content-end">
                                        <div class="alert alert-secondary col-sm-2 h5" role="alert">
                                            {{$message->message}}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <form method="POST" action="{{route('messagesend', ['recipient' => $recipient])}}">
                            @csrf
                            <input type="text" class="col-sm-10" name="content" >
                            <button type="submit" class="btn btn-primary ms-3">
                                {{ __('Отправить') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
