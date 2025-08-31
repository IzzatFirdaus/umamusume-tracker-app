
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-3">🏇 <?php echo e($plan->name); ?> <span class="badge bg-info ms-2"><?php echo e($plan->status); ?></span></h2>
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <span class="fw-bold"><i class="bi bi-flag"></i> <?php echo e($plan->race_name); ?></span>
            <span class="badge bg-primary ms-2"><?php echo e($plan->class ?? 'Class'); ?></span>
            <span class="badge bg-success ms-2"><?php echo e($plan->career_stage ?? 'Stage'); ?></span>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5>Stats</h5>
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
            </div>
            <div class="mb-3">
                <h5>Attributes</h5>
                <ul class="list-group">
                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><?php echo e($attr->attribute_name); ?></span>
                        <span class="badge bg-secondary"><?php echo e($attr->value); ?></span>
                        <span class="badge bg-warning text-dark"><?php echo e($attr->grade); ?></span>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
    <a href="<?php echo e(route('plans.list')); ?>" class="btn btn-secondary">Back to Plans</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umamusume-tracker-app\resources\views/plan_details.blade.php ENDPATH**/ ?>