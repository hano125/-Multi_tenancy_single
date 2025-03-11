<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    //$users = User::all();
    // $users = User::with('tanent')->where("tanent_id", Auth::user()->tanent_id)->get();
    //$users = User::where("tanent_id", Auth::user()->tanent->id)->get();
    //that N+1 problem
    $users = User::teams()->get();

    //solve n+1 problem
    $users = User::with('tanent')->teams()->get();

    Route::resource('articals', ArticalController::class);

    return view('dashboard', get_defined_vars());
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('articals', ArticalController::class)->middleware('auth');


require __DIR__ . '/auth.php';
