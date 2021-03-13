@extends('layouts.page')

@section('title', 'Listagem de memórias')
@section('content_header')
    <h1 class="m-0 text-dark">Listagem de Memórias</h1>
@stop

@section('content')
    @include('includes.alerts')
    <div class="row col-lg-12">
        @foreach($memories as $memory)
            <div class="card col-lg-4">
                <img src="{{ asset('storage/memoirs').'/'.$memory->image }}"class="img-thumbnail" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> {{ $memory->name }}</h5>
                    <h5 class="card-title"> {{ \Carbon\Carbon::parse($memory->birth_date)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($memory->death_date)->format('d-m-Y') }} </h5>
                    <p class="card-text"> {{ $memory->content }} </p>
                    <form method="POST" action="{{ route('memoirs.destroy' , $memory->id) }}">
                        @method('DELETE')
                        @csrf
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                                type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#deleteCategoryModal">Excluir
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog"
                             aria-labelledby="deleteCategory" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteCategory">Excluir
                                            Memória</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
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
@stop

@section('js')
    <script src="{{ asset('js/controllers/TypeProduct/TypeProductController.js') }}"></script>
    <script src="{{ asset('js/modules/memoirs/list.js') }}"></script>
@endsection
