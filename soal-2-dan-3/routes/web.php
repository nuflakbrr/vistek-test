<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('home');
    Route::post('/admin', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/admin/{id}', [CompanyController::class, 'show'])->name('companies.show');
    Route::put('/admin/{id}', [CompanyController::class, 'update'])->name('companies.update');

    Route::get('/products', [ProductController::class, 'index'])->name('product.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/triangle/{x}', function ($x) {
    $x = intval($x);
    if ($x < 1 || $x > 100) {
        return abort(400, 'Nilai x harus antara 1 hingga 100.');
    }

    $triangle = [];
    for ($i = 1; $i <= $x; $i++) {
        $line = str_repeat('o', $i);
        $triangle[] = $line;
    }

    return view('triangle', compact('triangle'));
});

require __DIR__ . '/auth.php';
