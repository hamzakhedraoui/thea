<?php

namespace App\Http\Controllers;

use App\Facture;
use Illuminate\Http\Request;
use App\User;
use App\Intervention;
use App\Service;
class ClientController extends Controller
{
    //
    public function intervention(){
        $service = Service::All();
        return view('client.intervention',compact('service'));
    }
    public function ajoute(){
        $data = request()->validate([
            'descreption' => ['required', 'string', 'max:255'],
            'id_service' => ['required', 'string', 'max:255'],
        ]);
        $data1 = ['id_client'=>auth()->user()->id];
        $merg = array_merge($data,$data1);
        Intervention::create($merg);
        $intervention = Intervention::where('id_client',auth()->user()->id)->get();
        return view('client.home',compact('intervention'));
    }
    public function interventions()
    {
        $id = auth()->user()->id;
        $intervention = Intervention::where('id_client',$id)->orderBy('created_at', 'desc')->get();
        return view('client.home',compact('intervention'));
    }
    public function facture()
    {
        $id = request('id');
        $int = Intervention::findOrFail($id);
        $facture = Facture::where('id_intervention',$int->id)->firstOrFail();
        return view('client.facture',compact('facture'));
    }
}
