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
                        <h5 class="card-title">Anaffiature: {{ count($annaffiature) }}</h5>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalAnnaffiature"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($annaffiature as $annaffiatura)
                                <li class="list-group-item">
                                    {{ date('d-m-Y H:i', strototime($annaffiatura->dataora_annaffiatura)) }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mb-2 mt-2 col-12 col-sm-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Concimature: {{ count($concimature) }}</h5>
                        <h5></h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($concimature as $concimatura)
                                <li class="list-group-item">An item</li>
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
                    <label for="dataora_annaffiatura">Data e ora annaffiatura:</label>
                    <input class="form-control" type="datetime-local" name="dataora_annaffiatura" id="dataora_annaffiatura">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button type="button" class="btn btn-primary">Registra</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "method",
                url: "url",
                data: {
                    dataora_annaffiatura: $('input[name="dataora_annaffiatura"]').val();
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    </script>
@endsection
