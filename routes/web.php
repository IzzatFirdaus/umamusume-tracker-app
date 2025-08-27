<?php

use Illuminate\Support\Facades\Route;

use App\Models\Plan;
use App\Models\Attribute;

Route::get('/', function () {
    $plans = Plan::whereNull('deleted_at')->orderByDesc('created_at')->limit(20)->get();
    $stats = [
        'total_plans' => Plan::whereNull('deleted_at')->count(),
        'active_plans' => Plan::where('status', 'Active')->whereNull('deleted_at')->count(),
        'finished_plans' => Plan::where('status', 'Finished')->whereNull('deleted_at')->count(),
    ];
    $activities = \App\Models\ActivityLog::orderByDesc('timestamp')->limit(5)->get()->toArray();
    return view('plans', compact('plans', 'stats', 'activities'));
})->name('plans.list');

Route::get('/plan/{id}/details', function ($id) {
    $plan = Plan::findOrFail($id);
    $attributes = Attribute::where('plan_id', $id)->get();
    return view('plan_details', ['plan' => $plan, 'attributes' => $attributes]);
})->name('plan.details');

Route::get('/guide', function () {
    return view('guide');
})->name('guide');
