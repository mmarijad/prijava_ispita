<?php

namespace App\Http\Controllers;

use App\Prijava;
use App\Predmet;
use App\Studij;
use App\User;
use App\Semestar;
use App\Ispitni_rok;
use App\Ocjene;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrijavaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function prijavi(Request $request, $id)
    {
        $ispitni_rok = Ispitni_rok::find($id);
        $i = $ispitni_rok->id;
        $vrijeme = $ispitni_rok->prijava_do;
        $loggedInUser = Auth::user()->id;
        $id_predmeta = $ispitni_rok->predmet_id;
        $prijava = Prijava::where('student_id', '=', $loggedInUser)->where('ispit_id', '=', $i)->get();
    
        $ispit = Ispitni_rok::select('predmet.ime', 'ispitni_rok.vrijeme_odrzavanja', 'users.name', 'users.id as us', 'users.broj_indeksa', 'ispitni_rok.id as is', 'ispitni_rok.prijava_do', 'sezona.sezona')
        ->join('predmet', 'ispitni_rok.predmet_id', '=', 'predmet.id' )
        ->join('sezona', 'ispitni_rok.sezona_id', '=', 'sezona.id')
        ->join('studij', 'predmet.studij_id', '=', 'studij.id')
        ->join('users', 'users.studij_id', '=', 'studij.id')
        ->where('ispitni_rok.id', '=', $i)
        ->where('users.id', '=', $loggedInUser)
        ->get();

        $svi_izlasci = Prijava::select('*')
        ->join('ispitni_rok', 'prijava.ispit_id', '=', 'ispitni_rok.id')
        ->where('student_id', '=', $loggedInUser)
        ->where('predmet_id', '=', $id_predmeta)
        ->get();

        $brojac =  $svi_izlasci->count();

        $is = $ispit->first();
        $date = $is->prijava_do;
        $vrijeme =Carbon::parse($date);
        $sad = Carbon::now()->format("Y-m-d H:i:s");

        return view('ispiti.prijavi')
        ->with('prijava', $prijava)
        ->with('ispit', $ispit)
        ->with('is', $is)
        ->with('vrijeme', $vrijeme)
        ->with('sad', $sad)
        ->with('brojac', $brojac);
    }

    public function prijava(Request $request, $id)
    {
        $prijava = new Prijava();
        $id1 =  $loggedInUser = Auth::user()->id;
        $prijava->student_id = $id1;
        $prijava->ispit_id = $id;
        $prijava->student_id = $id1;
        $prijava->brojac_prijava=1;
        $prijava->vrijeme_prijave = now();
        $prijava->save();

        return redirect(route('ispiti.prijavljeni_ispiti'));
    }

    public function odjavi(Request $request, $id)
    {
        $prijava = Prijava::find($id);
        $id_prijave = $prijava->id;
        $id_ispita = $prijava->ispit_id;
        $ispitni_rok = Ispitni_rok::find($id_ispita);
        $id_predmeta = $ispitni_rok->predmet_id;
        $loggedInUser = Auth::user()->id;
        $svi_izlasci = Prijava::select('*')
        ->join('ispitni_rok', 'prijava.ispit_id', '=', 'ispitni_rok.id')
        ->where('student_id', '=', $loggedInUser)
        ->where('predmet_id', '=', $id_predmeta)
        ->get();

        $brojac =  $svi_izlasci->count();

        $date = $ispitni_rok->odjava_do;
        $vrijeme =Carbon::parse($date);
        $sad = Carbon::now()->format("Y-m-d H:i:s");

        $id_predmeta = $ispitni_rok->predmet_id;
        $predmet = Predmet::find($id_predmeta);

        $student = User::find($loggedInUser);

        return view('ispiti.odjavi')
        ->with('prijava', $prijava)
        ->with('predmet', $predmet)
        ->with('student', $student)
        ->with('ispit', $ispitni_rok)
        ->with('vrijeme', $vrijeme)
        ->with('sad', $sad)
        ->with('brojac', $brojac);
    }


    public function odjava(Request $request, $id)
    {
        $prijava = Prijava::find($id);
        $prijava->delete();

        return redirect(route('ispiti.prijavljeni_ispiti'));
    }

    public function prikazi_prijave(Request $request)
    {
        $prijave = Prijava::select('predmet.ime','prijava.status', 'prijava.id as pi','prijava.vrijeme_prijave', 'prijava.ocjena', 'ispitni_rok.vrijeme_odrzavanja', 'studij.naziv','users.name', 'users.id as us', 'users.broj_indeksa')
        ->join('ispitni_rok', 'ispit_id', '=', 'ispitni_rok.id' )
        ->join('users', 'student_id', '=', 'users.id')
        ->join('predmet', 'ispitni_rok.predmet_id', '=', 'predmet.id')
        ->join('studij', 'predmet.studij_id', '=', 'studij.id')
        ->where('status','=','prijavljeno')
        ->orderBy('vrijeme_odrzavanja', 'asc')
        ->get();

        return view('rokovi.prijave')
        ->with('prijave', $prijave);
    }

    public function ocjenjivanje(Request $request)
    {
        $sad = Carbon::now()->format("Y-m-d H:i:s");
        $ispiti = Prijava::select('predmet.ime','prijava.status', 'prijava.ocjena','prijava.id as pi','prijava.vrijeme_prijave', 'prijava.ocjena', 'ispitni_rok.vrijeme_odrzavanja', 'studij.naziv','users.name', 'users.id as us', 'users.broj_indeksa')
        ->join('ispitni_rok', 'ispit_id', '=', 'ispitni_rok.id' )
        ->join('users', 'student_id', '=', 'users.id')
        ->join('predmet', 'ispitni_rok.predmet_id', '=', 'predmet.id')
        ->join('studij', 'predmet.studij_id', '=', 'studij.id')
        ->where('status','=','prijavljeno')
       
        ->orderBy('vrijeme_odrzavanja', 'asc')
        ->get();

        return view('rokovi.ocjenjivanje')
        ->with('ispiti', $ispiti);
    }

    public function pretrazi_predmete(Request $request)
    {

        $search = $request->input('search');
        $prijave = Prijava::select('predmet.ime','prijava.status', 'prijava.vrijeme_prijave', 'prijava.ocjena', 'ispitni_rok.vrijeme_odrzavanja', 'studij.naziv','users.name', 'users.id as us', 'users.broj_indeksa')
        ->join('ispitni_rok', 'ispit_id', '=', 'ispitni_rok.id' )
        ->join('users', 'student_id', '=', 'users.id')
        ->join('predmet', 'ispitni_rok.predmet_id', '=', 'predmet.id')
        ->join('studij', 'predmet.studij_id', '=', 'studij.id')
        ->where('status','=','prijavljeno')
        ->where('predmet.ime', 'LIKE', "%{$search}%")
        ->orderBy('vrijeme_odrzavanja', 'asc')
        ->get();

        return view('rokovi.pretrazi_prijave')
        ->with('prijave', $prijave);
    }

    public function oznaci_polozeno (Request $request, $id) {
        $prijava = Prijava::find($id);
        $prijava->status="položeno";
        $prijava->ocjena = $request->ocjena;
        $prijava->save();

        $p = $prijava->id;
        $pr = Prijava::select('*')
        ->join('ispitni_rok', 'prijava.ispit_id', '=', 'ispitni_rok.id')
        ->where('prijava.id', '=', $p)
        ->first();

        $ocjena = new Ocjene();
        $ocjena->ocjena = $prijava->ocjena;
        $ocjena->student_id = $prijava->student_id;
        $ocjena->predmet_id = $pr->predmet_id;
        $ocjena->vrijeme_polaganja = $pr->vrijeme_odrzavanja;
        $ocjena->save();

        return redirect(route('rokovi.ocjenjivanje'));
    }

    public function oznaci_nije_polozeno (Request $request, $id) {
        $prijava = Prijava::find($id);
        $prijava->status="nije položeno";
        $prijava->save();

        return redirect(route('rokovi.ocjenjivanje'));
    }

    public function oznaci_nije_pristupljeno (Request $request, $id) {
        $prijava = Prijava::find($id);
        $prijava->status="nije polagano";
        $prijava->save();

        return redirect(route('rokovi.ocjenjivanje'));
    }
}
