<?php


use App\Http\Controllers\ObjavaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'project')->name('dashboard');

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

    // Route::resource('objava', ObjavaController::class);

    Route::get('/project/{projectId}/objava', [ObjavaController::class, 'index'])->name('objava.index');
    Route::get('project/{project_id}/objava/create', [ObjavaController::class, 'create'])->name('objava.create');
    Route::post('project/{project_id}/objava', [ObjavaController::class, 'store'])->name('objava.store');
    Route::get('/objava/{id}', [ObjavaController::class, 'show'])->name('objava.show');
    Route::get('/objava/{id}/edit', [ObjavaController::class, 'edit'])->name('objava.edit');
    Route::put('/objava/{id}', [ObjavaController::class, 'update'])->name('objava.update');
    Route::delete('/objava/{id}', [ObjavaController::class, 'destroy'])->name('objava.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
