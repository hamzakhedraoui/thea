<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Intervention;
use App\Materiel;
use App\Materielused;
use Carbon\Carbon;
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
    public function ajoutecv()
    {
        $service = Service::All();
        $user = auth()->user()->id;
        return View('emploiye.confermation',compact('user','service'));
    }
    public function interventions()
    {
        $id = auth()->user()->id;
        $intervention = Intervention::where('id_employe',$id)->orderBy('created_at', 'desc')->get();
        return view('emploiye.home',compact('intervention'));
    }
    public function finish()
    {
        $auth = auth()->user()->id;
        $user = User::findOrFail($auth);
        $user->emp_free = 'oui';
        $user->save();
        $id = request('id');
        $int = Intervention::findOrFail($id);
        $int->feneshed = 'oui';
        $mytime = Carbon::now();
        $date = explode(' ',$mytime->toDateTimeString());
        $int->date_fin = $date[0];
        $int->save();
        return redirect('/emp/interventions');
    }
    public function ajoutemat()
    {
        $id = request('id');
        $materiel = Materiel::where('disponilite','oui')->get();
        return View('emploiye.ajoutemat',compact('id','materiel'));

    }
    public function materiel()
    {
        $id = request('id');
        $materiel = request('id_materiel');
        $data = ['id_intervention'=>$id,'id_materiel'=>$materiel];
        Materielused::create($data);
        return redirect('/emp/interventions');

    }
}
