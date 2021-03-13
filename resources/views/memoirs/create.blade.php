@extends('layouts.page')

@section('title', 'Inserir Memória')
@section('content_header')
    <h1 class="m-0 text-dark">Inserir Memória</h1>
@stop

@section('content')
    @include('includes.alerts')
    <div class="row">
        <form class="row col-lg-12 col-sm-12" method="POST" action="{{ route('memoirs.insert') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-lg-3 col-sm-12">
                <span>Nome</span>
                <input required type="text" name="name" class="form-control">
            </div>

            <div class="form-group col-lg-3 col-sm-12">
                <span>Sobrenome</span>
                <input required type="text" name="complement-name" class="form-control">
            </div>

            <div class="form-group col-lg-3 col-sm-12">
                <span>Data de nascimento</span>
                <input required type="date" name="birth_date" class="form-control">
            </div>

            <div class="form-group col-lg-3 col-sm-12">
                <span>Data de morte</span>
                <input required type="date" name="death_date" class="form-control">
            </div>
            <div class="form-group col-lg-6 col-sm-12">
                <span>Status</span>
                <div class="form-check col-lg-2">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="0" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Habilitado
                    </label>
                </div>
                <br>
                <div class="form-check col-lg-2">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="1">
                    <label class="form-check-label" for="exampleRadios2">
                        Desabilitado
                    </label>
                </div>
            </div>
            <div class="form-group col-lg-12 col-sm-12">
                <span>Biografia</span>
                <textarea class="form-control" name="content" id="" cols="10" rows="5"></textarea>
            </div>

            <div class="col-sm-12 col-lg-12">
                <input required id="input-b3" name="image" type="file" class="file"
                       data-show-upload="false" data-show-caption="true" data-msg-placeholder="Selecione imagens para upload">
            </div>

            <div class="col-lg-12 col-sm-12" style="margin-top: 2vw">
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </form>

    </div>
@stop

@section('js')
    <script src="{{ asset('js/controllers/TypeProduct/TypeProductController.js') }}"></script>
    <script src="{{ asset('js/modules/products/list.js') }}"></script>
@endsection
