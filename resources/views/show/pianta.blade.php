@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3 justify-content-center">
            <div class="col-12 col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pianta->nome }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Tipologia: {{ $pianta->tipologia }}</h6>
                        <p class="card-text">Data acquisto: {{ date('d-m-Y', strtotime($pianta->data_acquisto)) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-2 mt-2 col-12 col-sm-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Anaffiature</h5>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalAnnaffiature"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($annaffiature as $annaffiatura)
                                <li class="list-group-item">
                                    {{ date('d-m-Y H:i', strtotime($annaffiatura->dataora_annaffiatura)) }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mb-2 mt-2 col-12 col-sm-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Concimature</h5>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalConcimature"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($concimature as $concimatura)
                                <li class="list-group-item">
                                    {{ date('d-m-Y H:i', strtotime($concimatura->dataora_concimatura)) }}</li>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalAnnaffiature" tabindex="-1" aria-labelledby="modalAnnaffiatureLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAnnaffiatureLabel">Registra Annaffiatura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" name="pianta_id" value="{{ $pianta->id }}">
                        <label for="dataora_annaffiatura">Data e ora annaffiatura:</label>
                        <input class="form-control" max="{{ date('Y-m-d\TH:i') }}" type="datetime-local" name="dataora_annaffiatura"
                            id="dataora_annaffiatura" required>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button type="button" class="btn btn-primary" id="btnAddAnnaffiatura">Registra</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalConcimature" tabindex="-1" aria-labelledby="modalConcimatureLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalConcimatureLabel">Registra Concimatura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" name="pianta_id" value="{{ $pianta->id }}">
                        <label for="dataora_annaffiatura">Data e ora concimatura:</label>
                        <input class="form-control" max="{{ date('Y-m-d\TH:i') }}" type="datetime-local" name="dataora_concimatura"
                            id="dataora_annaffiatura" required>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button type="button" class="btn btn-primary" id="btnAddConcimatura">Registra</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#btnAddAnnaffiatura").click(function() {
                $.ajax({
                    type: "post",
                    url: "{{ route('annaffiatura.store') }}",
                    data: {
                        _token: $('input[name="_token"]').val(),
                        dataora_annaffiatura: $('input[name="dataora_annaffiatura"]').val(),
                        pianta_id: $('input[name="pianta_id"]').val(),
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            swal("Annaffiatura registrata con successo", "", "success");
                            location.reload();
                        }
                        if(response.errors){
                            console.log(response.errors);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
            $("#btnAddConcimatura").click(function() {
                $.ajax({
                    type: "post",
                    url: "{{ route('concimatura.store') }}",
                    data: {
                        _token: $('input[name="_token"]').val(),
                        dataora_concimatura: $('input[name="dataora_concimatura"]').val(),
                        pianta_id: $('input[name="pianta_id"]').val(),
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            swal("Concimatura registrata con successo", "", "success");
                            location.reload();
                        }
                        if(response.errors){
                            console.log(response.errors);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endsection
