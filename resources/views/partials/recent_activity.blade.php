<div class="card recent-activity-card mb-4 shadow-sm">
  <div class="card-header fw-bold">Recent Activity</div>
  <div class="card-body" id="recentActivity">
    <ul class="list-group list-group-flush">
      @if(isset($activities) && count($activities))
        @foreach($activities as $activity)
          <li class="list-group-item d-flex align-items-center">
            <i class="bi {{ $activity['icon_class'] }} me-2" aria-hidden="true"></i>
            <span>{{ $activity['description'] }}</span>
            <small class="text-muted ms-auto">
                {{ \Carbon\Carbon::parse($activity['timestamp'])->format('M d, H:i') }}
            </small>
          </li>
        @endforeach
      @else
        <li class="list-group-item text-muted text-center">
          No recent activity.
        </li>
      @endif
    </ul>
  </div>
</div>
