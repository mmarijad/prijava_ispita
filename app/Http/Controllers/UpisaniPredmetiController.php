<?php

namespace App\Http\Controllers;

use App\Predmet;
use App\Studij;
use App\User;
use App\Semestar;
use Illuminate\Http\Request;
use Auth;

class UpisaniPredmetiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loggedInUser = Auth::user()->id;
        $predmeti = User::select('predmet.id', 'predmet.ime', 'predmet.ECTS', 'predmet.nastavnik_id', 'users.id','users.name')
        ->JOIN('predmet','predmet.studij_id' , '=' , 'users.studij_id')
        ->where('users.id', '=' ,  $loggedInUser )
        ->where('users.semestar_id', '<=' , 'predmet.semestar_id')
        ->orderby('predmet.semestar_id', 'desc')
        ->get();

        $data1 = Studij::select('id', 'naziv')->orderBy('id', 'desc')->get();
        $data2 = Semestar::select('id', 'naziv_semestra')->orderBy('id', 'desc')->get();
        $data3 = User::select('id', 'name', 'vrsta')->where('vrsta', 'nastavnik')->orderBy('id', 'desc')->get();
       
        return view('ispiti.predmeti')
        ->with('predmet', $predmeti)
        ->with('studiji', $data1)
        ->with('semestri', $data2)
        ->with ('nastavnici', $data3)
        ->with('loggedInUser',  $loggedInUser );

    }

    public function pretraga(Request $request){
        $search = $request->input('search');
    
        $predmeti = Predmet::query('predmet.id', 'predmet.ime', 'ECTS', 'nastavnik_id', 'users.id','users.name', 'predmet.studij_id', 'studij.id', 'studij.naziv')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
            ->where('predmet.ime', 'LIKE', "%{$search}%")
            ->orWhere('ECTS', 'LIKE', "%{$search}%")
            ->orWhere('studij.naziv', 'LIKE', "%{$search}%")
            ->orWhere('users.name', 'LIKE', "%{$search}%")
            ->get();

        return view('predmet.pretraga', compact('predmeti'));
    }

  
}
