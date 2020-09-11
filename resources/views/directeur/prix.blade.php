@extends('layouts.dir')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajoute Materiel :</div>

                <div class="card-body">
                    <form method="POST" action="/admin/ajoutefacteur">
                        @csrf
                        <input type="hidden" id='id' name="id" value="{{$id}}"/>
                        <div class="form-group row">
                            <label for="prix" class="col-md-4 col-form-label text-md-right">prix :</label>

                            <div class="col-md-6">
                                <input id="prix" type="text" class="form-control @error('prix') is-invalid @enderror" name="prix" value="0.00" required autocomplete="nom_materiel" autofocus>

                                @error('prix')
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
