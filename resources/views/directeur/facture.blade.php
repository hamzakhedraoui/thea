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
                                    <th>id intervention</th>
                                    <th>client</th>
                                    <th>employe</th>
                                    <th>date</th>
                                    <th>prix</th>
                                    <th>payee-?</th>
                                    <th>payee</th>
                                    <th>Suppreme</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($facture as $e)
                                  <tr>
                                    @php
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
                                @endphp
                                  <td>{{$e->id}}</td>
                                  <td>{{$e->id_intervention}}</td>
                                    <td>{{$client}}</td>
                                    <td>{{$emploiye}}</td>
                                    <td>{{$e->date}}</td>
                                    <td>{{$e->prix}} DA</td>
                                    <td>{{$e->payed}}</td>
                                    @if($e->payed == 'non' )
                                    <td>
                                        <form action="/admin/paye" method="post">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                            <button type="submit" class="btn btn-outline-info">payee</button>
                                        </form>
                                    </td>
                                    @else
                                    <td>********</td>
                                    @endif
                                    <td>

                                        <form action="/admin/deletefacteur" method="post">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                            <button type="submit" class="btn btn-outline-info">suppreme</button>
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

