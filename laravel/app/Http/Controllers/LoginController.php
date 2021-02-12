<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {

        $error = json_encode([
            "status" => "ko", "connected" => false, "description" => "Pseudo ou email ou mot de passe invalide"
        ]);
    

        $credentials = $request->only('pseudo', 'password');
        $input = $request->pseudo;
        $user = User::where('pseudo', $input)->orWhere('email', $input)->orWhere('numero', $input)->first(); 
        if($user == null) {
            return $error; 
        }

        $hash = $user->password; 
        //if (Auth::attempt($credentials)) {
        if(password_verify($request->password, $hash)) {
            $request->session()->regenerate();
            $user = Auth::user(); 
            return json_encode(["status" => "ok", "connected" => true, "pseudo" => $user->pseudo, "description" => "Connexion réussie",] );
        }
        return $error;
    }


    public function connected(Request $request) {
        if(Auth::check()) {
            $user = Auth::user(); 
            echo json_encode([
                "connected" => true, 
                "pseudo" => $user->pseudo, 
                "nom" => $user->nom, 
                "prenom" => $user->prenom, 
                "dateAdhesion" => $user->dateAdhesion, 
                "numero" => $user->numero, 
                "adresse" => $user->adresse1, 
                "cp" => $user->codePostal, 
                "ville" => $user->ville, 
                "avatar" => null]);
        } else {
            http_response_code(400);
            echo json_encode(["connected" => false, "sessionID" => session_id(), "sessionName" => session_name(), "sessionObject" => $_SESSION]);
        }
    

    }
}