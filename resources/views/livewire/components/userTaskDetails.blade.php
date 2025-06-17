<div wire:ignore.self class="modal fade" id="TaskDetails" tabindex="-1" aria-labelledby="TaskDetailsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      @if($details_task)
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="TaskDetailsLabel">{{ $details_task->title }} - Task Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Description:</strong> {{ $details_task->description }}</p>
        <p><strong>Status:</strong> {{ $details_task->status }}</p>
        <p><strong>Start:</strong> {{ $details_task->start_date }}</p>
        <p><strong>End:</strong> {{ $details_task->end_date }}</p>
        <hr>
        <h5>User Info</h5>
        <p><strong>Name:</strong> {{ $details_user->fname ?? 'N/A' }} {{ $details_user->lname  ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $details_user->email ?? 'N/A' }}</p>
      </div>
      @else
      <div class="modal-body">
        <p class="text-danger">You are not authorized to view this task.</p>
      </div>
      @endif
    </div>
  </div>
</div>
