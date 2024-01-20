<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

$user = auth()->user();
$idRegex = '[0-9]+';
$slugRegex =  '[0-9a-z\-]+';

Route::get('/biens/{slug}-{car}', [CarController::class, 'show'])->name('car.show')->where([
    'car' => $idRegex,
    'slug' => $slugRegex
])->middleware('auth');

Route::prefix('admin')->name('admin.')->group(function () {
    $user = auth()->user();
    if ($user) {
        $isAdmin = $user->is_Admin;
        if($isAdmin){
            Route::resource('car', \App\Http\Controllers\Admin\CarController::class)->except(['show']);}
        }

});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/biens', [CarController::class, 'index'])->name('car.index');


Route::post('/location', [LocationController::class, 'store'])->name('location');

Route::get('list-location', function (){
    $locations = Location::with('car')->where('user_id', auth()->user()->id)->paginate(10);
    return view('fragment.showlocatedcar', compact('locations'));
})->name('list-locations');



Route::get('/location/{id}',function ( $id) {
    $location = Location::findOrFail($id);
    $location->delete();
    return redirect()->back();
})->name('destroyloc');

Route::get('admin/locataires', function (){
    $locations = Location::with('user')
        ->select('user_id') // Ajoutez ici les colonnes que vous voulez récupérer
        ->groupBy('user_id')
        ->paginate(10);

    return view('admin.locataire.index', compact('locations'));
})->name('admin.locataire');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
