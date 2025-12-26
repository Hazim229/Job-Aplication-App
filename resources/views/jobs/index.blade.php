@extends('layouts.app')

@section('content')
<h3 class="mb-4">Job Listings</h3>

<!-- Search & Filter Form -->
<form action="{{ route('jobs.index') }}" method="GET" class="row g-3 mb-4 align-items-end">
    <div class="col-md-4">
        <label>Job Title</label>
        <input type="text" name="search" class="form-control" placeholder="Search by job title" value="{{ request('search') }}">
    </div>
    <div class="col-md-3">
        <label>Location</label>
        <select name="filter" class="form-select">
            <option value="">All Locations</option>
            @foreach($locations as $location)
                <option value="{{ $location }}" {{ request('filter') == $location ? 'selected' : '' }}>
                    {{ $location }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary w-100">Search/Filter</button>
    </div>
</form>

<div class="row">
    @forelse($jobs as $job)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $job->job_title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $job->company_name }}</h6>
                    <p><strong>Location:</strong> {{ $job->location }}</p>
                    <p><strong>Salary:</strong> {{ $job->salary ?? '-' }}</p>
                    <p><strong>Experience:</strong> {{ $job->experience ?? '-' }}</p>
                    <p><strong>Employment Type:</strong> {{ $job->employment_type ?? '-' }}</p>
                    <p><strong>Description:</strong> {{ $job->description }}</p>
                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm mt-auto">View Details</a>
                    <p class="text-end text-muted mt-2" style="font-size: 0.8rem;">
                        Posted: {{ $job->created_at->format('d M Y, H:i') }}
                    </p>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center">No jobs found.</p>
    @endforelse
</div>
@endsection
