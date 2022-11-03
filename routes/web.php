<?php

use App\Models\User;
use Inertia\Inertia;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\Participation;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;

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

Route::redirect('/', 'dashboard');

Route::get('/dashboard', function () {
    $classes = [];
    if(!auth()->user()->hasLesson() && auth()->user()->type == User::STUDENT_TYPE){
        $classes = Lesson::all();
    }
    return Inertia::render('Dashboard', compact(['classes']));
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('user/{user}/lesson', function(Request $request, User $user) {

    $request->validate([
        'lesson_id' => 'exists:lessons,id'
    ]);

    Participation::create([
        'user_id' => $user->id,
        'lesson_id' => $request->lesson_id
    ]);
})->middleware(['auth', 'verified'])->name('user.lesson.store');

Route::resource('user', UserController::class)->middleware(['auth', 'verified']);
