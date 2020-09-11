@extends('layouts.emp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajoute Materiel :</div>

                <div class="card-body">
                    <form method="POST" action="/emp/conferme" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{$user}}">
                        <div class="form-group row">
                            <label for="CV" class="col-md-4 col-form-label text-md-right">CV :</label>

                            <div class="col-md-6">
                                <input id="CV" type="file" class="form-control @error('nom_materiel') is-invalid @enderror" name="CV" value="" required autocomplete="nom_materiel" autofocus>

                                @error('CV')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_service" class="col-md-4 col-form-label text-md-right">Service :</label>

                            <div class="col-md-6">

                                <select id="id_service" type="text" class="form-control @error('id_service') is-invalid @enderror" name="id_service" required autofocus>
                                @foreach($service as $s)
                                    <option value="{{$s->id}}">{{$s->nom_service}}</option>
                                @endforeach
                                </select>
                                @error('id_service')
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
