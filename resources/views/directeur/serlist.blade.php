@extends('layouts.dir')

@section('content')
<div class="container">
    <div class="row">
        <a class="btn btn-outline-dark" role="button" href="/admin/seradd">Ajoute Service</a>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
                        <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>id Service</th>
                                    <th>nome Service</th>
                                    <th>Suppreme</th>
                                    <th>Modifie</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($service as $e)
                                  <tr>
                                  <td>{{$e->id}}</td>
                                  <td>{{$e->nom_service}}</td>
                                    <td>
                                        <form action="/admin/serdelete" method="POST">
                                                @csrf
                                        <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                            <button type="submit" class="btn btn-outline-danger">Suppreme</button>
                                        </form>
                                   </td>
                               <td>
                                <form action="/admin/sermodifier" method="GET">
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

