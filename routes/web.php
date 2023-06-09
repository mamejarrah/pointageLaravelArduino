<?php


use App\Mail\WeelyReportMail;
use App\Mail\WeeklyReportMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\PointagesController;
use App\Http\Controllers\UserPointerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[PointagesController::class,'index'])->name('userPointer');
Route::get('getuserPointer/{id}',[PointagesController::class,'getuserpointer'])->name('getuserPointer');
Route::put('getuserPointer/{id}',[PointagesController::class,'saveuserpointer'])->name('saveuserPointer');
Route::get('voirPointer/{carte_id}' , [PointagesController::class, 'voirpointer'])->name('voirPointer');
Route::get('/pointage/{jour}/pdf', [PointagesController::class, 'generatePDF'])->name('listPiontage.pdf');





Route::get('Pointage',[PointagesController::class,'listPiontage'])->name('Pointer');
Route::get('Pointagedate',[PointagesController::class,'Piontagedate'])->name('Pointerdate');

Route::get('personne',[PersonneController::class,'indexp'])->name('indexp');
Route::get('/personne/create',[PersonneController::class, 'create'])->name('personne-create');
Route::post('/enregistrer/personne', [PersonneController::class, 'store'])->name('create');
Route::get('/personnes/{id}/edit', [PersonneController::class, 'edit'])->name('personne-edit');
Route::put('/personnes/{id}', [PersonneController::class, 'update'])->name('personnes.update');
Route::delete('/personnes/{id}', [PersonneController::class,'destroy'])->name('personnes.destroy');


// Route::get('/', function () {
//    Mail::to('mamejarrah99@gmail.com')
//         ->send(new  WeeklyReportMail());
// });

