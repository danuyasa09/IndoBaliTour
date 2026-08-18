<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::orderBy('created_at', 'desc')->get();
        return view('admin.job_applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = JobApplication::findOrFail($id);
        return view('admin.job_applications.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,accepted,rejected',
        ]);

        $application = JobApplication::findOrFail($id);
        $application->update(['status' => $request->status]);

        return redirect()->route('admin.job_applications.index')->with('success', 'Application status updated successfully');
    }

    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);
        $application->delete();

        return redirect()->route('admin.job_applications.index')->with('success', 'Application deleted successfully');
    }
}
