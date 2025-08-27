<div class="plan-card p-3 mb-3" role="region" aria-label="Plan card">
  <div class="d-flex align-items-center mb-2">
    <img src="{{ $plan->trainee_image_url ?? '/uploads/trainee_images/default.png' }}" alt="{{ $plan->trainee_name }}" class="rounded me-3" style="width:48px;height:48px;object-fit:cover;">
    <div>
      <h2 class="fw-semibold mb-0" style="font-family: 'Poppins', Arial, sans-serif; font-size: 1.25rem;">{{ $plan->trainee_name }}</h2>
      <span class="badge bg-primary">{{ $plan->style }}</span>
    </div>
  </div>
  <div class="plan-stat-bars mb-2">
    <span class="stat-bar speed" title="Speed" style="width:{{ $plan->speed/12 }}%"></span>
    <span class="stat-bar stamina" title="Stamina" style="width:{{ $plan->stamina/12 }}%"></span>
    <span class="stat-bar power" title="Power" style="width:{{ $plan->power/12 }}%"></span>
    <span class="stat-bar guts" title="Guts" style="width:{{ $plan->guts/12 }}%"></span>
    <span class="stat-bar wit" title="Wit" style="width:{{ $plan->wit/12 }}%"></span>
  </div>
  <div class="d-flex justify-content-between align-items-center">
    <span class="quick-stats-number">{{ $plan->total_stats }}</span>
    <a href="{{ route('plans.details', $plan->id) }}" class="btn btn-outline-primary btn-sm" aria-label="View plan details">Details</a>
  </div>
</div>
