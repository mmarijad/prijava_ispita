<?php

namespace App\Http\Controllers;

use App\Studij;
use Illuminate\Http\Request;

class StudijController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studij = Studij::where('id', '>=', 1)->get();
        return view ('studij.pregled', ['studij'=>$studij, 'neka_druga_varijabla' => 120]);
    }

    public function pretraga(Request $request){

        $search = $request->input('search');
    
        $studiji = Studij::query('studij.id', 'studij.naziv', 'studij.opis')
            ->where('studij.naziv', 'LIKE', "%{$search}%")
            ->orWhere('studij.opis', 'LIKE', "%{$search}%")
            ->get();
    
        return view('studij.pretraga', compact('studiji'));
    }

    public function create_form(Request $request) 
    {
        return view ('studij.dodaj');
    }

    public function edit_form(Request $request, $id) 
    {
        $studij = Studij::find($id);
        return view ('studij.uredi')->with('studij', $studij);
    }

    public function create(Request $request)
    {
        $studij = new Studij();
        $studij->naziv = $request->naziv;
        $studij->opis = $request->opis;
        $studij->save();

        return redirect(route('studij.pregled'));
    }

    public function edit(Request $request, $id)
    {
        $studij = Studij::find($id);
        $studij->naziv = $request->naziv;
        $studij->opis = $request->opis;
        $studij->save();

        return redirect(route('studij.pregled'));
    }

    public function delete(Request $request, $id)
    {
        $studij = Studij::find($id);
        $studij->delete();

        return redirect(route('studij.pregled'));
    }
}
