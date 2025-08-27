@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-3">🏇 {{ $plan->name }} <span class="badge bg-info ms-2">{{ $plan->status }}</span></h2>
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <span class="fw-bold"><i class="bi bi-flag"></i> {{ $plan->race_name }}</span>
            <span class="badge bg-primary ms-2">{{ $plan->class ?? 'Class' }}</span>
            <span class="badge bg-success ms-2">{{ $plan->career_stage ?? 'Stage' }}</span>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5>Stats</h5>
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
            </div>
            <div class="mb-3">
                <h5>Attributes</h5>
                <ul class="list-group">
                    @foreach($attributes as $attr)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $attr->attribute_name }}</span>
                        <span class="badge bg-secondary">{{ $attr->value }}</span>
                        <span class="badge bg-warning text-dark">{{ $attr->grade }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <a href="{{ route('plans.list') }}" class="btn btn-secondary">Back to Plans</a>
</div>
@endsection
