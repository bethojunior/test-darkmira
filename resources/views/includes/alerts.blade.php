
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (session('success'))
    <div class="alert alert-default-success">
        <strong>
            {{ session('success') }}
        </strong>
        <i class="far fa-check-circle"></i>
    </div>
@endif


@if (session('error'))
    <div class="alert alert-default-danger">
        <strong>
            {{ session('error') }}
        </strong>
        <i class="fas fa-exclamation-triangle"></i>
    </div>
@endif



@if (session('modal'))
    <div id="session-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Lembrança inserida com sucesso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Aguarde a aprovação para sua publicaçao ser publica</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            $('#session-modal').modal('show')
        },200);
    </script>
@endif
