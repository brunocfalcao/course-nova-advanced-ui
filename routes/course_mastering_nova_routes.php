<?php

use Illuminate\Support\Facades\Route;
use NovaAdvancedUI\Http\Controllers\Course\WatchVideoController;

Route::get('/videos/{id}', [WatchVideoController::class, 'watch'])->name('video.watch');
