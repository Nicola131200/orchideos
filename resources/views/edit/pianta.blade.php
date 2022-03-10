@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <form method="post" action="{{ route('piante.update',$pianta->id) }}">
                @csrf
                <label for="nome ">Nome:</label>
                <input class="form-control mt-1 mb-2" type="text" value="{{ $pianta->nome }}" name="nome" id="nome" placeholder="Inserisci il nome"
                    required>

                <label for="tipologia">Tipologia:</label>
                <input class="form-control mt-1 mb-2" type="text" value="{{ $pianta->tipologia }}" name="tipologia" id="tipologia"
                    placeholder="Inserisci la tipologia" required>

                <label for="data_acquisto">Carica Foto</label>
                <input class="form-control mt-1 mb-2" type="date" max="{{ date('Y-m-d') }}" value="{{ $pianta->data_acquisto }}" name="data_acquisto" id="data_acquisto" required>

                <input class="btn btn-primary mt-1" type="submit" value="Conferma">
            </form>
        </div>
    </div>
</div>
@endsection