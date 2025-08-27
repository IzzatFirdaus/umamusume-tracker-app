<section class="plan-card mb-3" role="region" aria-label="Stats panel">
  <h3 class="fw-semibold mb-3" style="font-family: 'Poppins', Arial, sans-serif; font-size: 1.1rem;">Stats Overview</h3>
  <div class="row">
    <div class="col-4 text-center">
      <span class="badge bg-primary">Speed</span>
      <div class="quick-stats-number">{{ $stats['speed'] }}</div>
    </div>
    <div class="col-4 text-center">
      <span class="badge bg-success">Stamina</span>
      <div class="quick-stats-number">{{ $stats['stamina'] }}</div>
    </div>
    <div class="col-4 text-center">
      <span class="badge bg-danger">Power</span>
      <div class="quick-stats-number">{{ $stats['power'] }}</div>
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-6 text-center">
      <span class="badge bg-warning">Guts</span>
      <div class="quick-stats-number">{{ $stats['guts'] }}</div>
    </div>
    <div class="col-6 text-center">
      <span class="badge bg-secondary">Wit</span>
      <div class="quick-stats-number">{{ $stats['wit'] }}</div>
    </div>
  </div>
</section>
