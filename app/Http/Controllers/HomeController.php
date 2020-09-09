<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function redirect()
    {
        $user = auth()->user()->type;
        switch($user){
            case 'client':
                return view('client.home');
                break;
            case 'emploiye':
                return view('emploiye.home');
                break;
            case 'directeur':
                return view('directeur.home');
        }
        return '/home';

    }
}
