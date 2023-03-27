<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use function PHPSTORM_META\type;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function inscription_view($type){
        return view('pages.inscription', ["type" => $type]);
    }

    public function inscription(Request $request, $type){
        $validations = [
            'nom' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'telephone' => ['required', 'string', 'min:9'],
            'password_confirmation' => ['required', 'string'],
        ];
        if($type=="chauffeur") 
            $validations = array_merge($validations, array('ville' => ['required', 'string', 'max:50']));
        elseif($type=="business"){
            $validations = array_merge($validations, array('nb_employe' => ['required', 'number', 'min:2']));
            $validations = array_merge($validations, array('secteur' => ['required', 'string', 'min:2']));
            $validations = array_merge($validations, array('nom_entreprise' => ['required', 'string', 'min:2']));
        }
        $request->validate($validations);

        if($type == "passager")
        {
            $user = User::create([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telephone' => $request->telephone,
            ]);
        }
        elseif($type == "chauffeur")
        {
            $user = User::create([
                'prenom' => $request->prenom,
                'ville' => $request->ville,
                'nom' => $request->nom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telephone' => $request->telephone,
            ]);
        }
        elseif($type == "business")
        {
            $user = User::create([
                'prenom' => $request->prenom,
                'nb_employe' => $request->nb_employe,
                'nom_entreprise' => $request->nom_entreprise,
                'secteur' => $request->secteur,
                'nom' => $request->nom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telephone' => $request->telephone,
            ]);
        }

        if($type == "passager"){
            $user->assignRole("passager");
            Auth::user();
            return view("pages.passagers.index");
        }
        else if($type == "chauffeur"){
            $user->assignRole("chauffeur");
            Auth::user();
            return view("pages.chauffeurs.index");
        }
        else if($type == "business")
        {
            $user->assignRole("business");
            Auth::user();
            return view("pages.business.index");
        }
    }
}
