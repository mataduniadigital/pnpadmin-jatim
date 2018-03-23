<?php

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

Route::get('/', ['uses' => 'LayoutController@indexHome']);
Route::get('pengumuman-berkas', ['uses' => 'LayoutController@indexPengumuman']);
Route::get('contact-person', ['uses' => 'LayoutController@indexContact']);
Route::get('daftar', ['uses' => 'LayoutController@indexDaftar']);

Route::get('daftar', ['uses' => 'FunctionController@actionDaftar']);
Route::post('signin', ['uses' => 'FunctionController@actionLogin']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('signout', ['uses' => 'FunctionController@actionLogout']);
    Route::get('ubah-password', ['uses' => 'LayoutController@indexUbahPassword']);
    Route::post('ubah-password', ['uses' => 'FunctionController@actionUbahPassword']);
    
    Route::get('verifikasi-berkas', ['uses' => 'LayoutController@indexVerifikasiBerkas']);
    Route::get('verifikasi-saya', ['uses' => 'LayoutController@indexVerifikasiSaya']);
    Route::get('kerjakan-berkas/{id}', ['uses' => 'FunctionController@actionKerjakanBerkas']);
    Route::get('verifikasi/{id}', ['uses' => 'LayoutController@indexVerifikasi']);
    Route::get('verif-dokumen/{id}/{tipe}', ['uses' => 'FunctionController@actionVerifDokumen']);
    Route::get('finish-lamaran/{id}/{action}', ['uses' => 'FunctionController@actionFinishBerkas']);
    Route::post('savenilai-verifikasi/{id}', ['uses' => 'FunctionController@actionSaveNilai']);
    
    Route::get('berkas-terverifikasi', ['uses' => 'LayoutController@indexBerkasTerverifikas']);
    
    Route::group(['prefix' => 'datalist'], function(){
        Route::get('berkas-not-verif', ['uses' => 'DatalistController@berkasNotVerif']);
        Route::get('berkas-proses-verif', ['uses' => 'DatalistController@berkasProses']);
        Route::get('list-berkas', ['uses' => 'DatalistController@listBerkas']);
    });
});