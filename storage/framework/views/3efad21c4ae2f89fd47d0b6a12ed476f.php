
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Uma Musume Race Planner</h1>
    <?php echo $__env->make('partials.stats_panel', ['stats' => $stats ?? []], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.recent_activity', ['activities' => $activities ?? []], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="card mb-4">
        <div class="card-header">Plans</div>
        <div class="card-body">
            <div class="row g-3">
                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6">
                    <div class="card shadow-sm plan-card mb-3">
                        <div class="card-body">
                            <h5 class="card-title mb-2">
                                <span class="fw-bold">🏇 <?php echo e($plan->name); ?></span>
                                <span class="badge bg-info ms-2"><?php echo e($plan->status); ?></span>
                            </h5>
                            <p class="mb-1"><i class="bi bi-flag"></i> <span class="fw-semibold"><?php echo e($plan->race_name); ?></span></p>
                            <div class="d-flex flex-wrap gap-2 mb-2">
                                <span class="badge bg-primary"><?php echo e($plan->class ?? 'Class'); ?></span>
                                <span class="badge bg-success"><?php echo e($plan->career_stage ?? 'Stage'); ?></span>
                            </div>
                            <div class="plan-stat-bars mb-2">
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">⚡</span>
                                    <div class="stat-bar" style="background: var(--color-speed); width: <?php echo e(($plan->speed ?? 0) / 12); ?>%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2"><?php echo e($plan->speed ?? 0); ?></span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">🛡️</span>
                                    <div class="stat-bar" style="background: var(--color-stamina); width: <?php echo e(($plan->stamina ?? 0) / 12); ?>%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2"><?php echo e($plan->stamina ?? 0); ?></span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">🔥</span>
                                    <div class="stat-bar" style="background: var(--color-power); width: <?php echo e(($plan->power ?? 0) / 12); ?>%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2"><?php echo e($plan->power ?? 0); ?></span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">💪</span>
                                    <div class="stat-bar" style="background: var(--color-guts); width: <?php echo e(($plan->guts ?? 0) / 12); ?>%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2"><?php echo e($plan->guts ?? 0); ?></span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">🧠</span>
                                    <div class="stat-bar" style="background: var(--color-wit); width: <?php echo e(($plan->wit ?? 0) / 12); ?>%; height: 8px; border-radius: 4px;"></div>
                                    <span class="ms-2"><?php echo e($plan->wit ?? 0); ?></span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="<?php echo e(route('plan.details', $plan->id)); ?>" class="btn btn-sm btn-primary me-2">🔍 Details</a>
                                <button class="btn btn-sm btn-outline-secondary">🧾 Export</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php echo $__env->make('plan_details_modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('quick_create_plan_modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umamusume-tracker-app\resources\views/plans.blade.php ENDPATH**/ ?>