<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // UI 2: Browse Jobs with Search & Filter
    public function index(Request $request)
    {
        $query = Job::query();

        // Search by job title
        if ($request->has('search') && $request->search != '') {
            $query->where('job_title', 'like', '%' . $request->search . '%');
        }

        // Filter by location
        if ($request->has('filter') && $request->filter != '') {
            $query->where('location', $request->filter);
        }

        // Get filtered jobs
        $jobs = $query->get();

        // Get unique locations for dropdown options
        $locations = Job::select('location')->distinct()->pluck('location');

        return view('jobs.index', compact('jobs', 'locations'));
    }

    // UI 3: View Selected Job
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    // UI 4: Show Create Job Form
    public function create()
    {
        return view('jobs.create');
    }

    // Store a new job
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'job_title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'salary' => 'nullable',
            'experience' => 'nullable',
            'employment_type' => 'nullable',
        ]);

        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job added successfully');
    }

    // UI 5: Show Edit Job Form
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    // Update job
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'job_title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'salary' => 'nullable',
            'experience' => 'nullable',
            'employment_type' => 'nullable',
        ]);

        Job::findOrFail($id)->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    // Delete job
    public function destroy($id)
    {
        Job::findOrFail($id)->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}
