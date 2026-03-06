<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('questions', [QuestionController::class, 'index'])->name('questions.index');

Route::get('questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('questions', [QuestionController::class, 'store'])->name('questions.store');

Route::get('questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('questions/{question}', [QuestionController::class, 'update'])->name('questions.update');

Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::delete('questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

Route::post('/answers/{question}', [AnswerController::class, 'store'])->name('answers.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
