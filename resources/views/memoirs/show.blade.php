@extends('layouts.page')

@section('title', 'Listagem de memórias')
@section('content_header')
    <h1 class="m-0 text-dark">Listagem de Memórias</h1>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/memoirs/show.css') }}">
@endsection
@section('content')
    @include('includes.alerts')
    <div class="row col-lg-12">

        @foreach($memories as $memory)
            <div class="card col-lg-4">
                <div class="center">
                    <img src="{{ asset('storage/memoirs').'/'.$memory->image }}"class="img-thumbnail show-image-memory">
                </div>
                <div class="card-body">
                    <p>
                        <h5>
                            <b>{{ $memory->name }}</b>
                            <span class="badge {{ $memory->status == 0 ? "badge-success" : "badge-danger" }} ">{{ $memory->status == 0 ? "Habilitado" : "Desabilitado" }}</span>
                        </h5>
                    </p>
                    <p>
                        <h5 class="card-title">
                        {{ \Carbon\Carbon::parse($memory->birth_date)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($memory->death_date)->format('d-m-Y') }}
                        </h5>
                    </p>

                    <p class="card-text">
                        <hr>
                        {{ $memory->content }}
                    </p>

                    <form method="POST" action="{{ route('memoirs.update' , $memory->id) }}">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-info" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-memory-{{$memory->id}}">
                            Editar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="edit-memory-{{$memory->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="deleteCategory" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteCategory">
                                            Editar Memória
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="card col-lg-12">
                                        <div class="center">
                                            <img src="{{ asset('storage/memoirs').'/'.$memory->image }}"class="img-thumbnail img-edit" alt="...">
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0">
                                                    <label class="form-check-label" for="inlineRadio1">Habilitado</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1">
                                                    <label class="form-check-label" for="inlineRadio2">Desabilitado</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <span>Nome</span>
                                                <input name="name" type="text" class="form-control" value="{{ $memory->name }}">
                                            </div>
                                            <div class="form-group">
                                                <span>Data de nascimento</span>
                                                <input name="birth_date" type="date" class="form-control" value="{{$memory->birth_date}}">
                                            </div>
                                            <div class="form-group">
                                                <span>Data de morte</span>
                                                <input name="death_date" type="date" class="form-control" value="{{ $memory->death_date }}">
                                            </div>
                                            <p class="card-text">
                                                <textarea class="form-control" name="content" id="" cols="30" rows="10">{{ $memory->content }}</textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('memoirs.destroy' , $memory->id) }}">
                        @method('DELETE')
                        @csrf
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteCategoryModal-{{$memory->id}}">
                            Excluir
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteCategoryModal-{{$memory->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="deleteCategory" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteCategory">
                                            Excluir Memória
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-default-danger">
                                            Tem certeza que deseja excluir essa memória?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        @endforeach


    </div>
    {{ $memories }}
@stop

@section('js')
@endsection
