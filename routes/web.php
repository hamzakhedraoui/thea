<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmploiyeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/redirect', 'HomeController@redirect');
Route::get('/home', 'HomeController@index');
//gestin emploiye (admin)
Route::post('/admin/listemp', 'AdminController@listemp');
Route::post('/admin/empacteve', 'AdminController@empacteve');
Route::get('/admin/empmodifier', 'AdminController@empmodifier');
Route::post('/admin/empdelete', 'AdminController@empdelete');
Route::post('/admin/modifieremp','AdminController@modifieremp');
//gestion client (admin)
Route::post('/admin/listcli', 'AdminController@listcli');
Route::get('/admin/climodifier', 'AdminController@climodifier');
Route::post('/admin/clidelete', 'AdminController@clidelete');
Route::post('/admin/modifiercli','AdminController@modifiercli');
//gestion material (admin)
Route::get('/admin/matadd','AdminController@matadd');
Route::post('/admin/ajoute','AdminController@ajoute');
Route::post('/admin/listmat', 'AdminController@listmat');
Route::get('/admin/matmodifier', 'AdminController@matmodifier');
Route::post('/admin/matdelete', 'AdminController@matdelete');
Route::post('/admin/modifiermat','AdminController@modifiermat');
//gestion service (admin)
Route::get('/admin/seradd','AdminController@seradd');
Route::post('/admin/ajouteser','AdminController@ajouteser');
Route::post('/admin/listser', 'AdminController@listser');
Route::get('/admin/sermodifier', 'AdminController@sermodifier');
Route::post('/admin/serdelete', 'AdminController@serdelete');
Route::post('/admin/modifierser','AdminController@modifierser');
Route::get('/admin/pdf','AdminController@pdf');
//gestion intervention (admin)
Route::get('/admin/listint','AdminController@listint');
Route::post('/admin/intdelete', 'AdminController@intdelete');
Route::post('/admin/intacteve', 'AdminController@intacteve');
//gestion facteur (admin)
Route::get('/admin/listfac','AdminController@listfac');
Route::post('/admin/facteur','AdminController@facteur');
Route::post('/admin/ajoutefacteur','AdminController@ajoutefacteur');
Route::post('/admin/paye','AdminController@paye');
Route::post('/admin/deletefacteur','AdminController@deletefacteur');
//+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
//emploiye-------------------------------------------------------------------------------------------------------------------------
Route::post('/emp/conferme','EmploiyeController@conferme');
Route::get('/emp/ajoutecv','EmploiyeController@ajoutecv');
Route::get('/emp/interventions','EmploiyeController@interventions');
Route::post('/emp/finish','EmploiyeController@finish');
Route::post('/emp/ajoutemat','EmploiyeController@ajoutemat');
Route::post('/emp/materiel','EmploiyeController@materiel');
//+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
//client-------------------------------------------------------------------------------------------------------------------------
Route::post('/client/intervention','ClientController@intervention');
Route::post('/client/ajoute','ClientController@ajoute');
Route::get('/client/interventions','ClientController@interventions');
Route::get('/client/facture','ClientController@facture');

