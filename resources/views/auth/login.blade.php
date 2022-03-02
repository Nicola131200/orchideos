@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-6">
            <div class="card">
                <div class="card-header">Accedi</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            
                            <div class="col">
                                <label for="email"">E-Mail: </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            
                            <div class="col">
                                <label for="password">Password: </label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        Accedi
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
