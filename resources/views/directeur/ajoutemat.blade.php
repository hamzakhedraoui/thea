@extends('layouts.dir')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajoute Materiel :</div>

                <div class="card-body">
                    <form method="POST" action="/admin/ajoute">
                        @csrf

                        <div class="form-group row">
                            <label for="nom_materiel" class="col-md-4 col-form-label text-md-right">Nome de materiel :</label>

                            <div class="col-md-6">
                                <input id="nom_materiel" type="text" class="form-control @error('nom_materiel') is-invalid @enderror" name="nom_materiel" value="" required autocomplete="nom_materiel" autofocus>

                                @error('nom_materiel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="disponilite" class="col-md-4 col-form-label text-md-right">Disponible :</label>

                            <div class="col-md-6">

                                <select id="disponilite" type="text" class="form-control @error('disponilite') is-invalid @enderror" name="disponilite" required autofocus>
                                <option value="oui" selected>oui</option>
                                <option value="non">Non</option>
                                </select>
                                @error('disponilite')
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
