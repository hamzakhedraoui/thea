@extends('layouts.emp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
                @foreach($intervention as $e)
                @php
                $service = "";
                $client = "";
                try {
                    $clients = App\User::findOrFail($e->id_client);
                    $client = $clients->email;
                } catch (Exception $ex) {
                    echo '';
                }
                try{
                    $services = App\Service::findOrFail($e->id_service);
                    $service = $services->nom_service;
                } catch (Exception $ex) {
                    echo '';
                }
                $materiel = App\Materielused::where('id_intervention',$e->id)->get();
            @endphp
                <div class="card">
                    <div class="card-header">interventions :</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>client :</b> {{$client}}</li>
                        <li class="list-group-item"><b>service :</b> {{$service}}</li>
                        <li class="list-group-item"><b>date debeut :</b> {{$e->date_debut}}</li>
                        <li class="list-group-item"><b>date fin :</b> {{$e->date_fin}}</li>
                        <li class="list-group-item"><b>termine-? :</b> {{$e->feneshed}}</li>
                        <li class="list-group-item"><b>descreption :</b> {{$e->descreption}} </li>
                        <li class="list-group-item"><b>list materiels :</b>@foreach ($materiel as $m)
                            @php
                                   $name = App\Materiel::findOrFail($m->id_materiel);
                            @endphp
                            {{$name->nom_materiel}},
                        @endforeach </li>
                    </ul>

                        @if($e->feneshed == 'non')
                        <div class="card-body">
                        <div class="row">
                        <form action="/emp/ajoutemat" method="post">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{$e->id}}">
                            <button type="submit" class="btn btn-primary">materiel +</button>
                        </form>
                        <form action="/emp/finish" method="post" class="pl-5">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{$e->id}}">
                            <button type="submit" class="btn btn-info">termine</button>
                        </form>
                    </div>
                </div>
                        @endif

                </div>
                <br><br>
                @endforeach
            </div>
    </div>
</div>
@endsection
