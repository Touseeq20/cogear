<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Application;
use App\Mail\ApplicationStatusUpdated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::latest()->paginate(20);
        return view('admin.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,reviewed,shortlisted,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $application->update($validated);

        // Send notification email to applicant
        Mail::to($application->email)->send(new ApplicationStatusUpdated($application));

        return redirect()->route('admin.applications.show', $application)
            ->with('success', 'Application updated successfully and notification email sent.');
    }

    public function downloadCv(Application $application)
    {
        if (Storage::disk('local')->exists($application->cv_path)) {
            return Storage::disk('local')->download($application->cv_path, Str::slug($application->name) . '-cv.pdf');
        }

        return back()->with('error', 'CV file not found.');
    }
}
