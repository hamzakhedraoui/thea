@extends('layouts.dir')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                        <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Nome</th>
                                    <th>Prenom</th>
                                    <th>E-mail</th>
                                    <th>Telephone</th>
                                    <th>Suppreme</th>
                                    <th>Modifie</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($client as $e)
                                  <tr>
                                  <td>{{$e->name}}</td>
                                    <td>{{$e->prenom}}</td>
                                    <td>{{$e->email}}</td>
                                    <td>{{$e->num_tlf}}</td>
                                    <td>
                                        <form action="/admin/clidelete" method="POST">
                                                @csrf
                                        <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                            <button type="submit" class="btn btn-outline-danger">Suppreme</button>
                                        </form>
                                   </td>
                               <td>
                                <form action="/admin/climodifier" method="GET">
                                        @csrf
                                    <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                    <button type="submit" class="btn btn-outline-success">Modifie</button>
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

