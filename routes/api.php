<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

// Plan attributes endpoint
Route::get('/plan/{id}/attributes', [\App\Http\Controllers\PlanController::class, 'getAttributes']);
Route::get('/plan/{id}/distance-grades', [\App\Http\Controllers\PlanController::class, 'getDistanceGrades']);
Route::get('/plan/{id}/goals', [\App\Http\Controllers\PlanController::class, 'getGoals']);
Route::get('/plan/{id}/predictions', [\App\Http\Controllers\PlanController::class, 'getPredictions']);
Route::get('/plan/{id}/skills', [\App\Http\Controllers\PlanController::class, 'getSkills']);
Route::get('/plan/{id}/style-grades', [\App\Http\Controllers\PlanController::class, 'getStyleGrades']);
Route::get('/plan/{id}/terrain-grades', [\App\Http\Controllers\PlanController::class, 'getTerrainGrades']);
Route::get('/plan/{id}/turns', [\App\Http\Controllers\PlanController::class, 'getTurns']);

// Activities
Route::get('/activities/recent', [\App\Http\Controllers\ActivityController::class, 'getRecent']);

// Stats
Route::get('/stats', [\App\Http\Controllers\StatsController::class, 'getStats']);

// Autosuggest
Route::get('/autosuggest', [\App\Http\Controllers\AutosuggestController::class, 'get']);

// Fetch plan details
Route::get('/plan/{id}/details', [\App\Http\Controllers\PlanDetailsController::class, 'fetch']);

// Export plan data
Route::get('/plan/{id}/export', [\App\Http\Controllers\ExportController::class, 'export']);

// Get plans
Route::get('/plans', [\App\Http\Controllers\PlansController::class, 'index']);
