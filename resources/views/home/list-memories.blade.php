@extends('layouts.default')
@section('content')
    @include('includes.alerts')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
    @extends('home.nav')
    <div class="respect-height-nav row col-lg-12">
        @foreach($memories as $memory)
            <div class="col-lg-3 all-memories">
                <div class="center">
                </div>
                <div class="col-lg-12 center relative">
                    <img id="image-user" class="card-img-top" src="{{ asset('storage/memoirs').'/'.$memory->image }}" alt="Card image cap">
                </div>
                <div class="card-body">
                    <div class="row col-lg-12 center">
                        <p class="text-center">
                            <b style="color: #FFDFCC">
                                {{ $memory->name }}
                            </b>
                        </p>
                    </div>
                    <div class="row col-lg-12 center">
                        {{ \Carbon\Carbon::parse($memory->birth_date)->format('Y') }} - {{ \Carbon\Carbon::parse($memory->death_date)->format('Y') }}
                    </div>
                    <hr>
                    <div class="row col-lg-12 form-group center">
                        <p class="text-center">
                            {{ $memory->content }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $memories }}
    <script src="{{ asset('js/modules/home/init.js') }}"></script>
@stop


