<div class="card recent-activity-card mb-4 shadow-sm">
  <div class="card-header fw-bold">Recent Activity</div>
  <div class="card-body" id="recentActivity">
    <ul class="list-group list-group-flush">
      <?php if(isset($activities) && count($activities)): ?>
        <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="list-group-item d-flex align-items-center">
            <i class="bi <?php echo e($activity['icon_class']); ?> me-2" aria-hidden="true"></i>
            <span><?php echo e($activity['description']); ?></span>
            <small class="text-muted ms-auto">
                <?php echo e(\Carbon\Carbon::parse($activity['timestamp'])->format('M d, H:i')); ?>

            </small>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
        <li class="list-group-item text-muted text-center">
          No recent activity.
        </li>
      <?php endif; ?>
    </ul>
  </div>
</div>
<?php /**PATH C:\laragon\www\umamusume-tracker-app\resources\views/partials/recent_activity.blade.php ENDPATH**/ ?>