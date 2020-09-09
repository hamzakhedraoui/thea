<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
class EmploiyeController extends Controller
{

    public function conferme(Request $req)
    {
        //<img src="{{asset('/storage/cv/'.Auth->user->cv)}}"></img>
        $id = auth()->user()->id;
        if($req->hasFile('CV')){
            $filename = $req->CV->getClientOriginalName();
            $req->CV->storeAs('cv',$filename,'public');
            $user = User::findOrFail($id);
            $data = request()->validate([
                'id_service' => ['required', 'string', 'max:255'],
            ]);
            $data1 = ['CV'=>$filename];
            $merg = array_merge($data,$data1);
            $user->update($merg);
        }
        return View('emploiye.home');

    }
    public function ajoutecv(){
        $service = Service::All();
        $user = auth()->user()->id;
        return View('emploiye.confermation',compact('user','service'));
    }
}
