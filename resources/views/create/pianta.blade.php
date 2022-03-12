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
            @if (session()->has('status'))
                <script>
                    swal("Pianta registrata nell\'archivio", "", "success");
                </script>
            @endif
            <div class="col-sm-6">
                <form method="post" action="{{ route('piante.store') }}">
                    @csrf
                    <label for="nome ">Nome:</label>
                    <input class="form-control mt-1 mb-2" type="text" name="nome" id="nome" placeholder="Inserisci il nome"
                        required>

                    <label for="tipologia">Tipologia:</label>
                    <input class="form-control mt-1 mb-2" type="text" name="tipologia" id="tipologia"
                        placeholder="Inserisci la tipologia" required>

                    <label for="data_acquisto">Data Acquisto:</label>
                    <input class="form-control mt-1 mb-2" max="{{ date('Y-m-d') }}" type="date" name="data_acquisto" id="data_acquisto" required>

                    <input class="btn btn-primary mt-1" type="submit" value="Conferma">
                </form>
            </div>
        </div>
    </div>
@endsection
