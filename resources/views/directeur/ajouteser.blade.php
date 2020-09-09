@extends('layouts.dir')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajoute Service :</div>

                <div class="card-body">
                    <form method="POST" action="/admin/ajouteser">
                        @csrf

                        <div class="form-group row">
                            <label for="nom_service" class="col-md-4 col-form-label text-md-right">Nome de Service :</label>

                            <div class="col-md-6">
                                <input id="nom_service" type="text" class="form-control @error('nom_service') is-invalid @enderror" name="nom_service" value="" required autocomplete="nom_materiel" autofocus>

                                @error('nom_service')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajoute
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
