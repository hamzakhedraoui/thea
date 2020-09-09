<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Materiel;
use App\Service;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    //getion de emploiye -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+--+-+-+-+-+-+-
    public function pdf(){
        $id = request('id');
        $cv = User::findOrFail($id)->cv;
        return view('directeur.pdf',compact('cv'));
    }
    public function listemp()
    {
        $emploiye = User::where('type','emploiye')->get();
        return view('directeur.emplist',compact('emploiye'));
    }
    public function empacteve()
    {
        $id = request('id');
        $user = User::findOrFail($id);
        if($user->active == 'b'){
            $user->active = 'a';
        }else{
            $user->active = 'b';
        }
        $user->save();
        $emploiye = User::where('type','emploiye')->get();
        return view('directeur.emplist',compact('emploiye'));
    }
    public function empdelete(){
        $id = request('id');
        $user = User::findOrFail($id);
        $user->delete();
        $emploiye = User::where('type','emploiye')->get();
        return view('directeur.emplist',compact('emploiye'));
    }
    public function empmodifier()
    {
        $id = request('id');
        $user = User::findOrFail($id);
        return view('directeur.modifieemploiye',compact('user'));
    }
    public function modifieremp(){
        //Rule::unique('users')->ignore(auth()->user()->id)
        $id = request('id');
        $user = User::findOrFail($id);
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'num_tlf' => ['required', 'string','max:10',Rule::unique('users')->ignore($id)],
        ]);
        $user->update($data);
        $emploiye = User::where('type','emploiye')->get();
        return view('directeur.emplist',compact('emploiye'));
    }

    //getion de client -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+--+-+-+-+-+-+-
    public function listcli()
    {
        $client = User::where('type','client')->get();
        return view('directeur.clilist',compact('client'));
    }
    public function clidelete(){
        $id = request('id');
        $user = User::findOrFail($id);
        $user->delete();
        $client = User::where('type','client')->get();
        return view('directeur.clilist',compact('client'));
    }
    public function climodifier()
    {
        $id = request('id');
        $user = User::findOrFail($id);
        return view('directeur.modifieclient',compact('user'));
    }
    public function modifiercli(){
        //Rule::unique('users')->ignore(auth()->user()->id)
        $id = request('id');
        $user = User::findOrFail($id);
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'num_tlf' => ['required', 'string','max:10',Rule::unique('users')->ignore($id)],
        ]);
        $user->update($data);
        $client = User::where('type','client')->get();
        return view('directeur.clilist',compact('client'));
    }
    //getion de material -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+--+-+-+-+-+-+-
    public function matadd(){
        return view('directeur.ajoutemat');
    }
    public function ajoute(){
        $data = request()->validate([
            'nom_materiel' => ['required', 'string', 'max:255'],
            'disponilite' => ['required', 'string', 'max:255'],
        ]);
        Materiel::create($data);
        $materiel = Materiel::all();
        return view('directeur.matlist',compact('materiel'));
    }
    public function listmat()
    {
        $materiel = Materiel::all();
        return view('directeur.matlist',compact('materiel'));
    }
    public function matdelete(){
        $id = request('id');
        $mat = Materiel::findOrFail($id);
        $mat->delete();
        $materiel = Materiel::all();
        return view('directeur.matlist',compact('materiel'));
    }
    public function matmodifier()
    {
        $id = request('id');
        $materiel = Materiel::findOrFail($id);
        return view('directeur.modifiemat',compact('materiel'));
    }
    public function modifiermat(){
        //Rule::unique('users')->ignore(auth()->user()->id)
        $id = request('id');
        $mat = Materiel::findOrFail($id);
        $data = request()->validate([
            'nom_materiel' => ['required', 'string', 'max:255'],
            'disponilite' => ['required', 'string', 'max:255'],
        ]);
        $mat->update($data);
        $materiel = Materiel::all();
        return view('directeur.matlist',compact('materiel'));
    }
     //getion de service -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+--+-+-+-+-+-+-
    public function seradd(){
        return view('directeur.ajouteser');
    }
    public function ajouteser(){
        $data = request()->validate([
            'nom_service' => ['required', 'string', 'max:255'],
        ]);
        Service::create($data);
        $service = Service::all();
        return view('directeur.serlist',compact('service'));
    }
    public function listser()
    {
        $service = Service::all();
        return view('directeur.serlist',compact('service'));
    }
    public function serdelete(){
        $id = request('id');
        $ser = Service::findOrFail($id);
        $ser->delete();
        $service = Service::all();
        return view('directeur.serlist',compact('service'));
    }
    public function sermodifier()
    {
        $id = request('id');
        $service = Service::findOrFail($id);
        return view('directeur.modifieser',compact('service'));
    }
    public function modifierser(){
        //Rule::unique('users')->ignore(auth()->user()->id)
        $id = request('id');
        $ser = Service::findOrFail($id);
        $data = request()->validate([
            'nom_service' => ['required', 'string', 'max:255'],
        ]);
        $ser->update($data);
        $service = Service::all();
        return view('directeur.serlist',compact('service'));
    }
}
