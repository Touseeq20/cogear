<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Application;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_applications' => Application::count(),
            'total_projects' => Project::count(),
            'total_services' => Service::count(),
            'total_testimonials' => Testimonial::count(),
            'pending_applications' => Application::where('status', 'pending')->count(),
        ];

        $recent_applications = Application::latest()->take(5)->get();
        $recent_projects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_applications', 'recent_projects'));
    }
}
