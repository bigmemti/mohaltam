<?php

use App\Models\User;
use Inertia\Inertia;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\Participation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;

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

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    Route::redirect('/', 'dashboard');

    Route::get('/dashboard', function () {
        $classes = [];
        $user = auth()->user();
        if(!$user->hasLesson() && $user->type == User::STUDENT_TYPE){
            $classes = Lesson::all();
        }
        return Inertia::render('Dashboard', compact(['classes']));
    })->name('dashboard');

    Route::post('user/{user}/lesson', function(Request $request, User $user) {

        $request->validate([
            'lesson_id' => 'exists:lessons,id'
        ]);

        Participation::create([
            'user_id' => $user->id,
            'lesson_id' => $request->lesson_id
        ]);
    })->name('user.lesson.store');

    Route::resource('user', UserController::class);

    Route::resource('lesson', LessonController::class);
});
