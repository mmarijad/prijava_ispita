<?php

namespace App\Http\Controllers;

use App\Prijava;
use App\Predmet;
use Illuminate\Http\Request;
use App\Studij;
use App\User;
use App\Semestar;
use App\Ispitni_rok;
use Auth;


class IspitiController extends Controller
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
    

public function prikazi_nastavnici() {
    $nastavnik = User::select('id', 'name', 'email', 'vrsta')->where('vrsta', 'nastavnik')->orderBy('id', 'desc')->get();
    
    $loggedInUser = Auth::user()->id;
    $predmeti = User::select('predmet.id', 'predmet.ime', 'predmet.ECTS', 'predmet.id as id_predmeta', 'users.id','users.name', 'semestar.naziv_semestra')
    ->JOIN('predmet','predmet.studij_id' , '=' , 'users.studij_id')
    ->JOIN('semestar', 'predmet.semestar_id', '=', 'semestar.id')

    ->where('users.id', '=',  $loggedInUser )
    ->where('users.semestar_id', '>=' , 'predmet.semestar_id')
    ->orderby('predmet.semestar_id', 'desc')
    ->get();

    return view ('ispiti.nastavnici', ['nastavnici'=>$nastavnik], ['predmeti', $predmeti]);
}

public function prikazi_upisane_predmete (Request $request)
{
    $loggedInUser = Auth::user()->id;
    $predmeti = User::select('predmet.id', 'predmet.ime', 'predmet.ECTS', 'predmet.id as id_predmeta', 'users.id','users.name', 'semestar.naziv_semestra')
    ->JOIN('predmet','predmet.studij_id' , '=' , 'users.studij_id')
    ->JOIN('semestar', 'predmet.semestar_id', '=', 'semestar.id')

    ->where('users.id', '=',  $loggedInUser )
    ->where('users.semestar_id', '>=' , 'predmet.semestar_id')
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

public function prikazi_detalje_predmeta(Request $request, $id)
{
    $p = Predmet::find($id);
    $predmetid = $p->id;
    $predmeti = Predmet::select('predmet.id', 'predmet.ime', 'predmet.ECTS', 'predmet.id as id_predmeta', 'users.id','users.name', 'semestar.naziv_semestra')
    ->JOIN('users','predmet.nastavnik_id' , '=' , 'users.id')
    ->JOIN('semestar', 'predmet.semestar_id', '=', 'semestar.id')

    ->where('predmet.id', '=',  $predmetid )
    ->get();

    return view('ispiti.predmeti')
    ->with('predmet', $predmeti);
}


public function prikazi_ocjene (Request $request)
{
    $loggedInUser = Auth::user()->id;
    $predmeti = User::select('predmet.id', 'predmet.ime', 'predmet.ECTS', 'ocjene.ocjena', 'ocjene.vrijeme_polaganja', 'users.id','users.name', 'semestar.naziv_semestra')
    ->JOIN('predmet','predmet.studij_id' , '=' , 'users.studij_id')
    ->JOIN('ocjene', 'ocjene.student_id', '=', 'users.id')
    ->JOIN('semestar', 'predmet.semestar_id', '=', 'semestar.id')

    ->where('users.id', '=',  $loggedInUser )
    ->where('users.semestar_id', '>=' , 'predmet.semestar_id')
    ->orderby('predmet.semestar_id', 'desc')
    ->get();

    $data1 = Studij::select('id', 'naziv')->orderBy('id', 'desc')->get();
    $data2 = Semestar::select('id', 'naziv_semestra')->orderBy('id', 'desc')->get();
    $data3 = User::select('id', 'name', 'vrsta')->where('vrsta', 'nastavnik')->orderBy('id', 'desc')->get();
   
    return view('ispiti.ocjene')
    ->with('predmet', $predmeti)
    ->with('studiji', $data1)
    ->with('semestri', $data2)
    ->with ('nastavnici', $data3)
    ->with('loggedInUser',  $loggedInUser );

}

public function prikazi_studije()
{
    $studij = Studij::where('id', '>=', 1)->get();
    return view ('ispiti.programi', ['studij'=>$studij]);
}

public function prikazi_detalji(Request $request, $id) 
{
    $studij = Studij::find($id);
    $sifra = $studij->id;

    $detalji1 = Predmet::select('ime', 'ECTS','name')
    ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
    ->where('predmet.studij_id', '=', $sifra)
    ->where('predmet.semestar_id', '=', 1)
    ->orWhere('predmet.semestar_id', '=', 2)
    ->get();

    $detalji2 = Predmet::select('ime', 'ECTS','name')
    ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
    ->where('predmet.studij_id', '=', $sifra)
    ->where('predmet.semestar_id', '=', 5)
    ->orWhere('predmet.semestar_id', '=', 11)
    ->get();

    $detalji3 = Predmet::select('ime', 'ECTS','name')
    ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
    ->where('predmet.studij_id', '=', $sifra)
    ->where('predmet.semestar_id', '=', 12)
    ->orWhere('predmet.semestar_id', '=', 15)
    ->get();

    $detalji4 = Predmet::select('ime', 'ECTS','name')
    ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
    ->where('predmet.studij_id', '=', $sifra)
    ->where('predmet.semestar_id', '=', 16)
    ->orWhere('predmet.semestar_id', '=', 17)
    ->get();

    $detalji5 = Predmet::select('ime', 'ECTS','name')
    ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
    ->where('predmet.studij_id', '=', $sifra)
    ->where('predmet.semestar_id', '=', 18)
    ->orWhere('predmet.semestar_id', '=', 21)
    ->get();

    return view ('ispiti.detalji')
    ->with('studij', $studij)
    ->with('detalji1', $detalji1)
    ->with('detalji2', $detalji2)
    ->with('detalji3', $detalji3)
    ->with('detalji4', $detalji4)
    ->with('detalji5', $detalji5)
    ->with('sifra', $sifra);
}

public function pretrazi_nastavnike(Request $request){

    $search = $request->input('search');
    $nastavnici = User::select('name', 'email', 'vrsta')
        ->where('vrsta', '=', 'nastavnik')
        ->where('name', 'LIKE', "%{$search}%")
        ->get();

    return view('ispiti.nastavnici_pretraga', compact('nastavnici'));
}


public function prikazi_prijavljene (Request $request)
{
    $loggedInUser = Auth::user()->id;
    $sad = now();
    $year = now()->year;
    $y = (int)$year;

    $zimski1 = Prijava::select('prijava.id as prijava_id', 'predmet.ime', 'predmet.ECTS', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
    ->join('ispitni_rok', 'ispit_id', '=', 'ispitni_rok.id')
    ->join('predmet', 'ispitni_rok.predmet_id', '=', 'predmet.id')
    ->join('studij', 'predmet.studij_id', '=', 'studij.id')
    ->join('users', 'users.studij_id', '=', 'studij.id')
    
    ->where('vrijeme_odrzavanja', '>=', $sad)
    ->where('student_id', '=', $loggedInUser)
    ->where('status', '=', 'prijavljeno')
    ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
    ->get();

    return view('ispiti.prijavljeni_ispiti')
    ->with('zimski1', $zimski1);

}

public function prikazi_rokove (Request $request)
{
    $loggedInUser = Auth::user()->id;
    $sad = now();
    $year = now()->year;
    $y = (int)$year;

    $zimski1 = Predmet::select('predmet.ime', 'ispitni_rok.id as id_ispita','predmet.ECTS', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do','ispitni_rok.odjava_do', 'ispitni_rok.akademska_godina')
    ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
    ->join('studij', 'predmet.studij_id', '=', 'studij.id')
    ->join('users', 'users.studij_id', '=', 'studij.id')
    ->where('vrijeme_odrzavanja', '>=', $sad)
    ->where('users.id', '=', $loggedInUser)
    ->where('sezona_id', '=', 1)
    ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
    ->get();

    $zimski2 = Predmet::select('predmet.ime', 'ispitni_rok.id as id_ispita','predmet.ECTS', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do','ispitni_rok.odjava_do', 'ispitni_rok.akademska_godina')
    ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
    ->join('studij', 'predmet.studij_id', '=', 'studij.id')
    ->join('users', 'users.studij_id', '=', 'studij.id')

    ->where('vrijeme_odrzavanja', '>=', $sad)
    ->where('users.id', '=', $loggedInUser)
    ->where('sezona_id', '=', 2)
    ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
    ->get();

    $ljetni1 = Predmet::select('predmet.ime', 'ispitni_rok.id as id_ispita','predmet.ECTS', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.odjava_do','ispitni_rok.akademska_godina')
    ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
    ->join('studij', 'predmet.studij_id', '=', 'studij.id')
    ->join('users', 'users.studij_id', '=', 'studij.id')

    ->where('vrijeme_odrzavanja', '>=', $sad)
    ->where('users.id', '=', $loggedInUser)
    ->where('sezona_id', '=', 3)
    ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
    ->get();

    $ljetni2 = Predmet::select('predmet.ime', 'ispitni_rok.id as id_ispita','predmet.ECTS', 'ispitni_rok.odjava_do','ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
    ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
    ->join('studij', 'predmet.studij_id', '=', 'studij.id')
    ->join('users', 'users.studij_id', '=', 'studij.id')

    ->where('vrijeme_odrzavanja', '>=', $sad)
    ->where('users.id', '=', $loggedInUser)
    ->where('sezona_id', '=',4)
    ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
    ->get();

    $jesenski1 = Predmet::select('predmet.ime', 'ispitni_rok.id as id_ispita','predmet.ECTS', 'ispitni_rok.odjava_do','ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
    ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
    ->join('studij', 'predmet.studij_id', '=', 'studij.id')
    ->join('users', 'users.studij_id', '=', 'studij.id')

    ->where('vrijeme_odrzavanja', '>=', $sad)
    ->where('users.id', '=', $loggedInUser)
    ->where('sezona_id', '=', 5)
    ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
    ->get();

    $jesenski2 = Predmet::select('predmet.ime', 'ispitni_rok.id as id_ispita','predmet.ECTS','ispitni_rok.odjava_do', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
    ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
    ->join('studij', 'predmet.studij_id', '=', 'studij.id')
    ->join('users', 'users.studij_id', '=', 'studij.id')

    ->where('vrijeme_odrzavanja', '>=', $sad)
    ->where('users.id', '=', $loggedInUser)
    ->where('sezona_id', '=', 6)
    ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
    ->get();

    $dekanski = Predmet::select('predmet.ime', 'ispitni_rok.id as id_ispita','predmet.ECTS','ispitni_rok.odjava_do', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
    ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
    ->join('studij', 'predmet.studij_id', '=', 'studij.id')
    ->join('users', 'users.studij_id', '=', 'studij.id')

    ->where('vrijeme_odrzavanja', '>=', $sad)
    ->where('users.id', '=', $loggedInUser)
    ->where('sezona_id', '=', 7)
    ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
    ->get();

    return view('ispiti.rokovi')
    ->with('zimski1', $zimski1)
    ->with('zimski2', $zimski2)
    ->with('ljetni1', $ljetni1)
    ->with('ljetni2', $ljetni2)
    ->with('jesenski1', $jesenski1)
    ->with('jesenski2', $jesenski2)
    ->with('dekanski', $dekanski);
}



}
