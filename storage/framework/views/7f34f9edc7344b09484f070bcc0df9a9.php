<div class="card mb-4 shadow-sm">
  <div class="card-header fw-bold">Quick Stats</div>
  <div class="card-body">
    <div class="d-flex justify-content-around text-center flex-wrap gap-3">
      <div>
        <div id="statsPlans" class="fs-1 fw-bold quick-stats-number">
          <?php echo e($stats['total_plans'] ?? 0); ?>

        </div>
        <div class="text-muted">Plans</div>
      </div>
      <div>
        <div id="statsActive" class="fs-1 fw-bold quick-stats-number text-success">
          <?php echo e($stats['active_plans'] ?? 0); ?>

        </div>
        <div class="text-muted">Active</div>
      </div>
      <div>
        <div id="statsFinished" class="fs-1 fw-bold quick-stats-number text-primary">
          <?php echo e($stats['finished_plans'] ?? 0); ?>

        </div>
        <div class="text-muted">Finished</div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\laragon\www\umamusume-tracker-app\resources\views/partials/stats_panel.blade.php ENDPATH**/ ?>