<?php

use App\Http\Controllers\AnswerController;
use App\Models\Question;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');

Route::get('/questions/{id}/show', [QuestionController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('questions.show');

Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])
    ->where('id', '[0-9]+')
    ->name('questions.edit');

Route::put('/questions/{id}/update', [QuestionController::class, 'update'])
    ->where('id', '[0-9]+')
    ->name('questions.update');

Route::delete('/questions/{id}/delete', [QuestionController::class, 'destroy'])
    ->where('id', '[0-9]+')
    ->name('questions.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
});
Route::post('/questions/{id}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::get('/questions/{question}/answers/{answers}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
Route::put('/questions/{question}/answers/{answers}', [AnswerController::class, 'update'])->name('answers.update');
Route::delete('/questions/{question}/answers/{answers}', [AnswerController::class, 'destroy'])->name('answers.destroy');

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

    $question = Question::all();

    return view('welcome', ['questions' => $question]);
})->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
