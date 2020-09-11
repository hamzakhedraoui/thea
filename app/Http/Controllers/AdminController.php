<?php

namespace App\Http\Controllers;

use App\Intervention;
use Illuminate\Http\Request;
use App\User;
use App\Materiel;
use App\Service;
use Carbon\Carbon;
use App\Facture;
use Exception;
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
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function listint()
    {
        $intervention = Intervention::All();
        return view('directeur.intlist',compact('intervention'));
    }
    public function intdelete()
    {
        $id = request('id');
        $int = Intervention::findOrFail($id);
        $int->delete();
        $intervention = Intervention::all();
        return view('directeur.intlist',compact('intervention'));
    }
    public function intacteve(Request $req)
    {
        $id = request('id');
        $int = Intervention::findOrFail($id);
        $int->accepted = 'oui';
        try{
            $emploiye = User::where('type','emploiye')->where('emp_free','oui')->where('active','a')->firstOrFail();
            $emploiye->emp_free = 'non';
            $emploiye->save();
            $int->id_employe = $emploiye->id;
        }catch(Exception $ex){
            $intervention = Intervention::All();
            $req->session()->flash('message1','there is no free emploiye you need to try later or delete the intervention');
            return view('directeur.intlist',compact('intervention'));
        }
        $mytime = Carbon::now();
        $date = explode(' ',$mytime->toDateTimeString());
        $int->date_debut = $date[0];
        $int->save();
        $intervention = Intervention::All();
        $req->session()->flash('message2','intervention accepted seccesfully...');
        return view('directeur.intlist',compact('intervention'));
    }
    public function facteur()
    {
        $id = request('id');
        return view('directeur.prix',compact('id'));
    }
    public function ajoutefacteur()
    {
        $id = request('id');
        $intervention = Intervention::findOrFail($id);
        $prix = request('prix');
        $mytime = Carbon::now();
        $date = explode(' ',$mytime->toDateTimeString());
        $data = ['id_client'=>$intervention->id_client,'prix'=>$prix,'id_intervention'=>$id,'date'=>$date[0],'id_employe'=>$intervention->id_employe];
        Facture::create($data);
        $facture = Facture::All();
        return view('directeur.facture',compact('facture'));

    }
    public function listfac()
    {
        $facture = Facture::All();
        return view('directeur.facture',compact('facture'));
    }
    public function deletefacteur()
    {
        $id = request('id');
        Facture::where('id',$id)->delete();
        $facture = Facture::All();
        return view('directeur.facture',compact('facture'));
    }
    public function paye()
    {
        $id = request('id');
        $fac = Facture::findorFail($id);
        $fac->payed = 'oui';
        $fac->save();
        $facture = Facture::All();
        return view('directeur.facture',compact('facture'));
    }
}
