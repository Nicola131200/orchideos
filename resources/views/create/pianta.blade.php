@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session()->has('status'))
            <script>
                swal("Pianta registrata nell\'archivio", "", "success");
            </script>
        @endif
        <div class="col-sm-6">
            <form method="post" action="{{ route('piante.store') }}" enctype="multipart/form-data">
                @csrf
                <label for="nome ">Nome:</label>
                <input class="form-control mt-1 mb-2" type="text" name="nome" id="nome" required>

                <label for="tipologia">Tipologia:</label>
                <input class="form-control mt-1 mb-2" type="text" name="tipologia" id="tipologia" required>
                
                <label for="foto">Carica Foto</label>
                <input class="form-control mt-1 mb-2" type="file" name="image" id="foto" required>

                <input class="btn btn-primary mt-1" type="submit" value="Conferma">
            </form>
        </div>
    </div>
</div>
@endsection