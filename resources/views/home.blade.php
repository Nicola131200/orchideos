@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center"> Elenco Piante </h1>
            @if (!is_null($piante))
                @foreach ($piante as $pianta)
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="public\storage\storage\uploads\1.jpg" class="card-img-top" alt="Immagine Orchidea">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pianta->nome }}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of the card's content.</p>
                                <a href="#" class="btn btn-primary">Modifica</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
