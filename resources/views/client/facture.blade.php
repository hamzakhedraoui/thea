@extends('layouts.cli')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
                @php
                $service = "";
                $employe = "";
                try {
                    $employe = App\User::findOrFail($facture->id_employe);
                    $employes = $employe->email;
                } catch (Exception $ex) {
                    echo '';
                }
            @endphp
                <div class="card">
                    <div class="card-header">facture :</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>employe :</b> {{$employes}}</li>
                        <li class="list-group-item"><b>date :</b> {{$facture->date}}</li>
                        <li class="list-group-item"><b>prixe :</b> {{$facture->prix}}</li>
                        <li class="list-group-item"><b>payee-? :</b> {{$facture->payed}} </li>
                    </ul>

                </div>
                <br><br>
            </div>
    </div>
</div>
@endsection

