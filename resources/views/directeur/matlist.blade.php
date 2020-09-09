@extends('layouts.dir')

@section('content')
<div class="container">
    <div class="row">
        <a class="btn btn-outline-dark" role="button" href="/admin/matadd">Ajoute Material</a>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-12">
                        <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>nom_materiel</th>
                                    <th>disponilite</th>
                                    <th>Suppreme</th>
                                    <th>Modifie</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($materiel as $e)
                                  <tr>
                                  <td>{{$e->nom_materiel}}</td>
                                    <td>{{$e->disponilite}}</td>
                                    <td>
                                        <form action="/admin/matdelete" method="POST">
                                                @csrf
                                        <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                            <button type="submit" class="btn btn-outline-danger">Suppreme</button>
                                        </form>
                                   </td>
                               <td>
                                <form action="/admin/matmodifier" method="GET">
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

