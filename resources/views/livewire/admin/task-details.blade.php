<div class="container mt-4">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white">
            <h4>Task Details</h4>
        </div>
        <div class="card-body">
            <p><strong>Title:</strong> {{ $details_task->title }}</p>
            <p><strong>Description:</strong> {{ $details_task->description }}</p>
            <p><strong>Status:</strong> {{ $details_task->status }}</p>
            <p><strong>Start Date:</strong> {{ $details_task->start_date }}</p>
            <p><strong>End Date:</strong> {{ $details_task->end_date }}</p>
            <p><strong>Category:</strong> {{ $category?->name ?? 'N/A' }}</p>
            <p><strong>Assigned To:</strong> {{ $user?->name ?? 'N/A' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ url('/admin/tasks') }}" class="btn btn-secondary">Back to Task List</a>
        </div>
    </div>
</div>
