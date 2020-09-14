<?php

namespace App\Http\Controllers;

use App\Predmet;
use App\Studij;
use App\User;
use App\Semestar;
use Illuminate\Http\Request;

class PredmetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Predmet::select('predmet.id as predmet_id', 'predmet.ime', 'ECTS', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv as studij')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
        ->orderby('studij','asc')
        ->orderby('predmet.ime', 'asc')
        ->get();

        $data1 = Studij::select('id', 'naziv')->orderBy('id', 'desc')->get();
        $data2 = Semestar::select('id', 'naziv_semestra')->orderBy('id', 'desc')->get();
        $data3 = User::select('id', 'name', 'vrsta')->where('vrsta', 'nastavnik')->orderBy('id', 'desc')->get();
       
        return view('predmet.pregled')
        ->with('predmet', $data)
        ->with('studiji', $data1)
        ->with('semestri', $data2)
        ->with ('nastavnici', $data3) ;
    }

    public function pretraga(Request $request){
        $search = $request->input('search');
    
        $predmeti = Predmet::select('predmet.id as predmet_id', 'predmet.ime', 'ECTS', 'nastavnik_id', 'users.id','users.name', 'studij.id', 'studij.naziv')
        ->join('users','users.id' , '=' , 'predmet.nastavnik_id')
        ->join('studij','studij.id' , '=' , 'predmet.studij_id')
            ->where('predmet.ime', 'LIKE', "%{$search}%")
            ->orWhere('ECTS', 'LIKE', "%{$search}%")
            ->orWhere('studij.naziv', 'LIKE', "%{$search}%")
            ->orWhere('users.name', 'LIKE', "%{$search}%")
            ->get();

        return view('predmet.pretraga')->with('predmeti', $predmeti);
    }

    public function create_form(Request $request) 
    {
        $data = Studij::select('id', 'naziv')->orderBy('id', 'desc')->get();
        $data1 = Semestar::select('id', 'naziv_semestra')->orderBy('id', 'desc')->get();
        $data2 = User::select('id', 'name', 'vrsta')->where('vrsta', 'nastavnik')->orderBy('id', 'desc')->get();
       

        return view('predmet.dodaj')
            ->with('studiji', $data)
            ->with('semestri', $data1)
            ->with ('nastavnici', $data2);
    }

    public function edit_form(Request $request, $id) 
    {
        $predmet = Predmet::find($id);
        $pid = $predmet->id;
        $data = Studij::all();
        $data1 = Semestar::all();
        $data2 = User::select('id', 'name', 'vrsta')->where('vrsta', 'nastavnik')->orderBy('id', 'desc')->get();
        return view ('predmet.uredi')
        ->with('predmet', $predmet)
        ->with('studiji', $data)
        ->with('semestri', $data1)
        ->with('nastavnici', $data2);
    
    }

    public function create(Request $request)
    {
        $predmet = new Predmet();
        $predmet->fill($request->all());
        $predmet->save();

        return redirect(route('predmet.pregled'));
    }

    public function edit(Request $request, $id)
    {
        $predmet = Predmet::find($id);
        $predmet->fill($request->all());
        $predmet->save();
        return redirect(route('predmet.pregled'));
    }

    public function delete(Request $request, $id)
    {
        $predmet = Predmet::find($id);
        $predmet->delete();

        return redirect(route('predmet.pregled'));
    }
}
