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
                                    <th>Status</th>
                                    <th>Service</th>
                                    <th>libre</th>
                                    <th>CV</th>
                                    <th>Suppreme</th>
                                    <th>Dis/Active</th>
                                    <th>Modifie</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($emploiye as $e)
                                  <tr>
                                  <td>{{$e->name}}</td>
                                    <td>{{$e->prenom}}</td>
                                    <td>{{$e->email}}</td>
                                    <td>{{$e->num_tlf}}</td>
                                    @php
                                        $service = "-----------";
                                        try {
                                            $services = App\Service::findOrFail($e->id_service);
                                            $service = $services->nom_service;
                                        } catch (Exception $ex) {
                                            echo '';
                                        }
                                        $st = 'active';
                                        if($e->active == 'b'){
                                            $st = 'Bloque';
                                        }
                                    @endphp
                                    <td>{{$st}}</td>
                                    <td>{{$service}}</td>
                                    <td>{{$e->emp_free}}</td>
                                    <td>
                                        <form action="/admin/pdf" method="GET">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                            <button type="submit" class="btn btn-outline-info">CV</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/admin/empdelete" method="POST">
                                                @csrf
                                        <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                            <button type="submit" class="btn btn-outline-danger">Suppreme</button>
                                        </form>
                                   </td>
                                   <td>
                                    <form action="/admin/empacteve" method="POST">
                                            @csrf
                                        <input type="hidden" id="id" name="id" value="{{$e->id}}">
                                        @php
                                         $disact = 'active';
                                         if($e->active == 'a'){
                                            $disact = 'disactive';
                                         }
                                        @endphp
                                        <button type="submit" class="btn btn-outline-primary">{{$disact}}</button>
                                    </form>
                               </td>
                               <td>
                                <form action="/admin/empmodifier" method="GET">
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

