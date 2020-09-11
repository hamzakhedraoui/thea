@extends('layouts.cli')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Intervention :</div>

                <div class="card-body">
                    <form method="POST" action="/client/ajoute">
                        @csrf

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
                        <div class="form-group row">
                            <label for="descreption" class="col-md-4 col-form-label text-md-right">Descreption :</label>

                            <div class="col-md-6">
                                <textarea id="descreption" name="descreption" rows="6" cols="35" required autofocus></textarea>
                                @error('descreption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Demande
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
