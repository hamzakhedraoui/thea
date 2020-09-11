@extends('layouts.dir')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()->has('message1'))
            <div class="alert alert-danger" role="alert">
                {{session()->get('message1')}}
            </div>
            @endif
            @if(session()->has('message2'))
            <div class="alert alert-info" role="alert">
                {{session()->get('message2')}}
            </div>
            @endif
                        <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>id</th>
                                    <th>client</th>
                                    <th>service</th>
                                    <th>emploiye</th>
                                    <th>date debeut</th>
                                    <th>date fin</th>
                                    <th>accepte-?</th>
                                    <th>termine-?</th>
                                    <th>accepte</th>
                                    <th>Suppreme</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($intervention as $e)
                                  <tr>
                                    @php
                                    $service = "";
                                    $emploiye = "";
                                    $client = "";
                                    try {
                                        $clients = App\User::findOrFail($e->id_client);
                                        $client = $clients->email;
                                    } catch (Exception $ex) {
                                        echo '';
                                    }
                                    try{
                                        $emploiyes = App\User::findOrFail($e->id_employe);
                                        $emploiye = $emploiyes->email;
                                    } catch (Exception $ex) {
                                        echo '';
                                    }
                                    try{
                                        $services = App\Service::findOrFail($e->id_service);
                                        $service = $services->nom_service;
                                    } catch (Exception $ex) {
                                        echo '';
                                    }
                                @endphp
                                  <td>{{$e->id}}</td>
                                    <td>{{$client}}</td>
                                    <td>{{$service}}</td>
                                    <td>{{$emploiye}}</td>
                                    <td>{{$e->date_debut}}</td>
                                    <td>{{$e->date_fin}}</td>
                                    <td>{{$e->accepted}}</td>
                                    <td>{{$e->feneshed}}</td>
                                    @if($e->accepted == 'non')
                                    <td>
                                        <form action="/admin/intacteve" method="post">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                            <button type="submit" class="btn btn-outline-info">accepte</button>
                                        </form>
                                    </td>
                                    @else
                                    <td>*********</td>
                                    @endif
                                    <td>
                                        <form action="/admin/intdelete" method="POST">
                                                @csrf
                                        <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                            <button type="submit" class="btn btn-outline-danger">Suppreme</button>
                                        </form>
                                   </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
        </div>
    </div>
</div>
@endsection

