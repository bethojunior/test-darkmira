@extends('layouts.default')
@section('content')
    @include('includes.alerts')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
    @extends('home.nav')
    <div class="respect-height-nav row col-lg-12">
        <form class="card row col-lg-4" method="POST" action="{{ route('memories.insert') }}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="col-lg-12 center relative">
                <img id="image-user" class="card-img-top" src="{{ asset('assets/images/icons/default.png') }}" alt="Card image cap">
                <input required name="image" id="input-hide-image" class="input-hide" type="file">
            </div>
            <div class="card-body">
                <div class="center">
                    <h5 class="card-title">Escolha uma imagem</h5>
                </div>
                <div class="row col-lg-12">
                    <div class="form-group col-lg-6">
                        <span>Nome</span>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <span>Sobrenome</span>
                        <input type="text" class="form-control" name="complement-name" required>
                    </div>
                </div>
                <div class="row col-lg-12">
                    <div class="form-group col-lg-6">
                        <span>Nascimento</span>
                        <input type="date" class="form-control" name="birth_date" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <span>Morte</span>
                        <input type="date" class="form-control" name="death_date" required>
                    </div>
                </div>
                <div class="row col-lg-12 form-group center">
                    <span>Biografia</span>
                    <textarea class="form-control" name="content" id="" cols="30" rows="4"></textarea>
                </div>
                <div class="col-lg-12">
                    <input type="submit" class="btn btn-outline-info" value="Enviar">
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/modules/home/init.js') }}"></script>
@stop


