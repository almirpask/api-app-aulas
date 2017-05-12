<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware'=>['cors']], function(){
    Route::resource('/disciplinas', 'Api\DisciplinaController');
    Route::resource('/questionarios', 'Api\QuestionarioController');
    Route::resource('/enunciados', 'Api\EnunciadoController');
    Route::resource('/respostas', 'Api\RespostaController');
    Route::resource('/alternativas', 'Api\AlternativaController');
    Route::get('/relatorios', 'Api\RelatorioController@relatorio_home');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
