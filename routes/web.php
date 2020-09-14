<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ispiti/nastavnici', 'IspitiController@prikazi_nastavnici')->name('ispiti.nastavnici');
Route::get('/ispiti/programi', 'IspitiController@prikazi_programi')->name('ispiti.programi');
Route::get('/ispiti/predmeti', 'IspitiController@prikazi_upisane_predmete')->name('ispiti.predmeti');
Route::get('/ispiti/detalji_predmeta{id}', 'IspitiController@prikazi_detalje_predmeta')->name('ispiti.detalji_predmeta');
Route::get('/ispiti/rokovi', 'IspitiController@prikazi_rokove')->name('ispiti.rokovi');
Route::get('/ispiti/ocjene', 'IspitiController@prikazi_ocjene')->name('ispiti.ocjene');
Route::get('/ispiti/programi', 'IspitiController@prikazi_studije')->name('ispiti.programi');
Route::get('/ispiti/detalji{id}', 'IspitiController@prikazi_detalji')->name('ispiti.detalji');
Route::get('/ispiti/nastavnici_pretraga', 'IspitiController@pretrazi_nastavnike')->name('ispiti.nastavnici_pretraga');
Route::get('/ispiti/prijavljeni_ispiti', 'IspitiController@prikazi_prijavljene')->name('ispiti.prijavljeni_ispiti');
Route::get('/ispiti/prijavi{id}', 'PrijavaController@prijavi')->name('ispiti.prijavi');
Route::get('/ispiti/odjavi{id}', 'PrijavaController@odjavi')->name('ispiti.odjavi');

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::post('/ispiti/prijavi{id}', 'PrijavaController@prijava')->name('ispiti.prijavi');
Route::post('/ispiti/odjavi{id}', 'PrijavaController@odjava')->name('ispiti.odjavi');

Route::get('/studij', 'StudijController@index')->name('studij.pregled')->middleware('is_admin');
Route::get('/studij/dodaj', 'StudijController@create_form')->name('studij.dodaj')->middleware('is_admin');
Route::get('/studij/uredi{id}', 'StudijController@edit_form')->name('studij.uredi')->middleware('is_admin');
Route::get('/studij/izbrisi{id}', 'StudijController@delete')->name('studij.izbrisi')->middleware('is_admin');
Route::get('/studij/pretraga', 'StudijController@pretraga')->name('studij.pretraga')->middleware('is_admin');

Route::post('/studij/spremi', 'StudijController@create')->name('studij.spremi')->middleware('is_admin');
Route::post('/studij/uredi{id}', 'StudijController@edit')->name('studij.uredi')->middleware('is_admin');

Route::get('/predmet', 'PredmetController@index')->name('predmet.pregled')->middleware('is_admin');
Route::get('/predmet/dodaj', 'PredmetController@create_form')->name('predmet.dodaj')->middleware('is_admin');
Route::get('/predmet/uredi{id}', 'PredmetController@edit_form')->name('predmet.uredi')->middleware('is_admin');
Route::get('/predmet/izbrisi{id}', 'PredmetController@delete')->name('predmet.izbrisi')->middleware('is_admin');
Route::get('/predmet/pretraga', 'PredmetController@pretraga')->name('predmet.pretraga')->middleware('is_admin');

Route::post('/predmet/spremi', 'PredmetController@create')->name('predmet.spremi')->middleware('is_admin');
Route::post('/predmet/uredi{id}', 'PredmetController@edit')->name('predmet.uredi')->middleware('is_admin');

Route::get('/studenti', 'UserController@prikazi_studente')->name('studenti.pregled')->middleware('is_admin');
Route::get('/studenti/dodaj', 'UserController@create_student_form')->name('studenti.dodaj')->middleware('is_admin');
Route::get('/studenti/uredi{id}', 'UserController@edit_student_form')->name('studenti.uredi')->middleware('is_admin');
Route::get('/studenti/izbrisi{id}', 'UserController@delete_student')->name('studenti.izbrisi')->middleware('is_admin');
Route::get('/studenti/pretraga', 'UserController@pretrazi_studente')->name('studenti.pretraga')->middleware('is_admin');

Route::post('/studenti/spremi', 'UserController@create_student')->name('studenti.spremi')->middleware('is_admin');
Route::post('/studenti/uredi{id}', 'UserController@edit_student')->name('studenti.uredi')->middleware('is_admin');

Route::get('/nastavnici', 'UserController@prikazi_nastavnike')->name('nastavnici.pregled')->middleware('is_admin');
Route::get('/nastavnici/dodaj', 'UserController@create_nastavnik_form')->name('nastavnici.dodaj')->middleware('is_admin');
Route::get('/nastavnici/uredi{id}', 'UserController@edit_nastavnik_form')->name('nastavnici.uredi')->middleware('is_admin');
Route::get('/nastavnici/izbrisi{id}', 'UserController@delete_nastavnik')->name('nastavnici.izbrisi')->middleware('is_admin');
Route::get('/nastavnici/pretraga', 'UserController@pretrazi_nastavnike')->name('nastavnici.pretraga')->middleware('is_admin');

Route::post('/nastavnici/spremi', 'UserController@create_nastavnik')->name('nastavnici.spremi')->middleware('is_admin');
Route::post('/nastavnici/uredi{id}', 'UserController@edit_nastavnik')->name('nastavnici.uredi')->middleware('is_admin');

Route::get('/rokovi/dodaj', 'IspitniRokController@create_form')->name('rokovi.dodaj')->middleware('is_admin');
Route::get('/rokovi', 'IspitniRokController@index')->name('rokovi.pregled')->middleware('is_admin');
Route::get('/rokovi/studijska_grupa{id}', 'IspitniRokController@studijska_grupa')->name('rokovi.studijska_grupa');
Route::get('/rokovi/izbrisi{id}', 'IspitniRokController@delete')->name('rokovi.izbrisi')->middleware('is_admin');
Route::get('/rokovi/uredi{id}', 'IspitniRokController@edit_form')->name('rokovi.uredi')->middleware('is_admin');
Route::get('/rokovi/pretraga', 'IspitniRokController@pretraga')->name('rokovi.pretraga')->middleware('is_admin');
Route::get('/rokovi/prijave', 'PrijavaController@prikazi_prijave')->name('rokovi.prijave')->middleware('is_admin');
Route::get('/rokovi/pretrazi_prijave', 'PrijavaController@pretrazi_predmete')->name('rokovi.pretrazi_prijave')->middleware('is_admin');
Route::get('/rokovi/ocjenjivanje', 'PrijavaController@ocjenjivanje')->name('rokovi.ocjenjivanje')->middleware('is_admin');

Route::post('/rokovi/uredi{id}', 'IspitniRokController@edit')->name('rokovi.uredi')->middleware('is_admin');
Route::post('/rokovi/spremi', 'IspitniRokController@create')->name('rokovi.spremi')->middleware('is_admin');
Route::get('/rokovi/nijepolozeno{id}', 'PrijavaController@oznaci_nije_polozeno')->name('rokovi.nijepolozeno')->middleware('is_admin');
Route::get('/rokovi/polozeno{id}', 'PrijavaController@oznaci_polozeno')->name('rokovi.polozeno')->middleware('is_admin');
Route::get('/rokovi/nijepolozeno{id}', 'PrijavaController@oznaci_nije_polozeno')->name('rokovi.nijepolozeno')->middleware('is_admin');
Route::get('/rokovi/nijepolagano{id}', 'PrijavaController@oznaci_nije_pristupljeno')->name('rokovi.nijepolagano')->middleware('is_admin');