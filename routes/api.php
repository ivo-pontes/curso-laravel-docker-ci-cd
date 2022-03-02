<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\ModuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return response()->json(['message' => 'Ok']);
});

Route::resource('/courses', CourseController::class);

Route::apiResource('/courses/{course}/modules', ModuleController::class);
Route::apiResource('/modules/{module}/lessons', LessonController::class);