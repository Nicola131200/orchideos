@extends('layouts.app')

@section('content')
    @if (session()->has('status'))
        @if (session()->get('status') == 'aggiornato')
            <script>
                swal("Modifiche avvenute con successo", "", "success");
            </script>
        @endif
    @endif
    <div class="container">
        <h1 class="text-center mb-4"> Elenco Orchidee </h1>
        <div class="row justify-content-center">
            @if (count($piante) > 0)
                @foreach ($piante as $pianta)
                    <div class="col-12 col-sm-4">
                        <div class="card mb-4">
                            <div class="card-header ">
                                <h5 class="card-title d-inline">{{ $pianta->nome }}</h5>
                                <div class="text-end d-inline float-end mb-0">
                                    <form method="POST" action="{{ route('pianta.delete', $pianta->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="descrizione-orchidea m-2">
                                    <p class="card-text fw-bold d-inline">Tipologia:</p>
                                    <p class="d-inline">{{ $pianta->tipologia }}</p>
                                    <br>
                                    <p class="card-text fw-bold d-inline">Data Acquisto:</p>
                                    <p class="d-inline">{{ date('d/m/Y', strtotime($pianta->data_acquisto)) }}</p>
                                </div>
                            </div>
                            <div class="card-footer text-center d-flex justify-content-between">
                                <a href="{{ route('piante.edit', $pianta->id) }}" class="btn btn-sm btn-primary">
                                    {{-- <i class="bi bi-pencil-square"></i> --}}Modifica
                                </a>
                                <a href="{{ route('piante.show',$pianta->id) }}" class="btn btn-sm btn-primary">Dettaglio</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
