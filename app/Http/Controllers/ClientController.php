<?php

namespace App\Http\Controllers;

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
}
