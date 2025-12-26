@extends('layouts.app')

@section('content')
<h3 class="mb-3">Job Details</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title">{{ $job->job_title }} at {{ $job->company_name }}</h5>
        <p><strong>Location:</strong> {{ $job->location }}</p>
        <p><strong>Salary:</strong> {{ $job->salary ?? '-' }}</p>
        <p><strong>Experience:</strong> {{ $job->experience ?? '-' }}</p>
        <p><strong>Employment Type:</strong> {{ $job->employment_type ?? '-' }}</p>
        <p><strong>Deadline:</strong> {{ $job->deadline }}</p>
        <hr>
        <p><strong>Description:</strong></p>
        <p>{{ $job->description }}</p>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary mt-3">Back to Job List</a>
    </div>
</div>
@endsection
