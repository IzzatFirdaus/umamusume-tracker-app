@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">Uma Musume Race Planner</h1>
    @include('partials.stats_panel', ['stats' => $stats ?? []])
    @include('partials.recent_activity', ['activities' => $activities ?? []])
    <div class="card mb-4">
        <div class="card-header">Plans</div>
        <div class="card-body">
            <div class="row g-3">
                @foreach($plans as $plan)
                <div class="col-12 col-md-6">
                    <div class="card shadow-sm plan-card mb-3">
                        <div class="card-body">
                            <h5 class="card-title mb-2">
                                <span class="fw-bold">🏇 {{ $plan->name }}</span>
                                <span class="badge bg-info ms-2">{{ $plan->status }}</span>
                            </h5>
                            <p class="mb-1"><i class="bi bi-flag"></i> <span class="fw-semibold">{{ $plan->race_name }}</span></p>
                            <div class="d-flex flex-wrap gap-2 mb-2">
                                <span class="badge bg-primary">{{ $plan->class ?? 'Class' }}</span>
                                <span class="badge bg-success">{{ $plan->career_stage ?? 'Stage' }}</span>
                            </div>
                            <div class="plan-stat-bars mb-2">
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">⚡</span>
                                    <div class="stat-bar" style="background: var(--color-speed); width: {{ ($plan->speed ?? 0) / 12 }}%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2">{{ $plan->speed ?? 0 }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">🛡️</span>
                                    <div class="stat-bar" style="background: var(--color-stamina); width: {{ ($plan->stamina ?? 0) / 12 }}%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2">{{ $plan->stamina ?? 0 }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">🔥</span>
                                    <div class="stat-bar" style="background: var(--color-power); width: {{ ($plan->power ?? 0) / 12 }}%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2">{{ $plan->power ?? 0 }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">💪</span>
                                    <div class="stat-bar" style="background: var(--color-guts); width: {{ ($plan->guts ?? 0) / 12 }}%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2">{{ $plan->guts ?? 0 }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">🧠</span>
                                    <div class="stat-bar" style="background: var(--color-wit); width: {{ ($plan->wit ?? 0) / 12 }}%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2">{{ $plan->wit ?? 0 }}</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('plan.details', $plan->id) }}" class="btn btn-sm btn-primary me-2">🔍 Details</a>
                                <button class="btn btn-sm btn-outline-secondary">🧾 Export</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('plan_details_modal')
    @include('quick_create_plan_modal')
</div>
@endsection
