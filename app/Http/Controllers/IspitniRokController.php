<?php

namespace App\Http\Controllers;

use App\Ispitni_rok;
use App\Predmet;
use App\Prijava;
use App\Sezona;
use App\Studij;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IspitniRokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pretraga(Request $request)
    {
        $search = $request->input('search');
        $sad = now();
        $rokovi = Predmet::
        select('predmet.id', 'predmet.ime', 'predmet.studij_id','ispitni_rok.sezona_id', 'nastavnik_id', 
            'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.id as id_ispita', 
            'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina', 
            'sezona.sezona')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
        ->join('sezona', 'ispitni_rok.sezona_id', '=', 'sezona.id')
            
        ->where('predmet.ime', 'LIKE', "%{$search}%")
        ->orWhere('studij.naziv', 'LIKE', "%{$search}%")
        ->orWhere('users.name', 'LIKE', "%{$search}%")
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->orderby('ispitni_rok.vrijeme_odrzavanja', 'desc')
        ->get();

        return view('rokovi.pretraga', compact('rokovi'));
    }

    public function create_form(Request $request) 
    {
        $data = Predmet::select('id', 'ime')->orderBy('ime', 'asc')->get();
        $data1 = Sezona::select('id', 'sezona')->orderBy('id', 'asc')->get();

        return view('rokovi.dodaj')
            ->with('sezone', $data1)
            ->with('predmeti', $data);  
    }

    public function create(Request $request)
    {
        $rok = new Ispitni_rok();
    
        $y = now()->year;
        $year = (int)$y;
        $rok->fill($request->all());
        $rok->godina = $year;
        $g =$request->akademska_godina;
        $v = $request->vrijeme_odrzavanja;
        $date =  Carbon::parse($v)->subDays(3)->format("Y-m-d H:i:s");
        $date1 =  Carbon::parse($v)->format("Y-m-d H:i:s");
        $date2 =  Carbon::parse($v)->subDays(1)->format("Y-m-d H:i:s");
        $rok->prijava_do = $date;
        $rok->vrijeme_odrzavanja = $date1;
        $rok->odjava_do = $date2;
        $rok->akademska_godina = $g;

        $rok->save();
        
        return redirect(route('rokovi.pregled'));
    }

    public function delete(Request $request, $id)
        {
            $rok = Ispitni_rok::find($id);
            $rok->delete();

            return redirect(route('rokovi.pregled'));
        }


public function edit_form(Request $request, $id) 
    {
        $ispitni_rok = Ispitni_rok::find($id);
        $data = Predmet::select('id', 'ime')->orderBy('ime', 'asc')->get();
        $data1 = Sezona::select('id', 'sezona')->orderBy('id', 'asc')->get();

        return view('rokovi.uredi')
            ->with('sezone', $data1)
            ->with('predmeti', $data)
            ->with('rok', $ispitni_rok);
    }

public function edit(Request $request, $id)
{
        $rok = new Ispitni_rok();

        $y = now()->year;
        $year = (int)$y;
        $rok->fill($request->all());
        $rok->godina = $year;
        $g =$request->akademska_godina;
        $v = $request->vrijeme_odrzavanja;
        $date =  Carbon::parse($v)->subDays(3)->format("Y-m-d H:i:s");
        $date1 =  Carbon::parse($v)->format("Y-m-d H:i:s");
        $rok->prijava_do = $date;
        $rok->vrijeme_odrzavanja = $date1;
        $rok->akademska_godina = $g;

        $rok->save();

        return redirect(route('rokovi.pregled'));
}

public function prikazi_prijave (Request $request)
    {
        $year = now()->year;
        $god = (int)$year;
        $sad = now();
        $st = Studij::select('id', 'naziv')->orderBy('naziv', 'asc')->get();

        $zimski1 = Prijava::select('predmet.id', 'predmet.ime', 'users.name', 'users.broj_indeksa', 'predmet.studij_id', 'sezona_id', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.id as id_ispita', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
        ->join('ispitni_rok', 'prijava.ispit_id', '=', 'ispitni_rok.id')
        ->join('users', 'prijava.student_id', '=', 'users.id')
        ->join('predmet', 'ispitni_rok.predmet_id', '=', 'predmet.id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->orderby('ispitni_rok.sezona_id', 'asc')
        ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
        ->get();

        $z = $zimski1->first();
        $y = $z->akademska_godina;

        return view('rokovi.prijave')
        ->with('zimski1', $zimski1)
        ->with('studij', $st)
        ->with('ak_godina', $y);
    }


public function index(Request $request)
    {
        $year = now()->year;
        $y = (int)$year;
        $sad = now();
        $st = Studij::select('id', 'naziv')->orderBy('naziv', 'asc')->get();

        $zimski1 = Predmet::select('predmet.id', 'predmet.ime', 'predmet.studij_id', 'sezona_id', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.id as id_ispita', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->orderby('ispitni_rok.sezona_id', 'asc')
        ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
        ->get();

        $z = $zimski1->first();
        $y = $z->akademska_godina;
       
        return view('rokovi.pregled')
        ->with('zimski1', $zimski1)
        ->with('studij', $st)
        ->with('ak_godina', $y);
    }


    public function studijska_grupa(Request $request, $id) {

        $studij = Studij::find($id);
        $sad = now();
        $sifra = $studij->id;
        $year = now()->year;
        $y = (int)$year;

        $zimski1 = Predmet::select('predmet.id', 'predmet.ime', 'ispitni_rok.id as id_ispita','predmet.studij_id', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->where('studij.id', '=', $sifra)
        ->where('sezona_id', '=', 1)
        ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
        ->get();

        $zimski2 = Predmet::select('predmet.id', 'predmet.ime', 'predmet.studij_id', 'ispitni_rok.id as id_ispita', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->where('studij.id', '=', $sifra)
        ->where('sezona_id', '=', 2)
        ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
        ->get();

        $ljetni1 = Predmet::select('predmet.id', 'predmet.ime', 'predmet.studij_id', 'ispitni_rok.id as id_ispita', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->where('studij.id', '=', $sifra)
        ->where('sezona_id', '=', 3)
        ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
        ->get();

        $ljetni2 = Predmet::select('predmet.id', 'predmet.ime', 'predmet.studij_id','ispitni_rok.id as id_ispita', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->where('studij.id', '=', $sifra)
        ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
        ->where('sezona_id', '=', 4)
        ->get();

        $jesenski1 = Predmet::select('predmet.id', 'predmet.ime', 'predmet.studij_id', 'ispitni_rok.id as id_ispita', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->where('studij.id', '=', $sifra)
        ->where('sezona_id', '=', 5)
        ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
        ->get();

        $jesenski2 = Predmet::select('predmet.id', 'predmet.ime', 'predmet.studij_id', 'ispitni_rok.id as id_ispita', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->where('studij.id', '=', $sifra)
        ->where('sezona_id', '=', 6)
        ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
        ->get();

        $dekanski = Predmet::select('predmet.id', 'predmet.ime', 'predmet.studij_id', 'ispitni_rok.id as id_ispita', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv', 'ispitni_rok.vrijeme_odrzavanja', 'ispitni_rok.prijava_do', 'ispitni_rok.akademska_godina')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->join('ispitni_rok', 'predmet_id', '=', 'predmet.id')
        ->where('vrijeme_odrzavanja', '>=', $sad)
        ->where('studij.id', '=', $sifra)
        ->where('sezona_id', '=', 7)
        ->orderby('ispitni_rok.vrijeme_odrzavanja','asc')
        ->get();

        return view('rokovi.studijska_grupa')
        ->with('zimski1', $zimski1)
        ->with('zimski2', $zimski2)
        ->with('ljetni1', $ljetni1)
        ->with('ljetni2', $ljetni2)
        ->with('jesenski1', $jesenski1)
        ->with('jesenski2', $jesenski2)
        ->with('dekanski', $dekanski)
        ->with('grupa', $studij);
    
}

   
}
