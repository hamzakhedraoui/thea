@extends('layouts.emp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajoute Materiel :</div>

                <div class="card-body">
                    <form method="POST" action="/emp/materiel">
                        @csrf
                        <input type="hidden" id='id' name="id" value="{{$id}}"/>
                        <div class="form-group row">
                            <label for="id_materiel" class="col-md-4 col-form-label text-md-right">Materiel :</label>

                            <div class="col-md-6">

                                <select id="id_materiel" type="text" class="form-control @error('id_materiel') is-invalid @enderror" name="id_materiel" required autofocus>
                                @foreach($materiel as $m)
                                <option value="{{$m->id}}">{{$m->nom_materiel}}</option>
                                @endforeach
                                </select>
                                @error('id_materiel')
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
