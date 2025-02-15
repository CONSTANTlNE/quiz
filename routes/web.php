<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    if (auth()->check())
    {
        if (auth()->user()->role === 'admin') {
            return redirect(route('admin.main'));
        }
        return redirect(route('user.main'));
    }

    return view('auth.login');
})->name('loginpage');




Route::middleware('auth')->group(function () {

    Route::get('/main', function () {
        return view('admin.index');
    })->name('admin.main');

    Route::get('/test/all', [TestController::class, 'allTests'])->name('test.all');
    Route::get('/test/create', [TestController::class, 'createTest'])->name('test.create');
    Route::post('/test/store', [TestController::class, 'storeTest'])->name('test.store');
    Route::post('/test/delete', [TestController::class, 'deleteTest'])->name('test.delete');
    // add questions to test


    Route::get('/edit/test/{id}', [TestController::class, 'editTest'])->name('test.edit');

    // Questions with multiple answers
    Route::get('/question/add/multiple/test/{id}', [TestController::class, 'addMultipleQuestion'])->name('test.question.add.multiple');
    Route::get('/question/multiple/edit/test/{id}', [TestController::class, 'editMultipleQuestion'])->name('test.question.edit.multiple');
    Route::post('/question/multiple/update/', [TestController::class, 'updateMultipleQuestion'])->name('test.question.update.multiple');
    Route::post('/question/multiple/store', [TestController::class, 'storeMultipleQuestion'])->name('test.question.multiple.store');

    // Questions with free answers
    Route::get('/question/add/free/test/{id}', [TestController::class, 'addFreeQuestion'])->name('test.question.add.free');
    Route::get('/question/free/edit/test/{id}', [TestController::class, 'editFreeQuestion'])->name('test.question.edit.free');
    Route::post('/question/free/update/', [TestController::class, 'updateFreeQuestion'])->name('test.question.update.free');
    Route::post('/question/free/store', [TestController::class, 'storeFreeQuestion'])->name('test.question.free.store');



    Route::post('/test/assign', [TestController::class, 'assignTestUser'])->name('test.assign');
    Route::get('/test/user/assigneded/{id}', [TestController::class, 'userAssigned'])->name('tests.get.assigned');
    Route::post('/test/check/manual', [TestController::class, 'checkTestManual'])->name('tests.check.manual');


    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/delete', [UserController::class, 'delete'])->name('users.delete');

    // User Routes
    Route::get('/user/main', [UserController::class, 'userMainPage'])->name('user.main');
    Route::get('/take/test/{id}', [UserController::class, 'userTakeTest'])->name('user.take.test');
    Route::post('/user/test/store', [UserController::class, 'userTestStore'])->name('user.test.store');



});


