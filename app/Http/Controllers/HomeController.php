<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
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
        // dd(Auth::user());
        $user = User::where('id', Auth::user()->id)->with('persona', 'persona.rol', 'persona.rol.permisosRolesModFunc')->get();
        // dd($user);
        return view('home', ["userAll" => $user[0]]);
    }
}
