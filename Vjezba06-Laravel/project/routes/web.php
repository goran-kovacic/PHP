<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','project')->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
// Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
// Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
// Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');
// Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
// Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
// Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    //Alternative
    Route::resource('project', ProjectController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
