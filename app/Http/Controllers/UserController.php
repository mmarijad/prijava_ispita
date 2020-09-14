<?php

namespace App\Http\Controllers;

use App\User;
use App\Studij;
use App\Semestar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prikazi_nastavnike()
    {
        $nastavnik = User::select('id', 'name', 'email', 'vrsta')->where('vrsta', 'nastavnik')->orderBy('id', 'desc')->get();
        return view ('nastavnici.pregled', ['nastavnici'=>$nastavnik]);
    }

    public function prikazi_studente()
    {
        $data = User::select('users.id as student_id', 'users.name', 'broj_indeksa', 'email', 'studij_id','semestar_id', 'studij.id', 'studij.naziv as studij', 'semestar.id', 'semestar.naziv_semestra as semestar')
        ->join('studij','studij.id' , '=' , 'users.studij_id')
        ->join('semestar','semestar.id' , '=' , 'users.semestar_id')
        ->orderby('broj_indeksa','asc')
        ->orderby('name', 'asc')
        ->get();

        $data1 = Studij::select('id', 'naziv')->orderBy('id', 'desc')->get();
        $data2 = Semestar::select('id', 'naziv_semestra')->orderBy('id', 'desc')->get();
      
        return view('studenti.pregled')
        ->with('studenti', $data)
        ->with('studiji', $data1)
        ->with('semestri', $data2);
    }

    public function pretrazi_nastavnike(Request $request){
    
        $search = $request->input('search');
  
        $nastavnici = User::query('users.id', 'users.name', 'users.email')
            ->where('vrsta', '=', 'nastavnik')
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
    
        return view('nastavnici.pretraga', compact('nastavnici'));
    }

    public function pretrazi_studente(Request $request){
    
        $search = $request->input('search');
    
        $studenti = User::query('users.id', 'users.name', 'users.broj_indeksa', 'users.email', 'users.studij_id','users.semestar_id', 'studij.id', 'semestar.id', 'studij.naziv', 'semestar.naziv_semestra')
        ->join('studij','studij.id' , '=' , 'users.studij_id')
        ->join('semestar','semestar.id' , '=' , 'users.semestar_id')
            ->where('users.name', 'LIKE', "%{$search}%")
            ->orWhere('users.broj_indeksa', 'LIKE', "%{$search}%")
            ->orWhere('users.email', 'LIKE', "%{$search}%")
            ->orWhere('studij.naziv', 'LIKE', "%{$search}%")
            ->orWhere('semestar.naziv_semestra', 'LIKE', "%{$search}%")
            ->get();
    
        return view('studenti.pretraga', compact('studenti'));
    }

    public function create_nastavnik_form(Request $request) 
    {
        $data = User::select('id', 'name','email', 'vrsta')->where('vrsta', 'nastavnik')->orderBy('id', 'desc')->get();
    
        return view('nastavnici.dodaj')
            ->with ('nastavnici', $data) ;
    }

    public function create_student_form(Request $request) 
    {
        $data = Studij::select('id', 'naziv')->orderBy('id', 'desc')->get();
        $data1 = Semestar::select('id', 'naziv_semestra')->orderBy('id', 'desc')->get();
        $data2 = User::select('id', 'name', 'vrsta')->where('vrsta', 'student')->orderBy('id', 'desc')->get();
       

        return view('studenti.dodaj')
            ->with('studiji', $data)
            ->with('semestri', $data1)
            ->with ('studenti', $data2) ;
    }

    public function edit_nastavnik_form(Request $request, $id) 
    {
        $nastavnik = User::find($id);
        return view ('nastavnici.uredi')->with('nastavnici', $nastavnik);
    }

    public function edit_student_form(Request $request, $id) 
    {
        $student = User::find($id);
        $data = Studij::all();
        $data1 = Semestar::all();
        return view ('studenti.uredi')->with('student', $student)->with('studiji', $data)->with('semestri', $data1);
    }

    public function create_nastavnik(Request $request)
    {
        $nastavnik = new User();
        $nastavnik->name = $request->name;
        $nastavnik->email = $request->email;
        $nastavnik->password = Hash::make($request->password);
        $nastavnik->vrsta = 'nastavnik';
        $nastavnik->save();

        return redirect(route('nastavnici.pregled'));
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function create_student(Request $request)
    {
        $student = new User();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password =  Hash::make($request->password);
        $student->broj_indeksa = $request->broj_indeksa;
        $student->semestar_id = $request->semestar_id;
        $student->studij_id = $request->studij_id;
        $student->vrsta = 'student';
        $student->save();

        return redirect(route('studenti.pregled'));
    }

    public function edit_nastavnik(Request $request, $id)
    {
        $nastavnik = User::find($id);
        $nastavnik->fill($request->all());
        $nastavnik->save();

        return redirect(route('nastavnici.pregled'));
    }

    public function edit_student(Request $request, $id)
    {
        $student = User::find($id);
        $student->fill($request->all());
        $student->save();

        return redirect(route('studenti.pregled'));
    }

    public function delete_nastavnik(Request $request, $id)
    {
        $nastavnik = User::find($id);
        $nastavnik->delete();

        return redirect(route('nastavnici.pregled'));
    }

    public function delete_student(Request $request, $id)
    {
        $student = User::find($id);
        $student->delete();
        return redirect(route('studenti.pregled'));
    }
}
